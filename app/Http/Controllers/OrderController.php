<?php

namespace App\Http\Controllers;

use DB;
use App\Cart;
use App\Order;
use App\Address;
use App\OrderItem;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function place_order(Request $request)
    {
        //dd($request);
        $orderAddress=Address::where('id',$request->shipping_address)->first();
        $orderCart=Cart::where('id',$request->cart_id)->first();
        
        //-----------create Order in Orders Table-------------
        $order=new Order;
        $order->order_number='#'.$request->customer_id.$request->cart_id;
        $order->shop_id=$request->shop_id;
        $order->customer_id=$request->customer_id;
        $order->ship_to=$orderAddress->country_id;
        $order->shipping_zone_id=$request->shipping_zone_id;
        $order->item_count=$orderCart->item_count;
        $order->quantity=$orderCart->quantity;
        $order->total=$orderCart->total;
        $order->grand_total=$orderCart->total;
        if(isset($request->checkbox2))
        {
                $order->billing_address= $orderAddress->address_title.', '.$orderAddress->address_line_1.','.$orderAddress->address_line_2.','.$orderAddress->city.', ('.$orderAddress->zip_code.')';
        }
        $order->shipping_address=$orderAddress->address_title.' '.$orderAddress->address_line_1.','.$orderAddress->address_line_2.','.$orderAddress->city.', ('.$orderAddress->zip_code.')';

        $order->payment_method_id=$request->radio2;
        $order->save();
        //----------- /create Order in Orders Table-------------

        //----------------Update Order_Items Table -------------
            //get data from cart_items 
           $order_items=DB::table('cart_items')->where('cart_id',$request->cart_id)->get();


        foreach($order_items as $order_item)
        {
            $order_item_pivot_data = [];
            $order_item_pivot_data[$order_item->inventory_id] = [
            'inventory_id' => $order_item->inventory_id,
            'item_description'=> $order_item->item_description,
            'quantity' =>$order_item->quantity,
            'unit_price' => $order_item->unit_price,
            ];

            // Save order items into pivot
            if ( ! empty($order_item_pivot_data) ) 
            {
                $order->inventories()->syncWithoutDetaching($order_item_pivot_data);
            }
        }

        //---------------delete cart after order placed------------
            $orderCart->delete();
        
        session()->flash('success','Order placed successfully');
        return redirect()->route('electronic.account_order_history');
    }

    public function order_details($id)
    {
        //dd($id);
        $order=Order::where('orders.id',$id)
                    ->join('shops','shops.id','=','orders.shop_id')
                    ->join('order_statuses','order_statuses.id','=','orders.order_status_id')
                    ->join('payment_methods','payment_methods.id','=','orders.payment_method_id')
                    ->select('orders.*','shops.name as shop_name','order_statuses.name as order_status','payment_methods.name as payment_method')->first();
        $order_details= DB::table('order_items')->where('order_id',$id)->get();
        //dd($order);
        
        return view('electronic.order_details',Compact('order','order_details'));
    }

    public function cancel_order($id)
    {
        $cancelOrder=Order::where('id',$id)->first();
        //dd($cancelOrder);
        $cancelOrder->order_status_id= 8;
        $cancelOrder->save();
        session()->flash('warning','Order Cancel by Customer');
        return redirect()->route('electronic.account_order_history');
    }


    //----------------------------------R E O R D E R-----------------------

    public function re_order(Request $request, $id)
    {
        //----------- save order detail to new cart----------------- 
        
        $old_order= Order::where('id',$id)->first();
        
        //dd($request , $old_order);
        
        $new_cart=new Cart;
        $new_cart->shop_id=$old_order->shop_id;
        $new_cart->customer_id=$old_order->customer_id;
        $new_cart->ip_address=$request->ip();
        $new_cart->item_count=$old_order->item_count;
        $new_cart->quantity=$old_order->quantity;
        $new_cart->total= $old_order->total;
        
        $new_cart->save();

        // --------------update cart items-----------

        $old_order_items=OrderItem::where('order_id',$id)->get();
        $cart_items=[];
        foreach($old_order_items as $item)
        {
            $cart_items[]= [
                'cart_id'           => $new_cart->id,
                'inventory_id'      => $item->inventory_id,
                'item_description'  => $item->item_description,
                'quantity'          => $item->quantity,
                'unit_price'        => $item->unit_price,
                'created_at'        => $item->created_at,
                'updated_at'        => $item->updated_at,
            ];
        }
        DB::table('cart_items')->insert($cart_items);
        //dd($new_cart , $old_order, $cart_items);

        return redirect()->route('electronic.checkout',$new_cart->id);
    }

    public function clearOrderHistory()
    {
        $customerId=Auth::id();
        
        $delete_orders=Order::where('customer_id',$customerId)
                        ->whereIn('order_status_id',[6,7,8])->get();
        //dd($delete_orders);

        if(count($delete_orders)>0)
        {        
            $delete_orders_id=array();
            foreach($delete_orders as $del_order)
            {
                array_push($delete_orders_id,$del_order->id);
            }
        // dd($delete_orders_id);
            Order::whereIn('id',$delete_orders_id)->delete();
            //DB::table('orders')->whereIn('id',$delete_orders_id)->update(array('deleted_at'=> Carbon::now()));;
            session()->flash('warning','except pending orders, Order History Cleared');
        }
        else
        {
            session()->flash('warning','Order under Process Can not be cleared from history');
        }
            return redirect()->back();
    }

    public function add_shipping_address()
    {
        $country=DB::table('countries')->get();
        return view('layouts.account.add_address',compact('country'));
    }
}

