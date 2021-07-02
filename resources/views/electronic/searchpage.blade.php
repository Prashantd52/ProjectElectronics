@extends('layouts.master')
@section('title')
<title>Search Page</title>
@endsection

@section('content')
<div class="page-content mx-2">
    <div class="holder">
        <div class="container">
        <!---------------- Filter Row ---------------->
        <div class="filter-row">
          <div class="row">
            <div class="items-count"><span id="catItemCount">{{$itemCount}}</span> item(s)</div>
            <div class="select-wrap d-none d-md-flex">
              <div class="select-label">SORT:</div>
              <div class="select-wrapper select-wrapper-xxs">
                <select class="form-control input-sm">
                  <option value="featured">Featured</option>
                  <option value="rating">Rating</option>
                  <option value="price">Price</option>
                </select>
              </div>
            </div>
            <div class="select-wrap d-none d-md-flex">
              <div class="select-label">VIEW:</div>
              <div class="select-wrapper select-wrapper-xxs">
                <select class="form-control input-sm">
                  <option value="4">4</option>
                  <option value="10">10</option>
                  <option value="50">50</option>
                </select>
              </div>
            </div>  
          </div>
        </div>
        <!---------------- /Filter Row ------------->
            <div class="row">
                @include('layouts.search.filter_side')
                <div class="col-lg aside">
                    <div class="prd-grid-wrap">
                        <div id="productlisting">
                        @include('layouts.search.product_listing')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footersticky')
    @include('layouts.added_to_cart')
@endsection