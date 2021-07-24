<header class="hdr-wrap">
    <div class="hdr-content hdr-content-sticky">
      <div class="container">
        <div class="row">
          <div class="col-auto show-mobile">
            <!-- Menu Toggle -->
            <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
            <!-- /Menu Toggle -->
          </div>
          <div class="col-auto hdr-logo">
            <a href="/" class="logo"><img srcset="images/skins/electronics/logo-electronics.png 1x, images/skins/electronics/logo-electronics2x.png 2x" alt="Logo"></a>
          </div>
          <!--navigation-->
          <div class="hdr-nav hide-mobile nav-holder-s">
          </div>
          <!--//navigation-->
          <div class="hdr-links-wrap col-auto ml-auto">
            <div class="hdr-inline-link">
              <!-- Header Search -->
              <div class="search_container_desktop">
                <div class="dropdn dropdn_search dropdn_fullwidth">
                  <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                  <div class="dropdn-content">
                    <div class="container">
                      <form method="get" action="{{route('search')}}" class="search search-off-popular">
                        <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                        <button type="submit" class="search-button"><i class="icon-search"></i></button>
                        <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Header Search -->
              <!-- Header Account -->
              <div class="dropdn dropdn_account dropdn_fullheight">
                <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
              </div>
              <!-- /Header Account -->
              @auth <!----------Show options when user is loged in -------->
              <!-- Header Wishlist -->
              <div class="dropdn dropdn_wishlist">
                <a href="{{route('electronic.account_wishlist')}}" class="dropdn-link only-icon wishlist-link ">
                  <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="wishlist-qty" id="wishlist_quant1">0</span>
                </a>
              </div>
              <!-- /Header Wishlist -->
              <div class="dropdn dropdn_fullheight minicart">
                <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
                  <i class="icon-basket"></i>
                  <span class="minicart-qty" id="minicart_quantity1">0</span>
                  <span class="minicart-total hide-mobile" id="minicart_total1">$ 0</span>
                </a>
              </div>
              @endauth <!---------- / Show options when user is loged in -------->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hdr hdr-style4">
      <div class="hdr-topline hdr-topline--dark js-hdr-top">
        <div class="container">
          <div class="row flex-nowrap">
            <div class="col hdr-topline-center mx-auto">
              <div class="custom-text js-custom-text-carousel" data-slick='{"speed": 1000, "autoplaySpeed": 3000}'>
                <div class="custom-text-item"><i class="icon-fox"></i> Use promocode <span>FOXIC</span> to get 15% discount!</div>
                <div class="custom-text-item"><i class="icon-air-freight"></i> <span>Free</span> plane shipping over <span>$250</span></div>
                <div class="custom-text-item"><i class="icon-gift"></i> Today only! Post <span>holiday</span> Flash Sale! 2 for $20</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hdr-content">
        <div class="container">
          <div class="row">
            <div class="col-auto show-mobile">
              <!-- Menu Toggle -->
              <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
              <!-- /Menu Toggle -->
            </div>
            <div class="col-auto hdr-logo">
              <a href="/" class="logo"><img srcset="images/skins/electronics/logo-electronics.png 1x, images/skins/electronics/logo-electronics2x.png 2x" alt="Logo"></a>
            </div>
            <div class="col hdr-banner">
              <a href="#" class="bnr bnr--middle bnr--left" data-fontratio="7.95">
                <div class="bnr-img"><img src="images/header-banner.png" alt=""></div>
                <div class="bnr-caption bnr-caption-carousel js-bnr-caption-carousel" style="padding: 0 0 0 45%">
                  <div class="bnr-caption-carousel-item">
                    <div class="bnr-text9" style="font-weight: 300">Up to <span style="color: #d63434; font-weight: 600">50%</span> off</div>
                    <div class="bnr-text10">MEGA COLLECTION <span class="custom-color">SALE</span></div>
                  </div>
                  <div class="bnr-caption-carousel-item">
                    <div class="bnr-text10">MEGA COLLECTION <span class="custom-color">SALE</span></div>
                    <div class="bnr-text9" style="font-weight: 300">Up to <span style="color: #fb317d; font-weight: 600">50%</span> off</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="hdr-links-wrap col-auto ml-auto">
              <div class="hdr-group-link hide-mobile">
                <div class="hdr-inline-link">
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
              </div>
              <div class="hdr-inline-link">
                <!-- Header Search -->
                <div class="search_container_desktop">
                  <div class="dropdn dropdn_search dropdn_fullwidth">
                    <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                    <div class="dropdn-content">
                      <div class="container">
                        <form method="get" action="{{route('search')}}" class="search search-off-popular">
                          <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                          <button type="submit" class="search-button"><i class="icon-search"></i></button>
                          <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Header Search -->
                <!-- Header Account -->
                <div class="dropdn dropdn_account dropdn_fullheight">
                  <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                </div>
                <!-- /Header Account -->
                @auth <!----------Show options when user is loged in -------->
                <!-- Header Compare -->
                <div class="dropdn dropdn_compare">
                  <a href="{{route('electronic.account_wishlist')}}"  class="dropdn-link only-icon compare-link ">
                    <i class="icon-compare"></i><span class="dropdn-link-txt">Wishlist</span><span class="compare-qty" id="wishlist_quant2">0</span>
                  </a>
                </div>
                <!-- /Header Compare -->
                <div class="dropdn dropdn_fullheight minicart">
                  
                  <a href="#" class="dropdn-link js-dropdn-link minicart-link"  data-panel="#dropdnMinicart">
                    <i class="icon-basket"></i>
                    <span class="minicart-qty" id="minicart_quantity2">0</span>
                    <span class="minicart-total hide-mobile" id="minicart_total2">$ 0</span>
                  </a>
                </div>
                @endauth <!----------/ Show options when user is loged in -------->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hdr-navline hdr-navline--light">
        <div class="container">
          <div class="row">
            <div class="col hdr-navline-left">
              <!--navigation-->
              <div class="hdr-nav hide-mobile nav-holder">
                <!--mmenu-->
                <ul class="mmenu mmenu-js">
                  <li class="mmenu-item--simple"><a href="/" class="active"><span><i class="icon-menu" title="home"></i></span></a>
                  </li>

                  <!--for loop open for category_group-->
                  <!-- for loop open for category_subroups-->
                  @foreach($category_sub_group as $cat_sub_grp)
                      @php
                        $cat_list=array();
                        
                      @endphp

                    <li class="mmenu-item--simple"><a href="{{route('electronic.collections',$cat_sub_grp->id)}}" target="_blank">{{$cat_sub_grp->name}}</a>
                          <div class="mmenu-submenu d-flex col-sm-6">
                            
                            @foreach($categories as $category)
                            @if($category->category_sub_group_id==$cat_sub_grp->id)
                              @php
                                $cat_list[]=$category;
                              @endphp
                            @endif
                            @endforeach
                            
                            <!-- for loop open for categories-->
                              <ul class="submenu-list mt-0 col-sm-7">
                                @for($i=0;$i< count($cat_list)/2;$i++) 
                                  <li ><a href="{{route('electronic.category',$cat_list[$i]->slug)}}">{{$cat_list[$i]->name}}</a></li>
                                @endfor
                              </ul>
                              @if(count($cat_list)>1)
                                <ul class="submenu-list mt-0 col-sm-7">
                                  @for($i=count($cat_list)/2; $i< count($cat_list); $i++)
                                  <li><a href="{{route('electronic.category',$cat_list[$i]->slug)}}">{{$cat_list[$i]->name}}</a></li>
                                  @endfor  
                                </ul>
                              @endif
                              <!-- for loop closed for categories-->
                            
                          </div>
                    </li>
                  @endforeach
                  <!-- for loop closedfor category_subroups-->
                  <!--/for loop closed for category_group-->                  

                  {{-- <li class="mmenu-item--simple"><a href="#">Pages</a>
                    <div class="mmenu-submenu">
                      <ul class="submenu-list">
                        <li><a href="{{route('electronic.product')}}">Product page</a>
                          <ul>
                            <li><a href="{{route('electronic.product')}}">Product page variant 1<span class="menu-label menu-label--color3">Popular</span></a></li>
                            
                          </ul>
                        </li>
                        <!-- <li><a href="{{route('electronic.category')}}">Category page</a>
                          <ul>
                            <li><a href="{{route('electronic.category')}}">Left sidebar filters</a></li>
                            
                            <li><a href="{{route('electronic.category_empty')}}">Empty category</a></li>
                          </ul>
                        </li> -->
                        <li><a href="{{route('electronic.cart')}}">Cart & Checkout</a>
                          <ul>
                            <li><a href="{{route('electronic.cart')}}">Cart Page</a></li>
                            <li><a href="{{route('electronic.cart_empty')}}">Empty cart</a></li>
                            <li><a href="{{route('electronic.checkout','1')}}">Checkout page 1</a></li>
                            <li><a href="{{route('electronic.checkout','2')}}">Checkout page 2</a></li>
                            <li><a href="{{route('electronic.checkout','3')}}">Checkout page 3</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('electronic.account_create')}}">Account</a>
                          <ul>
                            <li><a href="{{route('electronic.account_create')}}">Login</a></li>
                            <li><a href="{{route('electronic.account_create')}}">Create account</a></li>
                            <li><a href="{{route('electronic.account_details')}}">Account details</a></li>
                            <li><a href="{{route('electronic.account_address')}}">Account addresses</a></li>
                            <li><a href="{{route('electronic.account_order_history')}}">Order History</a></li>
                            <li><a href="{{route('electronic.account_wishlist')}}">Wishlist</a></li>
                          </ul>
                        </li>
                        <li><a href="{{route('electronic.blog')}}">Blog</a>
                          <ul>
                            <!-- <li><a href="{{route('electronic.blog','right')}}">Right sidebar</a></li>
                            <li><a href="{{route('electronic.blog','left')}}">Left sidebar</a></li>
                            <li><a href="{{route('electronic.blog','no')}}">No sidebar</a></li> -->
                            <li><a href="{{route('electronic.blog')}}">Blog Lists</a></li>
                            <!-- <li><a href="{{route('electronic.blog')}}">Grid</a></li> -->
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
                        <li><a href="{{route('electronic.collections')}}" target="_blank">Collections</a></li>
                      </ul>
                    </div>
                  </li>  --}}
                  <!--<li class="mmenu-item--mega"><a href="collections.html"><span>Electronics Shop<span class="menu-label">SKIN</span></span></a>
                    <div class="mmenu-submenu mmenu-submenu--has-bottom">
                      <div class="mmenu-submenu-inside">
                        <div class="container">
                          <div class="mmenu-left width-25">
                            <div class="mmenu-bnr-wrap">
                              <a href="{{route('electronic.product')}}" class="image-hover-scale image-container w-100" style="padding-bottom: 102.91%">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="images/skins/electronics/menu/mmenu-bnr-01.png" class="lazyload fade-up" alt="Banner">
                              </a>
                            </div>
                          </div>
                          <div class="mmenu-cols column-4">
                            <div class="mmenu-col">
                              <h3 class="submenu-title"><a href="{{route('electronic.category')}}">Collections</a></h3>
                              <ul class="submenu-list">
                                <li><a href="{{route('electronic.category')}}">Martins d'Art 2020/21<span class="submenu-link-txt">Available in boutiques from June 2019</span></a></li>
                                <li><a href="{{route('electronic.category')}}">Spring-Summer 2021<span class="submenu-link-txt">Available in boutiques from March 2019</span></a></li>
                                <li><a href="{{route('electronic.category')}}">Spring-Summer 2021 Pre-Collection<span class="submenu-link-txt">In boutiques</span></a></li>
                                <li><a href="{{route('electronic.category')}}">Cruise 2020/21<span class="submenu-link-txt">In boutiques</span></a></li>
                                <li><a href="{{route('electronic.category')}}">Fall-Winter 2020/21</a></li>
                              </ul>
                            </div>
                            <div class="mmenu-col">
                              <h3 class="submenu-title"><a href="{{route('electronic.category')}}">Ready-to-wear</a></h3>
                              <ul class="submenu-list">
                                <li><a href="{{route('electronic.category')}}" class="active">Jackets</a>
                                  <ul class="sub-level">
                                    <li><a href="{{route('electronic.category')}}">Bomber Jackets</a></li>
                                    <li><a href="{{route('electronic.category')}}">Biker Jacket</a></li>
                                    <li><a href="{{route('electronic.category')}}">Trucker Jacket</a></li>
                                    <li><a href="{{route('electronic.category')}}">Denim Jackets</a></li>
                                    <li><a href="{{route('electronic.category')}}">Blouson Jacket<span class="menu-label">SALE</span></a></li>
                                    <li><a href="{{route('electronic.category')}}">Overcoat</a></li>
                                    <li><a href="{{route('electronic.category')}}">Trench Coat</a></li>
                                  </ul>
                                </li>
                                <li><a href="{{route('electronic.category')}}">Dresses<span class="menu-label menu-label--color3">SALE</span></a></li>
                                <li><a href="{{route('electronic.category')}}">Blouses & Tops</a></li>
                                <li><a href="{{route('electronic.category')}}">Cardigans & Pullovers</a></li>
                                <li><a href="{{route('electronic.category')}}">Skirts</a></li>
                                <li><a href="{{route('electronic.category')}}">Pants & Shorts</a></li>
                                <li><a href="{{route('electronic.category')}}">Outerwear</a></li>
                                <li><a href="{{route('electronic.category')}}">Swimwear</a></li>
                              </ul>
                            </div>
                            <div class="mmenu-col">
                              <h3 class="submenu-title"><a href="{{route('electronic.category')}}">Accessories</a></h3>
                              <ul class="submenu-list">
                                <li><a href="{{route('electronic.category')}}">Jackets</a></li>
                                <li><a href="{{route('electronic.category')}}">Dresses</a></li>
                                <li><a href="{{route('electronic.category')}}">Blouses & Tops</a></li>
                                <li><a href="{{route('electronic.category')}}">Cardigans & Pullovers</a></li>
                                <li><a href="{{route('electronic.category')}}">Skirts<span class="menu-label">SALE</span></a></li>
                                <li><a href="{{route('electronic.category')}}">Pants & Shorts</a></li>
                                <li><a href="{{route('electronic.category')}}">Outerwear</a></li>
                              </ul>
                            </div>
                            <div class="mmenu-col">
                              <h3 class="submenu-title"><a href="{{route('electronic.category')}}">Brands</a></h3>
                              <ul class="submenu-list">
                                <li><a href="{{route('electronic.category')}}">Jackets</a></li>
                                <li><a href="{{route('electronic.category')}}">Dresses</a></li>
                                <li><a href="{{route('electronic.category')}}">Blouses & Tops</a></li>
                                <li><a href="{{route('electronic.category')}}">Cardigans & Pullovers</a></li>
                                <li><a href="{{route('electronic.category')}}">Skirts<span class="menu-label menu-label--color1">SALE</span></a></li>
                                <li><a href="{{route('electronic.category')}}">Pants & Shorts</a></li>
                                <li><a href="{{route('electronic.category')}}">Outerwear</a></li>
                              </ul>
                            </div>
                            <div class="mmenu-bottom justify-content-center">
                              <a href="#"><i class="icon-fox icon--lg"></i><b>FOXshop News</b><i class="icon-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>-->
                </ul>
                <!--/mmenu-->
              </div>
              <!--//navigation-->
            </div>
            <div class="col-auto hdr-navline-right">
              <!-- Header Social -->
              <div class="hdr-line-separate">
                <ul class="social-list list-unstyled">
                  <li>
                    <a href="#"><i class="icon-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-google"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-vimeo"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-linkedin"></i></a>
                  </li>
                </ul>
              </div>
              <!-- /Header Social -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  @include('layouts.mobile_menu')
  <div class="header-side-panel">    
    @include('layouts.account_dropdown')
    {{--@include('layouts.minicart_dropdown')--}}
    <div id="minicartdata">
    </div>
  </div>
