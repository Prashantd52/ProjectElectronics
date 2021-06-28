@php
$current_product=0;
@endphp

@extends('layouts.master')
@section('title')
    <title>Electronics Product page</title>
@endsection

@section('content')
<div class="page-content px-2">
  @foreach($products as $product)
  @if($product->slug==$slug)
                  @php
                  $wished=0;
                  @endphp
                  @if(count($wished_items) > 0)
                    @foreach($wished_items as $wished_item)
                      @if($wished_item->inventory_id == $product->id)
                        @php
                        $wished=1;
                        @endphp
                      @endif
                    @endforeach
                  @endif  
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><a href="{{route('electronic.category',$product->category_slug)}}">{{$product->category_name}}</a></li>
          <li><span>{{$product->name}}</span></li>
        </ul>
      </div>
    </div>
    <div class="holder">
      <div class="container js-prd-gallery" id="prdGallery">
        @include('layouts.product_page.product_title')
        <div class="row prd-block prd-block--prv-bottom">

          @include('layouts.product_page.product_gallery')
          
          @include('layouts.product_page.short_description')

        </div>
      </div>
    </div>
    @include('layouts.product_page.feature')
    @include('layouts.product_page.details')
    @php
    $current_product=$product;
    break;
    @endphp
  @endif
  @endforeach  
  @include('layouts.product_page.you_may_like')
    
</div>
  @include('layouts.shop_feature')
  <br>
@endsection


@section('footersticky')
  
    @include('layouts.sticky_add_to_cart')
    @include('layouts.added_to_cart')
    @include('layouts.select_options')
    @include('layouts.payment_note')
@endsection
