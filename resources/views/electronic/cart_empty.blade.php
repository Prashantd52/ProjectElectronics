@extends('layouts.master')
@section('title')
    <title>electronics cart-empty</title>
@endsection
@section('content')
<div class="page-content px-2">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><span>Cart</span></li>
        </ul>
      </div>
    </div>
    @include('layouts.cart.empty')
    @include('layouts.shop_feature')
</div>
@endsection