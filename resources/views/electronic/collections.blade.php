@extends('layouts.master')
@section('title')
    <title>Electronic Collecton Page</title>
@endsection

@section('content')
<div class="page-content px-2">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          @foreach($category_sub_group as $catsubgrp)
          @if($catsubgrp->id == $subgroupid)
          <li><span>{{$catsubgrp->name}}</span></li>
          @endif
          @endforeach
          <li><span>Collections</span></li>
        </ul>
      </div>
    </div>
    <div class="holder">
      <div class="container">
        <div class="page-title text-center">
          <div class="title">
            <h1>Collections</h1>
          </div>
        </div>
        @include('layouts.collection_available')
        @include('layouts.product_page.you_may_like')
      </div> 
    </div> 
  </div>
@endsection