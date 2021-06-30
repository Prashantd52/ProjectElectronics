<div class="footer-sticky">

    <div class="payment-notification-wrap js-pn" data-visible-time="3000" data-hidden-time="90000" data-delay="500" data-from="Kanpur,Lucknow,Unnao,Barabanki,Raibareli" data-products='[{"productname":"{{$products[0]->name}}", "productlink":"{{route('electronic.product',$products[0]->slug)}}","productimage":"{{$img_url}}{{$products[0]->img_path}}"},{"productname":"{{$products[1]->name}}", "productlink":"{{route('electronic.product',$products[1]->slug)}}","productimage":"{{$img_url}}{{$products[1]->img_path}}"},{"productname":"{{$products[2]->name}}", "productlink":"{{route('electronic.product',$products[2]->slug)}}","productimage":"{{$img_url}}{{$products[2]->img_path}}"},{"productname":"{{$products[3]->name}}", "productlink":"{{route('electronic.product',$products[3]->slug)}}","productimage":"{{$img_url}}{{$products[3]->img_path}}"},{"productname":"{{$products[4]->name}}", "productlink":"{{route('electronic.product',$products[4]->slug)}}","productimage":"{{$img_url}}{{$products[4]->img_path}}"}]'>
      <div class="payment-notification payment-notification--squared">
        <div class="payment-notification-inside">
          <div class="payment-notification-container">
            <a href="#" class="payment-notification-image js-pn-link">
              <img src="{{$img_url}}{{$products[0]->img_path}}" class="js-pn-image" alt="">
            </a>
            <div class="payment-notification-content-wrapper">
              <div class="payment-notification-content">
                <div class="payment-notification-text">Someone purchased</div>
                <a href="{{route('electronic.product',$products[0]->slug)}}" class="payment-notification-name js-pn-name js-pn-link">{{$products[0]->name}}</a>
                <div class="payment-notification-bottom">
                  <div class="payment-notification-when"><span class="js-pn-time">32</span> min ago</div>
                  <div class="payment-notification-from">from <span class="js-pn-from">Kanpur</span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="payment-notification-close"><i class="icon-close-bold"></i></div>
          <div class="payment-notification-qw prd-hide-mobile " onclick="getQuickviewData('{{route('electronic.product',$products[0]->slug)}}','{{$products[0]->name}}','{{$img_url}}{{$products[0]->img_path}}','{{$products[0]->description}}',{{$products[0]->min_price +0}})"><i class="icon-eye"></i></div>
        </div>
      </div>
    </div>

    <!-- <div class="payment-notification-wrap js-pn" data-visible-time="3000" data-hidden-time="3000" data-delay="500" data-from="Aberdeen,Bakersfield,Birmingham,Cambridge,Youngstown" data-products='[{"productname":"Leather Pegged Pants", "productlink":"product.html","productimage":"images/skins/fashion/products/product-01-1.jpg"},{"productname":"Black Fabric Backpack", "productlink":"product.html","productimage":"images/skins/fashion/products/product-28-1.jpg"},{"productname":"Combined Chunky Sneakers", "productlink":"product.html","productimage":"images/skins/fashion/products/product-23-1.jpg"}]'>
      <div class="payment-notification payment-notification--squared">
        <div class="payment-notification-inside">
          <div class="payment-notification-container">
            <a href="#" class="payment-notification-image js-pn-link">
              <img src="images/products/product-01.jpg" class="js-pn-image" alt="">
            </a>
            <div class="payment-notification-content-wrapper">
              <div class="payment-notification-content">
                <div class="payment-notification-text">Someone purchased</div>
                <a href="{{route('electronic.product')}}" class="payment-notification-name js-pn-name js-pn-link">Applewatch</a>
                <div class="payment-notification-bottom">
                  <div class="payment-notification-when"><span class="js-pn-time">32</span> min ago</div>
                  <div class="payment-notification-from">from <span class="js-pn-from">Riverside</span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="payment-notification-close"><i class="icon-close-bold"></i></div>
          <div class="payment-notification-qw prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i></div>
        </div>
      </div>
    </div> -->
</div>