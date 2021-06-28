<div class="holder">
    <div class="container">
        <div class="title-wrap title-md">
          <h2 class="h2-style">NEW ARRIVALS</h2>
        </div>
        <div class="prd-grid-wrap position-relative">
          <div class="prd-grid data-to-show-3 data-to-show-lg-3 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-2 js-category-grid">
          @php
          $subcount=0;
          @endphp
          @foreach($products as $product)
          {{--@if($product->updated_at > '2021-04-19 16:45')--}}
              @php
              $wished=0;
              @endphp
            @if($subcount<=10)
              @if(count($wished_items) > 0)
                @foreach($wished_items as $wished_item)
                  @if($wished_item->inventory_id == $product->id)
                    @php
                    $wished=1;
                    @endphp
                  @endif
                @endforeach
              @endif
            <div class="prd prd-hor ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="{{route('electronic.product',$product->slug)}}" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" alt="{{$product->name}}" class="js-prd-img lazyload">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-circle-labels">
                      <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                        <div class="countdown-circle">
                          <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    
                    @if($wished== 1)
                        <a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"  title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                        {{--<!-- <a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"  title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                        <a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> -->--}}
                    @else
                        <a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"  title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                        <a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    @endif
                    <a href="#" class="circle-label-qview  prd-hide-mobile" onclick="getQuickviewData('{{route('electronic.product',$product->slug)}}','{{$product->name}}','{{$img_url}}{{$product->img_path}}','{{$product->description}}',{{$product->min_price +0}})" ><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <h2 class="prd-title"><a href="{{route('electronic.product',$product->slug)}}">{{$product->name}}</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                  </div>
                  <div class="prd-hovers">
                    {{--<!-- <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" onclick="remove_from_wishlist({{$product->id}})" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div> -->--}}
                    <div class="prd-price">
                      <div class="prd-price-wrap">
                        <div class="price-old">$ 200</div>
                        <div class="price-new">$ {{$product->min_price +0}}</div>
                      </div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        
                        @if($product->stock_quantity)
                        <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"{{route('electronic.product',$product->slug)}}", "aspect_ratio":0.778}'>Add To Cart</button>
                        @else
                        <button class="btn btn-secondary" title="Out of stock" disabled >Add To Cart</button>
                        @endif
                      </div>
                      <div class="prd-action-right">
                        <div class="prd-action-right-inside">
                          <div class="prd-tag"><a href="#">FOXic</a></div>
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @php
            $subcount++;
            @endphp
          @endif
          @endforeach
            <!-- <div class="prd prd-hor ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-01-1.jpg" alt="iPhone X" class="js-prd-img lazyload">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-circle-labels">
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
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">iPhone X</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-old">$ 200</div>
                      <div class="price-new">$ 180</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "iPhone X", "path":"images/skins/electronics/products/product-01-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                        </form>
                      </div>
                      <div class="prd-action-right">
                        <div class="prd-action-right-inside">
                          <div class="prd-tag"><a href="#">FOXic</a></div>
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="prd prd-hor ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-02-1.jpg" alt="QLED TV" class="js-prd-img lazyload">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-circle-labels">
                      <div class="label-new"><span>New</span></div>
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">QLED TV</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-new">$ 180</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "QLED TV", "path":"images/skins/electronics/products/product-02-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                        </form>
                      </div>
                      <div class="prd-action-right">
                        <div class="prd-action-right-inside">
                          <div class="prd-tag"><a href="#">FOXic</a></div>
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="prd prd-hor ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-03-1.jpg" alt="Microsoft Laptop" class="js-prd-img lazyload">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-circle-labels">
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Microsoft Laptop</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-new">$ 180</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "Microsoft Laptop", "path":"images/skins/electronics/products/product-03-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                        </form>
                      </div>
                      <div class="prd-action-right">
                        <div class="prd-action-right-inside">
                          <div class="prd-tag"><a href="#">FOXic</a></div>
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="prd prd-hor ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-04-1.jpg" alt="Smart speaker 50 watts" class="js-prd-img lazyload">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-circle-labels">
                      <div class="label-sale"><span>-50% <span class="sale-text">Sale</span></span>
                      </div>
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Smart speaker 50 watts</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-old">$ 149</div>
                      <div class="price-new">$ 299</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "Smart speaker 50 watts", "path":"images/skins/electronics/products/product-04-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                        </form>
                      </div>
                      <div class="prd-action-right">
                        <div class="prd-action-right-inside">
                          <div class="prd-tag"><a href="#">FOXic</a></div>
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="prd prd-hor ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-05-1.jpg" alt="Black Headphones" class="js-prd-img lazyload">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-circle-labels">
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Black Headphones</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-new">$ 280</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "Black Headphones", "path":"images/skins/electronics/products/product-05-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                        </form>
                      </div>
                      <div class="prd-action-right">
                        <div class="prd-action-right-inside">
                          <div class="prd-tag"><a href="#">FOXic</a></div>
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="prd prd-hor ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-06-1.jpg" alt="Laser scanner" class="js-prd-img lazyload">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-circle-labels">
                      <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                      </div>
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Laser scanner</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-old">$ 200</div>
                      <div class="price-new">$ 180</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "Laser scanner", "path":"images/skins/electronics/products/product-06-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                        </form>
                      </div>
                      <div class="prd-action-right">
                        <div class="prd-action-right-inside">
                          <div class="prd-tag"><a href="#">FOXic</a></div>
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
    </div>
</div>

