@php
@$count=0;
@endphp
<div class="holder">
      <div class="container">
        <div class="title-wrap title-md">
          <h2 class="h2-style">FEATURED PRODUCTS</h2>
        </div>
        <div class="prd-grid-wrap position-relative">
          <div class="prd-grid data-to-show-4 data-to-show-lg-4 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-2 js-category-grid">
         
          
          @foreach($categories as $category)
            @foreach($products as $product)
              @if($product->category_id==$category->id) 
                @if($count==0)
                  @php
                  $wished=0;
                  @endphp
                  @if(count($wished_items) > 0)
                    @foreach($wished_items as $wished_item)
                      @if($wished_item->inventory_id == $product->id)
                        @php
                        $wished=1;
                        @endphp
                      @endif
                    @endforeach
                  @endif
                  <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                    <div class="prd-inside">
                      <div class="prd-img-area">
                        <a href="{{route('electronic.product',$product->slug)}}" class="prd-img image-hover-scale image-container">
                          <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" alt="{{$product->name}}" class="js-prd-img lazyload fade-up">
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
                        @if($wished== 1)
                        <a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"  title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                        @else
                            <a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"  title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                            <a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        @endif
                        <a href="#" class="circle-label-qview jprd-hide-mobile" onclick="getQuickviewData('{{route('electronic.product',$product->slug)}}','{{$product->name}}','{{$img_url}}{{$product->img_path}}','{{$product->description}}',{{$product->min_price +0}})"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                          {{--<!-- <a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                            <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>-->--}}
                        </div>
                        <ul class="list-options color-swatch">
                          <li data-image="{{$img_url}}{{$product->img_path}}" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" class="lazyload fade-up" alt="Color Name"></a></li>
                          <li data-image="{{$img_url}}{{$product->img_path}}"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" class="lazyload fade-up" alt="Color Name"></a></li>
                        </ul>
                      </div>
                      <div class="prd-info">
                        <div class="prd-info-wrap">
                          <div class="prd-info-top">
                            <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                          </div>
                          <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                          <div class="prd-tag"><a href="#">FOXic</a></div>
                          <h2 class="prd-title"><a href="{{route('electronic.product',$product->slug)}}">{{$product->name}}</a></h2>
                          <div class="prd-description">
                            Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                          </div>
                          <div class="prd-action">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"{{route('electronic.product',$product->slug)}}", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                        <div class="prd-hovers">
                          <div class="prd-circle-labels">
                            <div><a href="#" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" onclick="remove_from_wishlist({{$product->id}})" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                            <div class="prd-hide-mobile"><a href="#" class="circle-label-qview" onclick="getQuickviewData('{{route('electronic.product',$product->slug)}}','{{$product->name}}','{{$img_url}}{{$product->img_path}}','{{$product->description}}',{{$product->min_price +0}})"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                          </div>
                          <div class="prd-price">
                            <div class="prd-price-wrp">
                              <div class="price-old">$ 200</div>
                              <div class="price-new">${{$product->min_price +0}}</div>
                            </div>
                          </div>
                          <div class="prd-action">
                            <div class="prd-action-left">
                              <!-- <form  action="{{route('addToCart')}}" method="POST">
                                  @csrf()
                                  @method('post')
                                  <input type="hidden" name="product_id" value="{{$product->id}}"></input>
                                  <button class="btn js-prd-addtocart" type="submit" >Add To Cart</button>
                        
                                </form> -->
                                @if($product->stock_quantity)
                                <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"{{route('electronic.product',$product->slug)}}", "aspect_ratio":0.778}' >Add To Cart</button>
                                @else
                                <button class="btn btn-secondary" title="Out of stock" disabled >Add To Cart</button>
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @php
                  $count=1;
                  @endphp
                @endif
              @endif
            @endforeach 
            @php
            $count=0;
            @endphp
          @endforeach  
           <!-- <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
              <div class="prd-inside">
                <div class="prd-img-area">
                  <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-07-1.jpg" alt="Window Air Conditioner" class="js-prd-img lazyload fade-up">
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
                    <li data-image="images/skins/electronics/products/product-07-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-07-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                    <li data-image="images/skins/electronics/products/product-07-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-07-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                  </ul>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">FOXic</a></div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Window Air Conditioner</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "Window Air Conditioner", "path":"images/skins/electronics/products/product-07-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                          <button class="btn js-prd-addtocart" data-product='{"name": "Window Air Conditioner", "path":"images/skins/electronics/products/product-07-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-08-1.jpg" alt="Talking Assistant Column" class="js-prd-img lazyload fade-up">
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
                    <li data-image="images/skins/electronics/products/product-08-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-08-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                    <li data-image="images/skins/electronics/products/product-08-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-08-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                  </ul>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">FOXic</a></div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Talking Assistant Column</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "Talking Assistant Column", "path":"images/skins/electronics/products/product-08-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                          <button class="btn js-prd-addtocart" data-product='{"name": "Talking Assistant Column", "path":"images/skins/electronics/products/product-08-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-09-1.jpg" alt="Silent Mouse" class="js-prd-img lazyload fade-up">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-squared-labels">
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                  <ul class="list-options color-swatch">
                    <li data-image="images/skins/electronics/products/product-09-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-09-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                    <li data-image="images/skins/electronics/products/product-09-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-09-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                  </ul>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">FOXic</a></div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Silent Mouse</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "Silent Mouse", "path":"images/skins/electronics/products/product-09-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                          <button class="btn js-prd-addtocart" data-product='{"name": "Silent Mouse", "path":"images/skins/electronics/products/product-09-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-10-1.jpg" alt="Music Center Pro" class="js-prd-img lazyload fade-up">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-squared-labels">
                      <div class="label-sale"><span>-50% <span class="sale-text">Sale</span></span>
                      </div>
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                  <ul class="list-options color-swatch">
                    <li data-image="images/skins/electronics/products/product-10-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-10-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                    <li data-image="images/skins/electronics/products/product-10-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-10-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                  </ul>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">FOXic</a></div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Music Center Pro</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "Music Center Pro", "path":"images/skins/electronics/products/product-10-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                      </form>
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-old">$ 149</div>
                      <div class="price-new">$ 299</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "Music Center Pro", "path":"images/skins/electronics/products/product-10-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-11-1.jpg" alt="Smart Thermostat" class="js-prd-img lazyload fade-up">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-squared-labels">
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                  <ul class="list-options color-swatch">
                    <li data-image="images/skins/electronics/products/product-11-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-11-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                    <li data-image="images/skins/electronics/products/product-11-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-11-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                  </ul>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">FOXic</a></div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Smart Thermostat</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "Smart Thermostat", "path":"images/skins/electronics/products/product-11-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                      </form>
                    </div>
                  </div>
                  <div class="prd-hovers">
                    <div class="prd-circle-labels">
                      <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                      <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                    </div>
                    <div class="prd-price">
                      <div class="price-new">$ 280</div>
                    </div>
                    <div class="prd-action">
                      <div class="prd-action-left">
                        <form action="#">
                          <button class="btn js-prd-addtocart" data-product='{"name": "Smart Thermostat", "path":"images/skins/electronics/products/product-11-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-12-1.jpg" alt="Smart Watch" class="js-prd-img lazyload fade-up">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-squared-labels">
                      <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                      </div>
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                  <ul class="list-options color-swatch">
                    <li data-image="images/skins/electronics/products/product-12-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-12-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                    <li data-image="images/skins/electronics/products/product-12-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-12-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                  </ul>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">FOXic</a></div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Smart Watch</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "Smart Watch", "path":"images/skins/electronics/products/product-12-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                          <button class="btn js-prd-addtocart" data-product='{"name": "Smart Watch", "path":"images/skins/electronics/products/product-12-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-13-1.jpg" alt="Cable Modem Router" class="js-prd-img lazyload fade-up">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-squared-labels">
                      <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                      </div>
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                  <ul class="list-options color-swatch">
                    <li data-image="images/skins/electronics/products/product-13-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-13-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                    <li data-image="images/skins/electronics/products/product-13-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-13-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                  </ul>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">FOXic</a></div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Cable Modem Router</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "Cable Modem Router", "path":"images/skins/electronics/products/product-13-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                          <button class="btn js-prd-addtocart" data-product='{"name": "Cable Modem Router", "path":"images/skins/electronics/products/product-13-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-14-1.jpg" alt="Music Amplifier Box" class="js-prd-img lazyload fade-up">
                    <div class="foxic-loader"></div>
                    <div class="prd-big-squared-labels">
                      <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                      </div>
                    </div>
                  </a>
                  <div class="prd-circle-labels">
                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                  </div>
                  <ul class="list-options color-swatch">
                    <li data-image="images/skins/electronics/products/product-14-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-14-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                    <li data-image="images/skins/electronics/products/product-14-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/electronics/products/product-14-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                  </ul>
                </div>
                <div class="prd-info">
                  <div class="prd-info-wrap">
                    <div class="prd-info-top">
                      <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    </div>
                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                    <div class="prd-tag"><a href="#">FOXic</a></div>
                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Music Amplifier Box</a></h2>
                    <div class="prd-description">
                      Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                    </div>
                    <div class="prd-action">
                      <form action="#">
                        <button class="btn js-prd-addtocart" data-product='{"name": "Music Amplifier Box", "path":"images/skins/electronics/products/product-14-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
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
                          <button class="btn js-prd-addtocart" data-product='{"name": "Music Amplifier Box", "path":"images/skins/electronics/products/product-14-1.jpg", "url":"{{route('electronic.product')}}", "aspect_ratio":0.778}'>Add To Cart</button>
                        </form>
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

