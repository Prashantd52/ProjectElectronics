@extends('layouts.master')
@section('title')
    <title>electronics category page </title>
@endsection

@section('content')
<div  class="page-content mx-3">
    @foreach($categories as $category)
    @if($category->slug==$slug)
        <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
            <li><a href="/">Home</a></li>
            <li><span>{{$category->name}}</span></li>
            </ul>
        </div>
        </div>
        <div class="holder">
            <div class="container "> 
                @include('layouts.category.filter_row')
                <div class="row">
                    @include('layouts.category.filter_side')
                    <div class="col-lg aside">
                        <div class="prd-grid-wrap" id="productdetail">
                            @include('layouts.category.product_listing')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.product_page.you_may_like')
        @break
    @endif
    @endforeach
</div>
<script>

    var slug = "{{$slug}}";
    var brandName ="";
    var price ="";

    $(".brand").click(function(){
        brandName =$(this).html();
        
        console.log(brandName);
        filter();
    })

    $(".price").click(function(){
        var pricecode =$(this).html();
        if(pricecode == "Above $3000")
            price= pricecode;
        else
            price= parseInt(pricecode.replace('Under $',''));
        console.log(price);
        filter();
    })

    function filter()
    {
        console.log(brandName);
        console.log(price);
        $.ajax({
            type:'GET',
            url:"{{route('categoryFilter')}}",
            data:{
                slug: slug,
                brandName: brandName,
                price: price,
                // loadedProducts: loaded_data,
            },
            success: function(response){
                console.log(response.data);
                $("#productdetail").html(response.data);
                $("#catItemCount").html(response.itemCount);
                //alert('success');
            }
        })
    }
</script>
@endsection

@section('footersticky')
    @include('layouts.added_to_cart')
    @include('layouts.payment_note')
@endsection