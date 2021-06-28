@extends('layouts.master')
@section('title')
    <title>Electronics Index page</title>
@endsection

@section('content')
<div class='page-content px-2'>    
    @include('layouts.slider_top')
    @include('layouts.shop_feature')
       
    @include('layouts.available_products')

    @include('layouts.new_arrivals')   

    @include('layouts.our_partners')

    @include('layouts.featured_products') 
       
    @include('layouts.banner.home_page_small_banner')
    
</div>
    @include('electronic.newsletter')
    @include('layouts.popup_to_subscribe')
@endsection
@section('footersticky')
    @include('layouts.added_to_cart') 
    @include('layouts.select_options')
    @include('layouts.payment_note')
@endsection 
