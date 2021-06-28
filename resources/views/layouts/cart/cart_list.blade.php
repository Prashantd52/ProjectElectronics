
<div class="col-lg-11 col-xl-13">
            <div class="cart-table border border-solid-dark">
              <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                <div class="cart-table-prd-image text-center">
                  Image
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">Name</div>
                  <div class="cart-table-prd-qty">Qty</div>
                  <div class="cart-table-prd-price">Price</div>
                  <div class="cart-table-prd-action">&nbsp;</div>
                </div>
              </div>
              
              @foreach($cart_items as $cart_item)
                @if($cart_item->cart_id == $cart->id)
                    @foreach($products as $product)
                    @if($product->id == $cart_item->inventory_id)
                    <input type="hidden" name="inventory_id_{{$product->id}}"  value="{{$cart_item->inventory_id}}">
                    <input type="hidden" name="price_of_{{$product->id}}" id="price{{$product->id}}" value="{{$product->min_price +0}}">
                    <div class="cart-table-prd">
                      <div class="cart-table-prd-image">
                        <a href="{{route('electronic.product',$product->slug)}}" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" alt=""></a>
                      </div>
                      <div class="cart-table-prd-content-wrap">
                        <div class="cart-table-prd-info">
                          <div class="cart-table-prd-price">
                            <div class="price-old">$200.00</div>
                            <div class="price-new">${{$product->min_price +0}}</div>
                          </div>
                          <h2 class="cart-table-prd-name"><a href="{{route('electronic.product',$product->slug)}}">{{$product->name}}</a></h2>
                        </div>
                        <div class="cart-table-prd-qty">
                          <div class="qty qty-changer">
                            <button class="decrease js-qty-button" onclick="decrease({{$product->id}},{{$product->stock_quantity}})"></button>
                            <input type="text" class="qty-input"  id="quantity{{$product->id}}" name="quantity_of_{{$product->id}}" value="{{$cart_item->quantity}}" data-min="1" data-max="{{$product->stock_quantity}}">
                            <button class="increase js-qty-button" onclick="increase({{$product->id}},{{$product->stock_quantity}})"></button>
                          </div>
                        </div>
                        <div class="cart-table-prd-price-total" id="total{{$product->id}}">
                        {{$product->min_price * $cart_item->quantity +0}}
                        </div>
                      </div>
                      <div class="cart-table-prd-action">
                        <a href="{{route('delete_item',[$cart->id,$product->id])}}" class="cart-table-prd-remove"  title="Remove Product"><i class="icon-recycle"></i></a>
                      </div>
                    </div>
                      @break
                    @endif
                    @endforeach
                @endif
              @endforeach  

            <!-- <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="{{route('electronic.product')}}" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-old">$200.00</div>
                      <div class="price-new">$180.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="{{route('electronic.product')}}">Leather Pegged Pants</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="number" class="qty-input" value="1" data-min="1" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div>
              <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="{{route('electronic.product')}}" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-new">$220.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="{{route('electronic.product')}}">Cascade Casual Shirt</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="text" class="qty-input" value="2" data-min="0" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div>
              <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="{{route('electronic.product')}}" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-new">$75.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="{{route('electronic.product')}}">Oversize Cotton Dress</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="text" class="qty-input" value="2" data-min="0" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div>-->
            </div> 
            <!-- <div class="text-center mt-1"><a href="#" class="btn btn--grey">Clear All</a>
            </div> -->
</div>
<div class="col-lg-7 col-xl-5 mt-3 mt-md-0">    
                        <!--promoBanner-->
                            @include('layouts.promo_banner')
                        <!--/promoBanner-->
                        <!--Cart total-->
                            @include('layouts.cart.cart_total')
                        <!--/Cart total-->
</div>  
@section('script')
<script>
function decrease(id,stock)
{
  var price= parseInt($("#price"+id).val());
  console.log(price);
  var quantity= parseInt($("#quantity"+id).val()) - 1;
  console.log(quantity);
  if(quantity==0)
  {
    alert("Quantity at least 1 to be purchase");
  }
  else
  {
    setprice(price, quantity, stock,id);
  }
}

function increase(id,stock)
{
  var price= parseInt($("#price"+id).val());
  console.log(price);
  var quantity= parseInt($("#quantity"+id).val()) + 1;
  console.log(quantity);
  if(stock <quantity)
  {
    alert("Only "+stock+" available in stock");
  }
  else
  {
    setprice(price, quantity, stock,id);
  }
}

function setprice(price,quantity,stock,id)
{
 $(function(){ 
  
  var total= price*quantity;
  $("#total"+id).text(total);
  
  
  console.log(total);
 });
}


</script>
@endsection