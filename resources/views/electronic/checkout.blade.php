@extends('layouts.master')
@section('title')
    <title>electronics checkout page</title>
@endsection

@section('content')
<div class="page-content px-2">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><span>Checkout</span></li>
        </ul>
      </div>
    </div>
    <div class="holder">
        <div class="container">
            <h1 class="text-center">Checkout wizard</h1>
            <div class="row">
                
                @include('layouts.checkout.checkout_details') 
                <div class="col-md-8 pl-lg-8 mt-2 mt-md-0">
                  @include('layouts.checkout.order_summary')
                  <div class="mt-2"></div>
                  @include('layouts.checkout.apply_promocode')
                  @include('layouts.checkout.order_comment')
                </div>
            </div> 
        </div>
    </div>  
</div>
@endsection
@section('footer')
    @include('layouts.shop_feature')
@endsection

@section('footersticky')
    @include('layouts.added_to_cart')
    @include('layouts.payment_note')
@endsection