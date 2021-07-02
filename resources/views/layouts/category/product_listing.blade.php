@php
  $total_products=0;
@endphp 
<div class="prd-grid {{--product-listing--}} data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid " data-grid-tab-content>
@foreach($inventory as $product)

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
                        @if($wished== 1)
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
                              @if($product->stock_quantity > 0)
                              <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})" data-product='{"name": "Leather Pegged Pants", "path":"{{$img_url}}{{$product->img_path}}", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button> 
                              @else
                                <button class="btn js-prd-addtocart" disabled title="Out of Stock">Add to cart</button>
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
                  <div class="txt4">Unfortunately, there are no products<br>matching the selection</div>
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
              {{--<!-- <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" alt="Leather Pegged Pants" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                        <div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                          <i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                          <ul>
                            <li data-image="images/skins/fashion/products/product-01-1.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-orange.png" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-01-color-2.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-black.png" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-01-color-3.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-red.png" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-01-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-01-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-01-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Leather Pegged Pants</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-1.jpg" alt="Oversize Cotton Dress" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                        <div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                          <i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                          <ul>
                            <li data-image="images/skins/fashion/products/product-02-1.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-orange.png" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-02-color-2.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-red.png" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-02-color-3.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-yellow.png" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-02-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-02-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-02-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Seiko</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Oversize Cotton Dress</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Oversize Cotton Dress", "path":"images/skins/fashion/products/product-02-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Oversize Cotton Dress", "path":"images/skins/fashion/products/product-02-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-03-1.jpg" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-new"><span>New</span></div>
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-03-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-03-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-03-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-03-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-03-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-03-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Banita</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Oversized Cotton Blouse</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-1.jpg" alt="Suede Leather Mini Skirt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-04-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-04-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-04-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Bigsteps</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Suede Leather Mini Skirt</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Suede Leather Mini Skirt", "path":"images/skins/fashion/products/product-04-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Suede Leather Mini Skirt", "path":"images/skins/fashion/products/product-04-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-05-1.jpg" alt="Cotton T-shirt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-05-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-05-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-05-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-05-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-05-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-05-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Cotton T-shirt</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Cotton T-shirt", "path":"images/skins/fashion/products/product-05-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Cotton T-shirt", "path":"images/skins/fashion/products/product-05-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-1.jpg" alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                        <div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                          <i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                          <ul>
                            <li data-image="images/skins/fashion/products/product-06-1.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-grey.png" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-06-color-2.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-green.png" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-06-color-3.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-black.png" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-06-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-06-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-06-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Seiko</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Midi Dress with Belt</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-outstock">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-07-1.jpg" alt="Denim Mini Skirt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-outstock"><span>Sold Out</span></div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-07-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-07-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Banita</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Denim Mini Skirt</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Denim Mini Skirt", "path":"images/skins/fashion/products/product-07-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Denim Mini Skirt", "path":"images/skins/fashion/products/product-07-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-08-1.jpg" alt="Peg Leg Trousers" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-08-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-08-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-08-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-08-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-08-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-08-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Peg Leg Trousers</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Peg Leg Trousers", "path":"images/skins/fashion/products/product-08-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Peg Leg Trousers", "path":"images/skins/fashion/products/product-08-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-1.jpg" alt="Skinny Jeans" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-new"><span>New</span></div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-09-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-09-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-09-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Skinny Jeans</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Skinny Jeans", "path":"images/skins/fashion/products/product-09-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Skinny Jeans", "path":"images/skins/fashion/products/product-09-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-10-1.jpg" alt="Short Sleeve Blouse" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-10-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-10-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-10-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-10-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-10-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-10-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Short Sleeve Blouse</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Short Sleeve Blouse", "path":"images/skins/fashion/products/product-10-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Short Sleeve Blouse", "path":"images/skins/fashion/products/product-10-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-11-1.jpg" alt="Jogger Lounge Pants" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-11-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-11-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-11-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-11-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-11-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-11-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Jogger Lounge Pants</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Jogger Lounge Pants", "path":"images/skins/fashion/products/product-11-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Jogger Lounge Pants", "path":"images/skins/fashion/products/product-11-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-12-1.jpg" alt="Elastic Cuff Joggers Pants" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-12-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-12-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-12-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-12-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-12-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-12-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="{{route('electronic.product')}}">Elastic Cuff Joggers Pants</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Elastic Cuff Joggers Pants", "path":"images/skins/fashion/products/product-12-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Elastic Cuff Joggers Pants", "path":"images/skins/fashion/products/product-12-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->--}}
</div>
@if(count($inventory)<$itemCount)
    <div class="circle-loader-wrap">
        <div class="circle-loader">
            <a href="#" id="customLoadMore" data-total="{{$itemCount}}" data-loaded="{{count($inventory)}}" data-load="4" class="lazyload js-circle-loader">
                <svg id="svg_d" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50%" cy="50%" r="63" fill="transparent"></circle>
                    <circle class="js-circle-bar" cx="50%" cy="50%" r="63" fill="transparent"></circle>
                </svg>
                <svg id="svg_m" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50%" cy="50%" r="50" fill="transparent"></circle>
                    <circle class="js-circle-bar" cx="50%" cy="50%" r="50" fill="transparent"></circle>
                </svg>
                  <div class="circle-loader-text">Load More</div>
                  <div class="circle-loader-text-alt"><span >{{count($inventory)}}</span>&nbsp;out of&nbsp;<span >{{$itemCount}}</span></div>
            </a>
        </div>
    </div>
@endif
<script>
  $("#customLoadMore").click(function (){ 
    console.log("hello");           
    var loaded_data = {{count($inventory)}};
    console.log(loaded_data);
    console.log(brandName);
    console.log(price);
    $.ajax({
            type:'GET',
            url:"{{route('categoryFilter')}}",
            data:{
                slug: slug,
                loadedProducts: loaded_data,
                brandName: brandName,
                price: price,
            },
            success: function(response){
                console.log(response.data);
                $("#productdetail").html(response.data);
                //alert('success');
            }
        })
  });
</script>
