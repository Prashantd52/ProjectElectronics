<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $category_sub_group=$this->category_sub_group();
        $categories=$this->categories();
        $products=$this->products();
        $img_url=$this->server_image_path;
        $blogs=$this->blogs();
        
        return view('blog.blog_sticky_sidebar',compact('category_sub_group','categories','products','img_url','blogs'));
    }

    public function blog_post($slug)
    {
        //dd($slug);
        $category_sub_group=$this->category_sub_group();
        $categories=$this->categories();
        $products=$this->products();
        $img_url=$this->server_image_path;
        $blogs=$this->blogs();
        return view('blog.blog_post',compact('category_sub_group','categories','products','img_url','blogs','slug'));
    }
}
