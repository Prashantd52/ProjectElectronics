@extends('layouts.master')
@section('title')
    <title>Electronics Blog Page </title>
@endsection

@section('content')
<div class="page-content">
    @include('layouts.blog.destination')
    <div class="holder px-3">
            <div class="page-title text-center">
                <h1>Our Blog</h1>
            </div>
            <div class="row off-sidebar">
                @include('layouts.blog.blog_list')
            </div>
    </div>
</div>
@include('layouts.shop_feature')
@endsection
@section('footersticky')
    @include('layouts.payment_note')
@endsection