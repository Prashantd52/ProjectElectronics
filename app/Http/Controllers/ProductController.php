<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class ProductController extends Controller
{
    public function product($slug=null)
    {   
        //dd($slug);
        
        $product=true;

        $wished_items=$this->wishlist();
        //dd($products);
        return view('electronic.product',compact('product','slug','wished_items'));
    }

    public function quickview(Request $request)
    {
        //
        $product=Inventory::where('slug',$request->product_slug)->first();

        return view('electronic.quickview')->withProduct($product);
    }
}
