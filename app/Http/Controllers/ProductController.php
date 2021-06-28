<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
