@extends('layouts.master')
@section('title')
<title>Search Page</title>
@endsection

@section('content')
<div class="page-content mx-2">
    <div class="holder">
        <div class="container">
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