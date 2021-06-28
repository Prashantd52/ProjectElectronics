<?php

namespace App\Http\Controllers;

use DB;
use View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function master_category()
    // {
    //     $master_category=DB::table('master_categories')
    //     ->where('name','Electronics & Appliances')
    //     ->get();
    //    return $master_category;
    // }

    public $my_cat_grp='Electronics'; //Electronics,Apparel,Laptop & Computer,Hygiene Essentials,Vegetables
    public $server_image_path="http://zcommerce.online/image/";

    public function __construct()
    {
        $category_sub_group=$this->category_sub_group();
        $categories=$this->categories();
        $products=$this->products();
        $img_url=$this->server_image_path;
        

        View::share(['category_sub_group' => $category_sub_group , 'categories' => $categories , 'products' => $products , 'img_url' => $img_url]);
    }


    public function category_sub_group()
    {
        return DB::table('category_groups')
        ->join('category_sub_groups', 'category_groups.id','=','category_sub_groups.Category_group_id')
        ->where('category_groups.name',$this->my_cat_grp)->get();
    }

    public function categories()
    {
        $category_sub_group=$this->category_sub_group();
        $category_sub_group_id=array();
        
        foreach($category_sub_group as $cat_sub_grp)
        {  
            $category_sub_group_id[]=$cat_sub_grp->id;
        }
        return DB::table('categories')
                ->join('images','categories.id','=','images.imageable_id')
                ->where('imageable_type','App\Category')
                ->whereIn('category_sub_group_id',$category_sub_group_id)
                ->select('categories.*','images.path as img_path')->get();

    }

    public function products()
    {
        $category_sub_group=$this->category_sub_group();
        $category_sub_group_id=array();
        
        foreach($category_sub_group as $cat_sub_grp)
        {  
            $category_sub_group_id[]=$cat_sub_grp->id;
        }
        $inventory=DB::table('categories')
                    ->join('category_product','categories.id','=','category_product.category_id')
                    ->join('products','category_product.product_id','=','products.id')
                    ->join('inventories','products.id','=','inventories.product_id')
                    ->join('images','inventories.id','=','images.imageable_id')
                    ->where('images.imageable_type','App\Inventory')
                    ->where('images.featured',1)
                    ->whereIn('category_sub_group_id',$category_sub_group_id)
                    ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','category_product.category_id','categories.category_sub_group_id','categories.name as category_name','categories.slug as category_slug','images.path as img_path')
                    //->inRandomOrder()
                    ->orderby('created_at','DESC')
                    ->get();
        
        return $this->giveMeUnRepeated($inventory);
        
    }


    public function giveMeUnRepeated($inventory) 
        {
            // NOTE:
            // passing array must have main_id parameter else it will not work
            // or replace main_id from your id 
            $new_inventory=array();
            $unique_id=array();
            foreach($inventory as $inv)
            {
                $flag=false;
                foreach($unique_id as $id)
                {
                    if($inv->id==$id)
                    {
                        $flag=true;
                        break;
                    }
                }
                if($flag==false)
                {
                    array_push($new_inventory,$inv);
                    array_push($unique_id,$inv->id);
                }
            }
            return $new_inventory;
        }

    public function banners()
    {
        return DB::table('banners')
                ->join('images','banners.id','=','images.imageable_id')
                ->where('imageable_type','App\Banner')
                ->where('store_type','Electronics')
                ->get();
    }

    public function blogs()
    {
        return DB::table('blogs')->join('images','blogs.id','=','images.imageable_id')
                ->join('users','blogs.user_id','=','users.id')
                ->where('imageable_type','App\Blog')
                ->select('blogs.*','images.path as img_path','users.id as user_id','users.name as published_by')
                ->inRandomOrder()->get();
    }

    public function wishlist()
    {
        $customer_id=Auth::id();

        return DB::table('wishlists')
                    ->where('customer_id',$customer_id)->get();
    }

    public function getuniqueBrands($searched)
    {
        $unique_brand=array();
        foreach($searched as $srch_item)
        {
            if($srch_item->brand!="")
            {
                $flag=false;
                foreach($unique_brand as $brand)
                {
                    if($srch_item->brand == $brand)
                    {
                        $flag=true;
                        break;
                    }
                }
                if($flag==false)
                {
                    array_push($unique_brand,$srch_item->brand);
                }
            }
        }
        return $unique_brand;
    }
}
