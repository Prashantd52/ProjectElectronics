<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Inventory;
use App\Faq;
use App\ContactUs;

class ElectronicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        
        $main_slider=$this->main_slider();
        $banners=$this->banners();
        //dd($banners);
        $home_banner=array();
        foreach($banners as $banner)
        {
            //if($banner->group_id=='place_one')
                array_push($home_banner,$banner);
        }
        
        //dd($home_banner);
        //dd($main_slider);

        //dd($img_url);
        
        //dd($category_group_id);
        
        //dd($category_sub_group);

        //dd($category_sub_group_id);
        
        //dd($categories);

        $wished_items=$this->wishlist();
        // dd($wished_items);

        return view('electronic.index',compact('main_slider','home_banner','wished_items'));
    }


    public function gallery()
    {
        //$wished_items=$this->wishlist();
        $cat_grp=$this->my_cat_grp;
        
        $category_sub_group=$this->category_sub_group();
        $category_sub_group_id=array();
        
        foreach($category_sub_group as $cat_sub_grp)
        {  
            $category_sub_group_id[]=$cat_sub_grp->id;
        }
        //dd($cat_grp);
        $subgroup_image=DB::table('category_groups')
                            ->join('category_sub_groups', 'category_groups.id','=','category_sub_groups.Category_group_id')
                            ->join('images','images.imageable_id','=','category_groups.id')
                            ->where('category_groups.name',$cat_grp)
                            ->where('images.imageable_type', 'App\CategoryGroup')
                            ->select('images.*')
                            ->get();
        //dd($subgroup_image);
        $category_img=DB::table('categories')
                            ->join('images','categories.id','=','images.imageable_id')
                            ->where('category_sub_group_id',$category_sub_group_id)
                            ->where('imageable_type','App\Category')
                            ->select('images.*')
                            ->get();
        //dd($category_img);
        $gallery_images=array();
        foreach($subgroup_image as $sub_image)
        {
            array_push($gallery_images, $sub_image);
        }
        foreach($category_img as $cat_img)
        {
            array_push($gallery_images,$cat_img);
        }
        //dd($gallery_images);
        return view('electronic.gallery',Compact('gallery_images'));
    }

    public function faq()
    {
        $faqs=Faq::all();
        return view('electronic.faq')->withFaqs($faqs);
    }

    public function about_us()
    {
        
        $blogs=$this->blogs();
        //dd($blogs);
        return view('electronic.about_us',compact('blogs'));
    }

    public function contact_us()
    {
        
        return view('electronic.contact_us');
    }

    public function msg_contactus(Request $request)
    {
        //dd($request);
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'phone'=>'required|min:10|max:10',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $msg=new ContactUs;
        $msg->name = $request->firstName." ".$request->lastName;
        $msg->phone = $request->phone;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        //dd($msg);
        $msg->save();

        if($msg)
        session()->flash('success', 'Message has been sent');
        else
        session()->flash('danger', 'some error occured');

        return redirect()->back();



    }

    public function error_404()
    {
        $category_sub_group=$this->category_sub_group();
        $categories=$this->categories();
        $products=$this->products();
        $img_url=$this->server_image_path;
        return view('electronic.404',compact('category_sub_group','categories','products','img_url'));
    }

    public function comming_soon()
    {
        return view('electronic.comming_soon');
    }

//------------------------------------Blog--------------------------------------------------

    

//--------------------------------- Blog End -------------------------------------------

    public function typography()
    {
        $category_sub_group=$this->category_sub_group();
        $categories=$this->categories();
        $products=$this->products();
        $img_url=$this->server_image_path;
        return view('electronic.typography',compact('category_sub_group','categories','products','img_url'));
    }

    public function collections($subgroupid=null)
    {
        $wished_items=$this->wishlist();

        return view('electronic.collections',compact('wished_items','subgroupid'));
    }                       

    public function main_slider()
    {
        return DB::table('sliders')
                  ->join('images','sliders.id','=','images.imageable_id')
                  ->where('imageable_type','App\Slider')->get();
    }

    

    
}
