<div class="sticky-addcart js-stickyAddToCart" style="height: 94.2604px;">
      <div class="container">
        <div class="row">
          <div class="col-auto sticky-addcart_image">
            <a href="{{route('electronic.product',$current_product->slug)}}">
              <img src="{{$img_url}}{{$current_product->img_path}}" alt="">
            </a>
          </div>
          <div class="col col-sm-5 col-lg-4 col-xl-5 sticky-addcart_info">
            <h1 class="sticky-addcart_title">{{$current_product->name}}</h1>
            <div class="sticky-addcart_price">
              <span class="sticky-addcart_price--actual">${{$current_product->min_price +0}}</span>
              <span class="sticky-addcart_price--old">$ 29100.00</span>
            </div>
          </div>
          <div class="col-auto sticky-addcart_options  prd-block prd-block_info--style1">
            <div class="select-wrapper">
              <select class="form-control form-control--sm">
                <option value="">--Please choose an option--</option>
              </select>
            </div>
          </div>
          <div class="col-auto sticky-addcart_actions">
          
            <div class="prd-block_qty" >
              <span class="option-label">Quantity:</span>
              <div class="qty qty-changer">
                <button class="decrease js-qty-button" onclick="decreaseqty({{$product->id}},{{$product->stock_quantity}})" ></button>
                <input type="number" class="qty-input" name="quantity" value="1" data-min="1" data-max="{{$product->stock_quantity}}">
                <button class="increase js-qty-button" onclick="increaseqty({{$product->id}},{{$product->stock_quantity}}) "></button>
              </div>
            </div>
            <!-- <input type="hidden" name="product_id" value="{{$product->id}}"></input> -->
            <div class="btn-wrap">
            @if($product->stock_quantity)
            <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"{{route('electronic.product',$product->slug)}}", "aspect_ratio":0.778}'>Add To Cart</button>
            @else
            <button class="btn btn-secondary" title="Out of stock" disabled >Add To Cart</button>
            @endif
            <!-- <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})">Add to cart</button> -->
            </div>
            
          </div>
        </div>
      </div>
</div>