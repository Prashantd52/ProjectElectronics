<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public $inventoryLimit=4;

    public function category($slug)
    {
        //dd($slug);
        $sortBy="latest";
        $category_inventory=$this->getInventoryForCategory($slug,$sortBy);
        $temp_inventory=$this->giveMeUnRepeated($category_inventory);
        $brands=$this->getuniqueBrands($category_inventory);
        //dd($category_inventory);
        //dd($temp_inventory,$brands);
        $category=true;
        $wished_items=$this->wishlist();
        $itemCount=count($temp_inventory);

        $inventory=array();
        $viewLimit=0;

        $viewLimit= $this->inventoryLimit;
        $temp_index=0;

        foreach($temp_inventory as $temp)
        {
            if($temp_index < $viewLimit)
                array_push($inventory,$temp);
            $temp_index++;
        }
        return view('electronic.category',compact('category','wished_items','inventory','brands','slug','itemCount'));
    }

    public function category_empty()
    {
        
        $category=true;
        $wished_items=$this->wishlist();
        return view('electronic.category_empty',compact('category','wished_items'));
    }


    public function getInventoryForCategory($slug,$sortBy)
    {
        if($sortBy=='latest')
        {
            return DB::table('inventories')->join('products','products.id','=','inventories.product_id')
                                        ->join('category_product','category_product.product_id','=','products.id')
                                        ->join('categories','categories.id','=','category_product.category_id')
                                        ->join('images','inventories.id','=','images.imageable_id')
                                        ->where('images.imageable_type','App\Inventory')
                                        ->where('images.featured',1)
                                        ->where('categories.slug',$slug)
                                        ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','category_product.category_id','categories.category_sub_group_id','categories.name as category_name','categories.slug as category_slug','images.path as img_path')
                                        ->orderby('created_at','DESC')
                                        ->get();
        }
        elseif($sortBy=='LTH')
        {
            return DB::table('inventories')->join('products','products.id','=','inventories.product_id')
                                    ->join('category_product','category_product.product_id','=','products.id')
                                    ->join('categories','categories.id','=','category_product.category_id')
                                    ->join('images','inventories.id','=','images.imageable_id')
                                    ->where('images.imageable_type','App\Inventory')
                                    ->where('images.featured',1)
                                    ->where('categories.slug',$slug)
                                    ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','category_product.category_id','categories.category_sub_group_id','categories.name as category_name','categories.slug as category_slug','images.path as img_path')
                                    ->orderby('sale_price','ASC')
                                    ->get();
        }
        elseif($sortBy=='HTL')
        {
            return DB::table('inventories')->join('products','products.id','=','inventories.product_id')
                                    ->join('category_product','category_product.product_id','=','products.id')
                                    ->join('categories','categories.id','=','category_product.category_id')
                                    ->join('images','inventories.id','=','images.imageable_id')
                                    ->where('images.imageable_type','App\Inventory')
                                    ->where('images.featured',1)
                                    ->where('categories.slug',$slug)
                                    ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','category_product.category_id','categories.category_sub_group_id','categories.name as category_name','categories.slug as category_slug','images.path as img_path')
                                    ->orderby('sale_price','DESC')
                                    ->get();
        }
    }


    public function filter(Request $request)
    {
        //dd($request);
        $wished_items=$this->wishlist();

        $category_inventory=$this->getInventoryForCategory($request->slug,$request->sortBy);
        if($request->brandName!="" && $request->price!="") //filter for brand and price both selected
        {
           //dd($request,$category_inventory);
            $brandwiseInventory=array();
            foreach($category_inventory as $invent)
            {
                if($invent->brand == $request->brandName && ($request->price!="Above $3000"?($invent->sale_price <= $request->price):($invent->sale_price > 3000)))
                {
                    array_push($brandwiseInventory,$invent);
                }
            }
            $temp_inventory=$this->giveMeUnRepeated($brandwiseInventory);    
        }
        elseif($request->brandName)         // filter when only brand selected
        {
           //dd($request,$category_inventory);
            $brandwiseInventory=array();
            foreach($category_inventory as $invent)
            {
                if($invent->brand == $request->brandName)
                {
                    array_push($brandwiseInventory,$invent);
                }
            }
            $temp_inventory=$this->giveMeUnRepeated($brandwiseInventory);    
        }
        elseif($request->price)         //filter when only price selected
        {
            $pricewiseInventory=array();

            if($request->price!="Above $3000")
            {
                foreach($category_inventory as $invent)
                {
                    if($invent->sale_price <=$request->price )
                    {
                        array_push($pricewiseInventory,$invent);
                    }
                }
            }
            
            // elseif($request->price=="Under $1000")
            // {
            //     foreach($category_inventory as $invent)
            //     {
            //         if($invent->sale_price < 1000)
            //         {
            //             array_push($pricewiseInventory,$invent);
            //         }
            //     } 
            // }
            // elseif($request->price=="Under $2000")
            // {
            //     foreach($category_inventory as $invent)
            //     {
            //         if($invent->sale_price < 2000)
            //         {
            //             array_push($pricewiseInventory,$invent);
            //         }
            //     } 
            // }
            // elseif($request->price=="Under $3000")
            // {
            //     foreach($category_inventory as $invent)
            //     {
            //         if($invent->sale_price < 3000)
            //         {
            //             array_push($pricewiseInventory,$invent);
            //         }
            //     } 
            // }
            elseif($request->price=="Above $3000")
            {
                foreach($category_inventory as $invent)
                {
                    if($invent->sale_price > 3000)
                    {
                        array_push($pricewiseInventory,$invent);
                    }
                } 
            }

            $temp_inventory=$this->giveMeUnRepeated($pricewiseInventory);

        }
        else
        {
            $temp_inventory=$this->giveMeUnRepeated($category_inventory);
        }
        $itemCount=count($temp_inventory);
        //dd($category_inventory,$brandwiseInventory);
        if($request->searchlimit)
        {
            $this->inventoryLimit = $request->searchlimit;
        }
        $inventory=array();
        $viewLimit=0;

        if($request->loadedProducts)    //----------when load more performs action----
        {
            $viewLimit= $this->inventoryLimit + $request->loadedProducts;
        }
        else
        {
            $viewLimit= $this->inventoryLimit;
        }

        $temp_index=0;

        foreach($temp_inventory as $temp)
        {
            if($temp_index < $viewLimit)
                array_push($inventory,$temp);
            $temp_index++;
        }

        $return_Html =view('layouts.category.product_listing',compact('wished_items','inventory','itemCount'))->render();
        return array('data'=>$return_Html, 'itemCount'=>$itemCount);
        
    }
}
