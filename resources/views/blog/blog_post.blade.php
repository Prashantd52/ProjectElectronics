@extends('layouts.master')
@section('title')
    <title>Electronic Blog Post</title>
@endsection

@section('content')
<div class="page-content">
@php
    foreach($blogs as $blog)
    {
        if($blog->slug==$slug)
        {
            $current_blog=$blog;
            break;
        }
    }
@endphp
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><a href="{{route('electronic.blog')}}"><span>Blogs</span></a></li>
          <li><span>{{$current_blog->title}}</span></li>
         </ul>
      </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1>Blog Post</h1>
            </div>
            <div class="row">
                <div class="col-md-14 aside aside--content">
                    @include('layouts.blog.post')
                    @include('layouts.blog.post_comments')

                    @include('layouts.blog.related_post')
                    <br>
                </div>
                <div class="col-md-4 aside aside--sidebar aside--right">
                    @include('layouts.blog.sidebar')
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
    @include('layouts.payment_note')
@endsection