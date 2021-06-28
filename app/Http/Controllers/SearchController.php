<?php

namespace App\Http\Controllers;
use DB;
use App\Inventory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search_items(Request $request)
    {
        $search=($request->search)?$request->search:'';
            $searched_products=$this->searchInventory($search);
            //dd($searched_products);
            
            $searched=$this->giveMeUnRepeated($searched_products); // gives unrepeated inventory
            //dd($searched);
            
            //dd($searched_categories, $searched_inventories,$searched);
            $wished_items=$this->wishlist();
            $category=true;

            $brands=$this->getuniqueBrands($searched_products);
            //dd($brands);
            return view('electronic.searchpage',Compact('searched','wished_items','category','search','brands'));
        
    }

    public function search_on_filter(Request $request)
    {
        //dd($request);
        $search=($request->search)?$request->search:'';
        $searched_products=$this->searchInventory($search);
        $search_products_bycategory=array();
        $search_products_bybrand=array();
        $search_products_byPrice=array();
        $wished_items=$this->wishlist();

        if($request->category_id)
        {
            foreach($searched_products as $product)
            {
                if($product->category_id ==$request->category_id)
                {
                    array_push($search_products_bycategory,$product);
                }
            }
            //dd($search_products_bycategory);
            $searched=$this->giveMeUnRepeated($search_products_bycategory); // gives unrepeated inventory
            // $search=($request->search)?$request->search:'';
            // $searched_inventories=Inventory::join('products','products.id','=','inventories.product_id')
            //                     ->join('category_product','category_product.product_id','=','products.id')
            //                     ->join('categories','categories.id','=','category_product.category_id')
            //                     ->join('images','inventories.id','=','images.imageable_id')
            //                     ->where('images.imageable_type','App\Inventory')
            //                     ->where('images.featured',1)
            //                     ->where('categories.id',$request->category_id)
            //                     ->where('inventories.title','LIKE' ,"%$search%")
            //                     ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','category_product.category_id','categories.category_sub_group_id','categories.name as category_name','categories.slug as category_slug','images.path as img_path')
            //                     ->get();
            
            // $searched_products=array();
            // foreach($searched_inventories as $inventory)
            // {
            //     array_push($searched_products,$inventory);
            // }
                                
            // $searched_categories=Inventory::join('products','products.id','=','inventories.product_id')
            //                     ->join('category_product','category_product.product_id','=','products.id')
            //                     ->join('categories','categories.id','=','category_product.category_id')
            //                     ->join('images','inventories.id','=','images.imageable_id')
            //                     ->where('images.imageable_type','App\Inventory')
            //                     ->where('images.featured',1)
            //                     ->where('categories.id',$request->category_id)
            //                     ->Where('categories.name','LIKE' ,"%$search%")
            //                     //->where('inventories.title','LIKE' ,"%$search%")
            //                     ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','category_product.category_id','categories.category_sub_group_id','categories.name as category_name','categories.slug as category_slug','images.path as img_path')
            //                     ->get();
            // //return $searched_inventories;

            

            // foreach($searched_categories as $category)
            // {
            //     array_push($searched_products,$category);
            // }

            //$searched=$this->giveMeUnRepeated($searched_products);// gives unrepeated inventory

            // $wished_items=$this->wishlist();
            //dd($searched);

        
            //return view('layouts.search.product_listing',Compact('searched','wished_items','search'));
        }
        elseif($request->brandName)
        {
            //dd($request->brandName);
            foreach($searched_products as $product)
            {
                if($product->brand==$request->brandName)
                {
                    array_push($search_products_bybrand,$product);
                }
            }
            $searched=$this->giveMeUnRepeated($search_products_bybrand); // gives unrepeated inventory
            //dd($searched);
            //return view('layouts.search.product_listing',Compact('searched','wished_items','search'));

        }
        elseif($request->price)
        {
            //dd($searched_products_byPrice);
            if($request->price == "Under $100")
            {  
                foreach($searched_products as $product)
                {
                    if($product->sale_price < 100)
                    {
                        array_push($search_products_byPrice,$product);
                        //dd($product);
                    }
                }
                //dd($search_products_byPrice);

                $searched=$this->giveMeUnRepeated($search_products_byPrice); // gives unrepeated inventory
                
            }
            elseif($request->price=="$100-$200")
            {
                //dd($request->price);
                foreach($searched_products as $product)
                {
                    if($product->sale_price >= 100 && $product->sale_price <= 200)
                    {
                        array_push($search_products_byPrice,$product);
                    }
                }
                $searched=$this->giveMeUnRepeated($search_products_byPrice); // gives unrepeated inventory
            }
            elseif($request->price=="Above $200")
            {
                //dd($request->price);
                foreach($searched_products as $product)
                {
                    if(($product->sale_price+0) > 200)
                    {
                        array_push($search_products_byPrice,$product);
                    }
                }
                $searched=$this->giveMeUnRepeated($search_products_byPrice); // gives unrepeated inventory
            }
            //dd($searched);
            // return view('layouts.search.product_listing',Compact('searched','wished_items','search'));
        }

        return view('layouts.search.product_listing',Compact('searched','wished_items','search'));
    }


    

    public function searchInventory($search)
    {
        $category_sub_group=$this->category_sub_group();
        $category_sub_group_id=array();
        
        foreach($category_sub_group as $cat_sub_grp)
        {  
            $category_sub_group_id[]=$cat_sub_grp->id;
        }

        
        $searched_inventories=Inventory::join('products','products.id','=','inventories.product_id')
                                ->join('category_product','category_product.product_id','=','products.id')
                                ->join('categories','categories.id','=','category_product.category_id')
                                ->join('images','inventories.id','=','images.imageable_id')
                                ->where('images.imageable_type','App\Inventory')
                                ->where('images.featured',1)
                                ->whereIn('category_sub_group_id',$category_sub_group_id)
                                //->Where('categories.name','LIKE' ,"%$search%")
                                ->where('inventories.title','LIKE' ,"%$search%")
                                ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','category_product.category_id','categories.category_sub_group_id','categories.name as category_name','categories.slug as category_slug','images.path as img_path')
                                ->orderby('created_at','DESC')
                                ->get();
        
        $searched_products=array();
        foreach($searched_inventories as $inventory)
        {
            array_push($searched_products,$inventory);
        }
        
        
        $searched_categories=Inventory::join('products','products.id','=','inventories.product_id')
                                ->join('category_product','category_product.product_id','=','products.id')
                                ->join('categories','categories.id','=','category_product.category_id')
                                ->join('images','inventories.id','=','images.imageable_id')
                                ->where('images.imageable_type','App\Inventory')
                                ->where('images.featured',1)
                                ->whereIn('category_sub_group_id',$category_sub_group_id)
                                ->Where('categories.name','LIKE' ,"%$search%")
                                //->where('inventories.title','LIKE' ,"%$search%")
                                ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','category_product.category_id','categories.category_sub_group_id','categories.name as category_name','categories.slug as category_slug','images.path as img_path')
                                ->orderby('created_at','DESC')
                                ->get();
        foreach($searched_categories as $category)
        {
            array_push($searched_products,$category);
        }
        return $searched_products;
    }
}
