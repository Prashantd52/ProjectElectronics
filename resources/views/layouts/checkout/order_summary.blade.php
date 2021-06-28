
            <h2 class="custom-color">Order Summary &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="{{route('electronic.cart')}}"class="btn icon-cart" title="back to cart"></a></h2>
            <div class="cart-table cart-table--sm pt-3 pt-md-0">
              <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                <div class="cart-table-prd-image text-center">
                  Image
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">Name</div>
                  <div class="cart-table-prd-qty">Qty</div>
                  <div class="cart-table-prd-price">Price</div>
                </div>
              </div>
              @foreach($cartToCheckout as $cart_item)
                @foreach($products as $product)
                  @if($product->id == $cart_item->inventory_id)
                    <div class="cart-table-prd">
                      <div class="cart-table-prd-image">
                        <a href="#" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" alt=""></a>
                      </div>
                      <div class="cart-table-prd-content-wrap">
                        <div class="cart-table-prd-info">
                          <h2 class="cart-table-prd-name"><a href="{{route('electronic.product',$product->slug)}}">{{$product->name}}</a></h2>
                        </div>
                        <div class="cart-table-prd-qty">
                          <div class="qty qty-changer">
                            <input type="text" class="qty-input disabled" value="{{$cart_item->quantity}}" data-min="0" data-max="1000">
                          </div>
                        </div>
                        <div class="cart-table-prd-price-total">
                          ${{$cart_item->quantity * $cart_item->unit_price}}
                        </div>
                      </div>
                    </div>
                    
                  @endif
                @endforeach
                @break
              @endforeach

              <!-- <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="#" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <h2 class="cart-table-prd-name"><a href="{{route('electronic.product')}}">Cascade Casual Shirt</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <input type="text" class="qty-input disabled" value="2" data-min="0" data-max="1000">
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $142.00
                  </div>
                </div>
              </div> -->
            </div>

