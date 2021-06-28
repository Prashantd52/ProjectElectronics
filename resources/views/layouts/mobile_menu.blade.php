<div class="mobilemenu js-push-mbmenu">
    <div class="mobilemenu-content">
        <div class="mobilemenu-close mobilemenu-toggle">Close</div>
        <div class="mobilemenu-scroll">
          <div class="mobilemenu-search"></div>
          <div class="nav-wrapper show-menu">
            <div class="nav-toggle">
              <span class="nav-back"><i class="icon-angle-left"></i></span>
              <span class="nav-title"></span>
              <a href="#" class="nav-viewall">view all</a>
            </div>
            <ul class="nav nav-level-1">
              <li><a href="/">Home Page</a></li>
              <!--for loop open for category_group-->
                @foreach($category_sub_group as $cat_sub_grp)

                  <li><a href="#">{{$cat_sub_grp->name}}<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <!-- for loop open for category_subroups-->
                      <ul class="nav-level-2">
                        @foreach($categories as $category)
                              @if($category->category_sub_group_id==$cat_sub_grp->id) 
                                <li><a href="{{route('electronic.category',$category->slug)}}">{{$category->name}}<span class="arrow"><i class="icon-angle-right"></i></span></a></li>
                              @endif
                        @endforeach
                      </ul>    
                    <!-- for loop closedfor category_subroups-->
                  </li>
                  
                @endforeach
              <!--/for loop closed for category_group-->

              <!-- <li><a href="/">Home Page<span class="menu-label menu-label--color1">New</span><span class="arrow"><i class="icon-angle-right"></i></span></a>
                <ul class="nav-level-2">
                  <li><a href="index.html">Fashion (Default) Skin</a></li>
                  <li><a href="index-sport.html">Sport Skin</a></li>
                  <li><a href="index-helloween.html">Halloween Skin</a></li>
                  <li><a href="index-medical.html">Medical Skin</a></li>
                  <li><a href="index-food.html">Food Market Skin</a></li>
                  <li><a href="index-cosmetics.html">Cosmetics Skin</a></li>
                  <li><a href="index-fishing.html">Fishing Skin</a></li>
                  <li><a href="#">Books Skin<span class="menu-label menu-label--color1">Coming Soon</span></a></li>
                  <li><a href="#">Electronics Skin<span class="menu-label menu-label--color2">Coming Soon</span></a></li>
                  <li><a href="#">Games Skin<span class="menu-label menu-label--color3">Coming Soon</span></a></li>
                  <li><a href="#">Vaping Skin<span class="menu-label">Coming Soon</span></a></li>
                  <li><a href="index-02.html">Home page 2</a></li>
                  <li><a href="index-03.html">Home page 3</a></li>
                  <li><a href="index-04.html">Home page 4</a></li>
                  <li><a href="index-05.html">Home page 5</a></li>
                  <li><a href="index-06.html">Home page 6</a></li>
                  <li><a href="index-07.html">Home page 7</a></li>
                  <li><a href="index-08.html">Home page 8</a></li>
                  <li><a href="index-09.html">Home page 9</a></li>
                  <li><a href="index-10.html">Home page 10</a></li>
                  <li><a href="index-rtl.html">Home page RTL</a></li>
                </ul>
              </li>
              <li><a href="#">Pages<span class="arrow"><i class="icon-angle-right"></i></span></a>
                <ul class="nav-level-2">
                  <li><a href="{{route('electronic.product')}}">Product page<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.product')}}">Product page variant 1<span class="menu-label menu-label--color3">Popular</span></a></li>
                      
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.category')}}">Category page<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.category')}}">Left sidebar filters</a></li>
                      <li><a href="category-closed-filter.html">Closed filters</a></li>
                      <li><a href="category-horizontal-filter.html">Horizontal filters</a></li>
                      <li><a href="category-listview.html">Listing View</a></li>
                      <li><a href="category-empty.html">Empty category</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.cart')}}">Cart & Checkout<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.cart')}}">Cart Page</a></li>
                      <li><a href="{{route('electronic.cart_empty')}}">Empty cart</a></li>
                      <li><a href="{{route('electronic.checkout')}}">Checkout variant 1</a></li>
                      <li><a href="checkout-2.html">Checkout variant 2</a></li>
                      <li><a href="checkout-3.html">Checkout variant 3</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.account_create')}}">Account<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.account_create')}}">Login</a></li>
                      <li><a href="{{route('electronic.account_create')}}">Create account</a></li>
                      <li><a href="{{route('electronic.account_details')}}">Account details</a></li>
                      <li><a href="{{route('electronic.account_address')}}">Account addresses</a></li>
                      <li><a href="{{route('electronic.account_order_history')}}">Order History</a></li>
                      <li><a href="{{route('electronic.account_wishlist')}}">Wishlist</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.blog','sticky')}}">Blog<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.blog','right')}}">Right sidebar</a></li>
                      <li><a href="{{route('electronic.blog','left')}}">Left sidebar</a></li>
                      <li><a href="{{route('electronic.blog','no')}}">No sidebar</a></li>
                      <li><a href="{{route('electronic.blog','sticky')}}">Sticky sidebar</a></li>
                      <li><a href="{{route('electronic.blog','grid')}}">Grid</a></li>
                      <li><a href="{{route('electronic.blog_post')}}">Blog post</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.gallery')}}">Gallery</a></li>
                  <li><a href="{{route('electronic.faq')}}">Faq</a></li>
                  <li><a href="{{route('electronic.about_us')}}">About Us</a></li>
                  <li><a href="{{route('electronic.contact_us')}}">Contact Us</a></li>
                  <li><a href="{{route('electronic.error_404')}}">404 Page</a></li>
                  <li><a href="{{route('electronic.typography')}}">Typography</a></li>
                  <li><a href="{{route('electronic.comming_soon')}}" target="_blank">Coming soon</a></li>
                </ul>
              </li>
              <li><a href="{{route('electronic.category')}}">New Arrivals<span class="arrow"><i class="icon-angle-right"></i></span></a>
                <ul class="nav-level-2">
                  <li><a href="{{route('electronic.category')}}">Shoes<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.category')}}">Heels</a></li>
                      <li><a href="{{route('electronic.category')}}">Boots</a></li>
                      <li><a href="{{route('electronic.category')}}">Flats</a></li>
                      <li><a href="{{route('electronic.category')}}">Sneakers &amp; Athletic</a></li>
                      <li><a href="{{route('electronic.category')}}">Clogs &amp; Mules</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.category')}}">Tops<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.category')}}">Dresses</a></li>
                      <li><a href="{{route('electronic.category')}}">Shirts &amp; Tops</a></li>
                      <li><a href="{{route('electronic.category')}}">Coats &amp; Outerwear</a></li>
                      <li><a href="{{route('electronic.category')}}">Sweaters</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.category')}}">Shoes<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.category')}}">Heels</a></li>
                      <li><a href="{{route('electronic.category')}}">Boots</a></li>
                      <li><a href="{{route('electronic.category')}}">Flats</a></li>
                      <li><a href="{{route('electronic.category')}}">Sneakers &amp; Athletic</a></li>
                      <li><a href="{{route('electronic.category')}}">Clogs &amp; Mules</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.category')}}">Bottoms<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.category')}}">Jeans</a></li>
                      <li><a href="{{route('electronic.category')}}">Pants</a></li>
                      <li><a href="{{route('electronic.category')}}">slippers</a></li>
                      <li><a href="{{route('electronic.category')}}">suits</a></li>
                      <li><a href="{{route('electronic.category')}}">socks</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.category')}}">Accessories<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.category')}}">Sunglasses</a></li>
                      <li><a href="{{route('electronic.category')}}">Hats</a></li>
                      <li><a href="{{route('electronic.category')}}">Watches</a></li>
                      <li><a href="{{route('electronic.category')}}">Jewelry</a></li>
                      <li><a href="{{route('electronic.category')}}">Belts</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('electronic.category')}}">Bags<span class="arrow"><i class="icon-angle-right"></i></span></a>
                    <ul class="nav-level-3">
                      <li><a href="{{route('electronic.category')}}">Handbags</a></li>
                      <li><a href="{{route('electronic.category')}}">Backpacks</a></li>
                      <li><a href="{{route('electronic.category')}}">Luggage</a></li>
                      <li><a href="{{route('electronic.category')}}">wallets</a></li>
                    </ul>
                  </li>
                </ul>
              </li> 
              <li><a href="#buynow" target="_blank">Buy Theme<span class="menu-label menu-label--color3">Hurry Up!</span><span class="arrow"><i class="icon-angle-right"></i></span></a></li>-->
            </ul>
          </div>
          <div class="mobilemenu-bottom">
            <div class="mobilemenu-currency">
              <!-- Header Currency -->
              <div class="dropdn_currency">
                <div class="dropdn dropdn_caret">
                  <a href="#" class="dropdn-link js-dropdn-link">US dollars<i class="icon-angle-down"></i></a>
                  <div class="dropdn-content">
                    <ul>
                      <li class="active"><a href="#"><span>US dollars</span></a></li>
                      <li><a href="#"><span>Euro</span></a></li>
                      <li><a href="#"><span>UK pounds</span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /Header Currency -->
            </div>
            <div class="mobilemenu-language">
              <!-- Header Language -->
              <div class="dropdn_language">
                <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                  <a href="#" class="dropdn-link js-dropdn-link"><span class="js-dropdn-select-current">English</span><i class="icon-angle-down"></i></a>
                  <div class="dropdn-content">
                    <ul>
                      <li class="active"><a href="#"><img src="images/flags/en.png" alt="">English</a></li>
                      <li><a href="#"><img src="images/flags/sp.png" alt="">Spanish</a></li>
                      <li><a href="#"><img src="images/flags/de.png" alt="">German</a></li>
                      <li><a href="#"><img src="images/flags/fr.png" alt="">French</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /Header Language -->
            </div>
          </div>
        </div>
    </div>
</div>