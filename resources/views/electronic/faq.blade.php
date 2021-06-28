@extends('layouts.master')
@section('title')
    <title>Electronics FAQ's Page </title>
@endsection

@section('content')
<div class="page-content px-2">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><span>FAQS</span></li>
        </ul>
      </div>
    </div>
    <div class="holder">
      <div class="container">
        <!-- Page Title -->
        <div class="page-title text-center">
          <h1>FAQ’S</h1>
        </div>
        <!-- /Page Title -->
        @include('layouts.faq_content')

      </div>
    </div>
    @include('layouts.shop_feature')
</div>
@endsection
@section('footersticky')
    @include('layouts.payment_note')
@endsection