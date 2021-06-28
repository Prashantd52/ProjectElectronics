<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Cart;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {   
        //dd($request->product_id);
        //dd($request);
        $cart_item=DB::table('inventories')->where('id',$request->product_id)->first();
        //dd($cart_item);

        //check if authenticated
        if(Auth::check())
        {
            $customer_id=Auth::id();
            //dd($customer_id);
        }
        else
        {
            session()->flash('danger','Please Login First');
            return json_encode(array('data'=>"Please login"));
        }

         //check if customer id with shop id exist in the cart table or not
        $old_cart= Cart::where('customer_id',$customer_id)
                        ->where('shop_id',$cart_item->shop_id)
                        ->first();

        //dd($old_cart);

        
        
        if($old_cart==null) // when customer id with shop id does not exist in the cart table
        {
            $cart=New Cart;
            $cart->shop_id=$cart_item->shop_id;
            $cart->customer_id=$customer_id;
            $cart->ip_address=$request->ip();
            $cart->item_count=1;
            $cart->quantity=$request->quantity ? $request->quantity : 1;
            $cart->total= $cart_item->sale_price * ($request->quantity ? $request->quantity : 1);
            $cart->save();

            $cart_item_pivot_data = [];
            $cart_item_pivot_data[$cart_item->id] = [
            'inventory_id' => $cart_item->id,
            'item_description'=> $cart_item->sku . ': ' . $cart_item->title . ' - ' . ' - ' . $cart_item->condition,
            'quantity' =>$request->quantity ? $request->quantity : 1,
            'unit_price' => $cart_item->sale_price,
            ];

            // Save cart items into pivot
            if ( ! empty($cart_item_pivot_data) ) 
            {
                $cart->inventories()->syncWithoutDetaching($cart_item_pivot_data);
            }
            
            //session()->flash('success','Product is added to cart ');
            return json_encode(array('data'=>"Added To Cart"));


            
        }
        else // when customer id with shop id exist in the cart table
        {
            // Check if the item is alrealy in the cart
            $item_in_old_cart=DB::table('cart_items')->where('cart_id',$old_cart->id)
                                    ->where('inventory_id',$cart_item->id)->first();
                
            if($item_in_old_cart) //if the item is alrealy in the cart
            {  
                 //---------DONT WANT TO ADD SAME ITEM-------------------
                //session()->flash('warning','Product is already in cart');
                return json_encode(array('data'=>"Product already exist in cart"));



                //---UPDATE THE QUANTITY OF SAME ITEM -----
                // $quant= $item_in_old_cart->quantity +1;

                // //dd($quant);
                // $old_cart->quantity= $old_cart->quantity+1;
                // DB::table('carts')->where('id',$old_cart->id)
                //     ->where('shop_id',$old_cart->shop_id)
                //     ->update(array('quantity'=>$old_cart->quantity,'updated_at'=> Carbon::now()));
                    
                // DB::table('cart_items')->where('cart_id',$old_cart->id)
                //     ->where('inventory_id',$cart_item->id)
                //     ->update(array('quantity'=>$quant,'updated_at'=> Carbon::now())); 
                // session()->flash('success','Product is added to cart ');
            }
            
            else  //when the item is not in the cart
            {   
                $quant=$old_cart->quantity + ($request->quantity ? $request->quantity : 1);
                $item_count=$old_cart->item_count+ 1;
                $total= $old_cart->total + ($cart_item->sale_price * ($request->quantity ? $request->quantity : 1));
                DB::table('carts')->where('id',$old_cart->id)
                    ->where('shop_id',$old_cart->shop_id)
                    ->update(array('item_count'=>$item_count,'quantity'=>$quant,'total'=>$total,'updated_at'=> Carbon::now()));
                
                
                DB::table('cart_items')
                    ->insert(['cart_id' =>$old_cart->id,
                            'inventory_id' => $cart_item->id,
                            'item_description'=> $cart_item->sku . ': ' . $cart_item->title . ' - ' . ' - ' . $cart_item->condition,
                            'quantity' =>$request->quantity ? $request->quantity : 1,
                            'unit_price' => $cart_item->sale_price,
                            'created_at'=> Carbon::now(),
                            'updated_at'=> Carbon::now()]);

                //session()->flash('success','Product is added to cart ');
                return json_encode(array('data'=>"Added To Cart"));


            }
            
        }
        
        //return redirect()->back();  

    }

    public function cart()
    {   
        $cart=true;
        
        $wished_items=$this->wishlist();
       
        if(Auth::check())
        {
            $customer_id=Auth::id();
            //dd($customer_id);
            $customer_carts=Cart::where('customer_id',$customer_id)->get();
            if(!$customer_carts->isEmpty())
            {
                $carts_id=array();
                foreach($customer_carts as $cart)
                {
                    array_push($carts_id,$cart->id);
                }
                
                $cart_items=DB::table('cart_items')->whereIn('cart_id',$carts_id)->get();
                //dd($cart_items);
                return view('electronic.cart',compact('cart','wished_items','customer_carts','cart_items'));
  
            }
            else
            {
                return $this->cart_empty();
            }
        }

        else
        {   
            session()->flash('danger','Please Login First');
            return redirect()->route('login');
        }
    }



    public function cart_empty()
    {
        $cart=true;
    
        return view('electronic.cart_empty',compact('cart'));
    }



    public function cart_update(Request $request)
    {
        $cart=true;
        //dd($request);

        // $cartid_to_update=$request->cart_id;
        // dd($cartid_to_update);

        
        $cartToUpdate=Cart::where('id',$request->cart_id)->first();
        $cartItemsToUpdate=DB::table('cart_items')->where('cart_id',$request->cart_id)->get();
        //dd($cartItemsToUpdate);
        //dd($cartToUpdate);
        
        $quantity=0;
        $total=0;
        foreach($cartItemsToUpdate as $item)
        {
            $itemid=$item->inventory_id;
            $quantity= $quantity + $request->input('quantity_of_'.$itemid);
            $total= $total + ($request->input('quantity_of_'.$itemid) * $request->input('price_of_'.$itemid));
        }
        //dd($quantity,$total);
        
        //-------------update in cart table-----------------------
        $cartToUpdate->quantity=$quantity;
        $cartToUpdate->total=$total;
        //dd($cartToUpdate->total);
       
        $cartToUpdate->save();

        //------------------------update in cart item table----------------

        foreach($cartItemsToUpdate as $item)
        {
            $itemid=$item->inventory_id;
            DB::table('cart_items')->where('cart_id',$request->cart_id)
                ->where('inventory_id',$request->input('inventory_id_'.$itemid))
                ->update(array('quantity'=>$request->input('quantity_of_'.$itemid),'updated_at'=> Carbon::now()));

            
        }
        
        return redirect()->back();
    }

    public function destroy($cartId,$inventoryId)
    {
        //dd($cartId,$inventoryId);
        $cart=Cart::where('id',$cartId)->first();
        //dd($cart);
        if($cart->item_count== 1)
        {
            $cart->delete();
            return redirect()->back();
        }
        else
        {
            $cart_item=DB::table('cart_items')->where('cart_id',$cartId)
                            ->where('inventory_id',$inventoryId)->first();
            //dd($cart_item);
            DB::table('cart_items')->where('cart_id',$cartId)
                ->where('inventory_id',$inventoryId)->delete();

            $cart->item_count=$cart->item_count - 1;
            $cart->quantity= $cart->quantity - $cart_item->quantity;
            $cart->total= $cart->total - ($cart_item->quantity * $cart_item->unit_price);
            $cart->save();
            return redirect()->back();
        }
    }

    public function destroy_carts()
    {
        $customer_id=Auth::id();
        DB::table('carts')->where('customer_id',$customer_id)->delete();
        return redirect()->back();
    }


    public function checkout($cartId)
    {
        //dd($cartId);
        if(Auth::check())
        {
        
            $customer_id=Auth::id();

            $cartToCheckout=Cart::where('carts.id',$cartId)
                                ->join('cart_items','carts.id','=','cart_items.cart_id')
                                //->join('shops','shops.id','=','carts.shop_id')
                                ->join('shipping_zones','carts.shop_id','=','shipping_zones.shop_id')
                                ->select('cart_items.*','carts.total','carts.id as cart_id','carts.shop_id','carts.customer_id','shipping_zones.id as shipping_zone_id')->get();

            //dd($cartToCheckout);
            $addresses=Address::where('addressable_id',$customer_id)->get();
            //dd($customer_id,$addresses);
            $country=DB::table('countries')->get();


            return view('electronic.checkout',compact('cartToCheckout','addresses','country'));
        }
        else
        {
            session()->flash('danger','Please Login First');
            return redirect()->route('login');
        }

        // if($no==1)
        // {
        //    return view('electronic.checkout_1',compact('category_sub_group','categories','products','img_url'));
        // }
        // elseif($no==2)
        // {
        //     return view('electronic.checkout_2',compact('category_sub_group','categories','products','img_url'));
        // }
        // else
        // {
        //     return view('electronic.checkout',compact('category_sub_group','categories','products','img_url'));
        // }
        
    }

    public function minicart_items()
    {
        $id=Auth::id();
        $img_url=$this->server_image_path;
        $minicartItems=Cart::join('cart_items','cart_items.cart_id','=','carts.id')
                            ->where('carts.customer_id',$id)
                            ->select('cart_items.*')->get();
        //dd($minicartItems);
        return view('layouts.minicart_dropdown',Compact('minicartItems','img_url'));
    }

    public function update_minicart_count()
    {
        $id=Auth::id();
        $minicartitems=Cart::where('carts.customer_id',$id)->get();
        $minicartCount=0;
        $carttotal=0;
        foreach($minicartitems as $minicartitem)
        {
            $minicartCount=$minicartCount + $minicartitem->item_count;
            $carttotal =$carttotal + $minicartitem->total;
        }
        
        return array('minicartCount'=>$minicartCount , 'carttotal'=>$carttotal);
    }
}
