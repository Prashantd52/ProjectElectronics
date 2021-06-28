@extends('layouts.master')
@section('title')
    <title>Electronic Checkout Page_2</title>
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
        <h1 class="text-center">Checkout accordion</h1>
        <div class="row">
            @include('layouts.checkout.checkout_details_type2')
            <div class="col-md-10 pl-lg-8 mt-2 mt-md-0">
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