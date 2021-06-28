<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Address;
use DB;
use App\Order;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    

    public function account_create()
    {
        $category_sub_group=$this->category_sub_group();
        $categories=$this->categories();
        return view('account.create',Compact('category_sub_group','categories'));
    }

    public function account_details()
    {
        if(Auth::check())
        {
            $customer_id=Auth::id();
            //dd($customer_id);
            $account='details';
            $category_sub_group=$this->category_sub_group();
            $categories=$this->categories();

            $accountDetails= Customer::where('id',$customer_id)->first();
            //dd($customer_id);
            //dd($accountDetails);
            return view('account.details',compact('account','category_sub_group','categories','accountDetails'));
        }
        else
        {
            session()->flash('danger','Please Login First');
            return redirect()->route('login');
        }
    }

    public function update_details(Request $request)
    {
        $customer_id=Auth::id();
        //dd($customer_id,$request);
        $customer=Customer::where('id',$customer_id)->first();
        $customer->name=$request->name;
        $customer->phone=$request->phone;

        $customer->save();
        return back();
    }

    public function account_address()
    {
        if(Auth::check())
        {
            $account='address';
            $category_sub_group=$this->category_sub_group();
            $categories=$this->categories();
            $customer_id=Auth::id();
            $country=DB::table('countries')->get();

            $address=DB::table('addresses')
                        ->where('addressable_type','App\Customer')
                        ->where('addressable_id',$customer_id)->get();
            
            //dd($address);


            return view('account.address',compact('account','category_sub_group','categories','country','address'));
        }
        else
        {
            session()->flash('danger','Please Login First');
            return redirect()->route('login');
        }
    }
    
    public function add_address(Request $request)
    {
        $request->validate([
            'address1'=>'required',
            'country'=>'required',
            'state'=>'required',
            'zip_code'=>'required',
            'phone'=>'min:10|max:10'
        ]);
        $customer_name=Auth::user()->name;

        $address=new Address();

        $customer_id=Auth::id();
        $customer_addresses=Address::where('addressable_id',$customer_id)->get();
        //dd($customer_name,$address,$request);
        
        $address->address_title= $request->name? $request->name: $customer_name;
        if(count($customer_addresses)== 0)
        {
            $address->address_type="Primary";
        }
        else
        {
            $address->address_type="Shipping";
        }
        
        $address->address_line_1=$request->address1;
        $address->address_line_2=$request->address2;
        $address->city=$request->city;
        $address->state_id=$request->state;
        $address->zip_code=$request->zip_code;
        $address->country_id=$request->country;
        $address->phone=$request->phone;

        $address->addressable_id=Auth::id();
        $address->addressable_type="App\Customer";

        $address->save();
        
        return redirect()->back();

        

    }

    public function edit_address(Request $request)
    {
        // //dd($request);
        // $addressEdit=Address::where('id',$request->address_id? $request->address_id : 111)->first();
        // $country=DB::table('countries')->get();
        // //dd($addressEdit);
        // return view('layouts.account.edit_address',Compact('addressEdit','country'));
    }


    public function update_address(Request $request ,$id)
    {
        //dd($request);
        $customer_name=Auth::user()->name;
        $customer_id=Auth::id();
        $customer_addresses=Address::where('addressable_id',$customer_id)->get();
        $address=Address::where('id',$id)->first();
        //dd($customer_addresses);
        //dd($id,$customer_name,$address,$request);
        
        $address->address_title= $request->name? $request->name: $customer_name;
        if(isset($request->checkbox1))
        {
            $address->address_type="Primary";
            // foreach($customer_addresses as $customer_address)
            // {
            //     if($customer_address->address_type == 'Primary')
            //     {
            //         $customer_address->address_type='Shipping';
            //         dd($customer_address->address_type);
            //         $customer_address->save();
            //     }
            // }
        }
        // elseif(count($customer_addresses)== 1)
        // {
        //     $address->address_type="Primary";
        // }
        // else
        // {
        //     $address->address_type="Shipping";
        // }
        
        $address->address_line_1=$request->address1;
        $address->address_line_2=$request->address2;
        $address->city=$request->city;
        $address->state_id=$request->state? $request->state: $address->state_id;
        $address->zip_code=$request->zip_code;
        $address->country_id=$request->country? $request->country: $address->country_id;
        $address->phone=$request->phone;

        
        $address->save();
        
        return redirect()->back();

        

    }

    public function destroy_address($id)
    {
        //dd($id);
        $address=Address::where('id',$id)->first();
        $address->delete();
        return redirect()->back();
    }

    public function select_state(Request $request)
    {
        $states=DB::table('states')->where('country_id',$request->country_id)->get();
        $options="<option value=''>-----Select State-----</option>";
        foreach($states as $state)
        {
            $options  .='<option value="'.$state->id.'">'.$state->name.'</option>';
        }

        return $options;

    }

    public function account_order_history()
    {
        if(Auth::check())
        {
            $account='history';
            $category_sub_group=$this->category_sub_group();
            $categories=$this->categories();
            $customer_id=Auth::id();

            $order_history=Order::where('customer_id',$customer_id)
                                    ->join('order_statuses','order_statuses.id','=','orders.order_status_id')
                                    ->select('orders.*','order_statuses.name as order_status')
                                    ->get();
            //dd($order_history);
            return view('account.ac_order_history',compact('account','category_sub_group','categories','order_history'));
        }
        else
        {   
            session()->flash('danger','Please Login First');
            return redirect()->route('login');
        }
    }

    public function account_wishlist()
    {
        if(Auth::check())
        {
            $account='wishlist';
            // $category_sub_group=$this->category_sub_group();
            // $categories=$this->categories();
            // $products=$this->products();
            // $img_url=$this->server_image_path;
            
            $wished_items=$this->wishlist();
            
            //dd($wished_items);
            return view('account.wishlist',compact('account','wished_items'));
        }
        else
        {
            session()->flash('danger','Please Login First');
            return redirect()->route('login');
        }
    }


    public function add_wishlist(Request $request)
    {
        $customer_id=Auth::id();
        $wishlist=new Wishlist;
        $wishlist->inventory_id=$request->inventory_id;
        $wishlist->product_id=$request->product_id;
        $wishlist->customer_id=$customer_id;

        $wishlist->save();
        return json_encode(array('response'=>"Added To Wishlist"));

    }

    public function remove_wishlist(Request $request)
    {
        $customer_id=Auth::id();
        $wishlist_item=Wishlist::where('inventory_id',$request->inventory_id)
                                ->where('customer_id',$customer_id)->first();
        //dd($wishlist_item);
        $wishlist_item->delete();

        return json_encode(array('response'=>"remove from wishlist"));
    }

    public function update_wishlist_count()
    {
        $count=count($this->wishlist());
        //dd($count);
        return $count;

    }
}
