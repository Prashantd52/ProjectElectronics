@extends('layouts.master')
@section('title')
    <title>Electronic Checkout Page_1</title>
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
        <h1 class="text-center">Checkout page</h1>
        
        @include('layouts.checkout.checkout_details_type1')
        <div class="mt-3"></div>
        <div class="row">
            <div class="col-md-12">
                @include('layouts.checkout.order_summary')
            </div>
            <div class="col-md-6 mt-2 mt-md-0">
                <br><br>
                @include('layouts.checkout.apply_promocode')
                <div class="clearfix mt-2">
                    <button type="submit" class="btn btn--lg w-100">Place Order</button>
                </div>
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