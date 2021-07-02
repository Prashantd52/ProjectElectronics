@php
  $total_products=0;
@endphp 
<div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 " data-grid-tab-content>
@foreach($searched as $product)
  @php
    $wished=0;
    if(count($wished_items) > 0)
    {
      foreach($wished_items as $wished_item)
      {
        if($wished_item->inventory_id == $product->id)
          $wished=1;
      }
    }
  @endphp 
  <div class="prd prd--style2 prd-labels--max prd-labels-shadow " style="opacity:1;">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product',$product->slug)}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" alt="{{$product->name}}" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        @if($wished == 1)
                        <a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"  title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                        @else
                            <a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"  title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                            <a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        @endif
                        <a href="#" class="circle-label-qview prd-hide-mobile" onclick="getQuickviewData('{{route('electronic.product',$product->slug)}}','{{$product->name}}','{{$img_url}}{{$product->img_path}}','{{$product->description}}',{{$product->min_price +0}})"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                        {{--<!-- <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a> -->--}}
                        
                      </div>
                      
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">{{$product->name}}</a></h2>
                        <div class="prd-description">
                        {!! $product->description !!}
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"{{route('electronic.product',$product->slug)}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        {{--<!-- <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div> -->--}}
                        <div class="prd-price">
                          <div class="price-new">$ {{$product->min_price +0}}</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              @if($product->stock_quantity)
                              <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})" data-product='{"name": "Leather Pegged Pants", "path":"{{$img_url}}{{$product->img_path}}", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                              @else
                              <button class="btn btn-secondary" title="Out of stock" disabled >Add To Cart</button>
                              @endif
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
  </div> 
  @php
  $total_products++;
  @endphp            
@endforeach
@if($total_products==0)
  <div class="col-lg aside">
            <div class="prd-grid-wrap">
              <div class="page404-bg">
                <div class="page404-text">
                  <div class="txt3"><i class="icon-shopping-bag"></i></div>
                  <div class="txt4">Unfortunately, there are no products<br>matching the search result</div>
                </div>
                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
                  <g transform="translate(50,50)">
                    <path class="p" d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                  </g>
                </svg>
              </div>
            </div>
  </div>
@endif
</div>
@if(count($searched)<$itemCount)
<!-- <div class="loader-horizontal-sm js-loader-horizontal-sm d-none" data-loader-horizontal style="opacity: 0;"><span></span></div> -->
    <div class="circle-loader-wrap">
        <div class="circle-loader">
            <a href="#" id="customLoadMore" data-total="{{$itemCount}}" data-loaded="{{count($searched)}}" data-load="4" class="lazyload js-circle-loader">
                <svg id="svg_d" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50%" cy="50%" r="63" fill="transparent"></circle>
                    <circle class="js-circle-bar" cx="50%" cy="50%" r="63" fill="transparent"></circle>
                </svg>
                <svg id="svg_m" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50%" cy="50%" r="50" fill="transparent"></circle>
                    <circle class="js-circle-bar" cx="50%" cy="50%" r="50" fill="transparent"></circle>
                </svg>
                  <div class="circle-loader-text">Load More</div>
                  <div class="circle-loader-text-alt"><span >{{count($searched)}}</span>&nbsp;out of&nbsp;<span >{{$itemCount}}</span></div>
            </a>
        </div>
    </div>
</div>
@endif
<script>
//----------loadMore----------
    $("#customLoadMore").click(function (){ 
        console.log("hello");           
        var loaded_data = {{count($searched)}};
        console.log(loaded_data);
        console.log(searchByBrand);
        console.log(searchByPrice);
        $.ajax({
            url:"{{route('searchOnFilter')}}",
            type:'GET',
            data:{
                search: search,
                loadedProducts: loaded_data,
                //category_id: id,
                brandName: searchByBrand,
                price: searchByPrice,
                
            },
            success: function(response)
            {
                console.log("loadmoredone");
                $('#productlisting').html(response.data);
            }
        })
    });
</script>