<?php

namespace App\Http\Controllers;
use DB;
use App\Inventory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public $searchLimit = 4;
    public function search_items(Request $request)
    {
        //dd($request);
            $search=($request->search)?$request->search:'';
            $searched_products=$this->searchInventory($search);
            //dd($searched_products);
            
            $temp_searched=$this->giveMeUnRepeated($searched_products); // gives unrepeated inventory
            $itemCount=count($temp_searched);            
            //dd($searched_categories, $searched_inventories,$searched);
            $wished_items=$this->wishlist();
            $category=true;

            $brands=$this->getuniqueBrands($searched_products);
            //dd($brands);
            $searched=array();
            $viewLimit=0;

            $viewLimit= $this->searchLimit;
            $temp_index=0;

            foreach($temp_searched as $temp)
            {
                if($temp_index < $viewLimit)
                    array_push($searched,$temp);
                $temp_index++;
            }
                return view('electronic.searchpage',Compact('searched','wished_items','category','search','brands','itemCount'));
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
            $temp_searched=$this->giveMeUnRepeated($search_products_bycategory); // gives unrepeated inventory
            
        }
        elseif($request->brandName && $request->price)
        {
            //dd($request->brandName);
            foreach($searched_products as $product)
            {
                if($product->brand==$request->brandName && ($request->price!="Above $3000"? ($product->sale_price <= $request->price) : ($product->sale_price > 3000) ) )
                {
                    array_push($search_products_bybrand,$product);
                }
            }
            $temp_searched=$this->giveMeUnRepeated($search_products_bybrand); // gives unrepeated inventory
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
            $temp_searched=$this->giveMeUnRepeated($search_products_bybrand); // gives unrepeated inventory
            //dd($searched);
            //return view('layouts.search.product_listing',Compact('searched','wished_items','search'));

        }
        elseif($request->price)
        {
            //dd($searched_products_byPrice);
            if($request->price!="Above $3000")
            {  
                foreach($searched_products as $product)
                {
                    if($product->sale_price <= $request->price)
                    {
                        array_push($search_products_byPrice,$product);
                        //dd($product);
                    }
                }
                //dd($search_products_byPrice);

                $temp_searched=$this->giveMeUnRepeated($search_products_byPrice); // gives unrepeated inventory
                
            }
            // elseif($request->price=="Under $1000")
            // {
            //     //dd($request->price);
            //     foreach($searched_products as $product)
            //     {
            //         if($product->sale_price < 1000)
            //         {
            //             array_push($search_products_byPrice,$product);
            //         }
            //     }
            //     $searched=$this->giveMeUnRepeated($search_products_byPrice); // gives unrepeated inventory
            // }
            // elseif($request->price=="Under $2000")
            // {
            //     //dd($request->price);
            //     foreach($searched_products as $product)
            //     {
            //         if(($product->sale_price+0) < 2000)
            //         {
            //             array_push($search_products_byPrice,$product);
            //         }
            //     }
            //     $searched=$this->giveMeUnRepeated($search_products_byPrice); // gives unrepeated inventory
            // }

            // elseif($request->price=="Under $3000")
            // {
            //     //dd($request->price);
            //     foreach($searched_products as $product)
            //     {
            //         if(($product->sale_price+0) < 3000)
            //         {
            //             array_push($search_products_byPrice,$product);
            //         }
            //     }
            //     $searched=$this->giveMeUnRepeated($search_products_byPrice); // gives unrepeated inventory
            // }

            elseif($request->price=="Above $3000")
            {
                //dd($request->price);
                foreach($searched_products as $product)
                {
                    if(($product->sale_price+0) > 3000)
                    {
                        array_push($search_products_byPrice,$product);
                    }
                }
                $temp_searched=$this->giveMeUnRepeated($search_products_byPrice); // gives unrepeated inventory
            }
            //dd($searched);
            // return view('layouts.search.product_listing',Compact('searched','wished_items','search'));
        }
        else
        {
            $temp_searched=$this->giveMeUnRepeated($searched_products);
        }

        $itemCount=count($temp_searched);
        $searched=array();
         $viewLimit=0;

        if($request->loadedProducts)    //----------when load more performs action----
        {
            $viewLimit= $this->searchLimit + $request->loadedProducts;
        }
        else
        {
            $viewLimit= $this->searchLimit;
        }

        $temp_index=0;

        foreach($temp_searched as $temp)
        {
            if($temp_index < $viewLimit)
                array_push($searched,$temp);
            $temp_index++;
        }
        
        $return_Html= view('layouts.search.product_listing',Compact('searched','wished_items','itemCount'))->render();
        return array('data'=>$return_Html, 'itemCount'=>$itemCount);

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
