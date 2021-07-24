@extends('layouts.master')
@section('title')
    <title>Electronics Cart Page</title>
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
    <div class="page-title text-center">
        <h1>Shopping Cart</h1>
    </div>
    @foreach($customer_carts as $cart)
        
        <form action="{{route('CartUpdate')}}" method="post">
        @csrf()
        @method('put')
        <input type="hidden" name="cart_id" value="{{$cart->id}}">
                <div class="row">
                    <!--cartlist-->
                        @include('layouts.cart.cart_list')
                        <br>
                    <!--/cartlist-->
                </div>
        </form>
            
        <hr class="rounded"></hr>
        <br>
    @endforeach
    <div class="text-center mt-1">
        <a href="{{route('delete_carts')}}" class="btn btn--grey">Clear All</a>
    </div>
    <!--shipping option-->
        {{--@include('layouts.cart.shipping_option')--}}
    <!--/shipping option-->
    <!--products you may like-->
        @include('layouts.product_page.you_may_like')
    <!--products you may like-->

    @include('layouts.shop_feature')
</div>
@endsection
@section('footersticky')
    @include('layouts.added_to_cart')
@endsection