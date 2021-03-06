<div class="col-lg-4 aside filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop   border border-dotted" data-grid-tab-content>
            <div class="filter-col-content filter-mobile-content">
              
              <div class="sidebar-block d-filter-mobile">
                <h3 class="mb-1">SORT BY</h3>
                <div class="select-wrapper select-wrapper-xs">
                  <select class="form-control">
                    <option value="featured">Featured</option>
                    <option value="rating">Rating</option>
                    <option value="price">Price</option>
                  </select>
                </div>
              </div>
              <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Categories</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list">
                    @foreach($category_sub_group as $cat_sub_grp)
                    <li><a href="#" title="{{$cat_sub_grp->name}}" class="open">{{$cat_sub_grp->name}}</a>
                        <div class="toggle-category js-toggle-category"><span><i class="icon-angle-down"></i></span></div>
                            <ul class="category-list category-list">
                            @foreach($categories as $category)
                                @if($category->category_sub_group_id == $cat_sub_grp->id)
                                <li><a href="#" title="{{$category->name}}" onclick="searchCategoryFilter({{$category->id}},'{{$search}}')" class="open">{{$category->name}}</a></li>
                                @endif
                            @endforeach
                            </ul> 
                    </li> 
                    @endforeach
                    
                  </ul>
                </div>
              </div>
              <!-- <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Colors</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="color-list two-column">
                    <li class="active"><a href="#" data-tooltip="Dark Red" title="Dark Red"><span class="value"><img src="images/colorswatch/color-red.png" alt=""></span><span class="colorname">Red (87)</span></a></li>
                    <li><a href="#" data-tooltip="Pink" title="Pink"><span class="value"><img src="images/colorswatch/color-pink.png" alt=""></span><span class="colorname">Pink (95)</span></a></li>
                    <li><a href="#" data-tooltip="Violet" title="Violet"><span class="value"><img src="images/colorswatch/color-violet.png" alt=""></span><span class="colorname">Violet (18)</span></a></li>
                    <li><a href="#" data-tooltip="Blue" title="Blue"><span class="value"><img src="images/colorswatch/color-blue.png" alt=""></span><span class="colorname">Blue (78)</span></a></li>
                    <li><a href="#" data-tooltip="Marine" title="Marine"><span class="value"><img src="images/colorswatch/color-marine.png" alt=""></span><span class="colorname">Marine (45)</span></a></li>
                    <li><a href="#" data-tooltip="Orange" title="Orange"><span class="value"><img src="images/colorswatch/color-orange.png" alt=""></span><span class="colorname">Orange (96)</span></a></li>
                    <li><a href="#" data-tooltip="Yellow" title="Yellow"><span class="value"><img src="images/colorswatch/color-yellow.png" alt=""></span><span class="colorname">Yellow (55)</span></a></li>
                    <li><a href="#" data-tooltip="Dark Yellow" title="Dark Yellow"><span class="value"><img src="images/colorswatch/color-darkyellow.png" alt=""></span><span class="colorname">Dark Yellow (2)</span></a></li>
                    <li><a href="#" data-tooltip="Black" title="Black"><span class="value"><img src="images/colorswatch/color-black.png" alt=""></span><span class="colorname">Black (15)</span></a></li>
                    <li><a href="#" data-tooltip="White" title="White"><span class="value"><img src="images/colorswatch/color-white.png" alt=""></span><span class="colorname">White (58)</span></a></li>
                  </ul>
                </div>
              </div> -->
              <!-- <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Size</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list two-column size-list" data-sort='["XXS","XS","S","M","L","XL","XXL","XXXL"]'>
                    <li data-value="L" class="active"><a href="#">L</a></li>
                    <li data-value="XL"><a href="#">XL</a></li>
                    <li data-value="XXS"><a href="#">XXS</a></li>
                    <li data-value="XS"><a href="#">XS</a></li>
                    <li data-value="S"><a href="#">S</a></li>
                    <li data-value="XXL"><a href="#">XXL</a></li>
                    <li data-value="XXXL"><a href="#">XXXL</a></li>
                  </ul>
                </div>
              </div> -->
              <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Brands</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list">
                    @if(!empty($brands))
                    @foreach($brands as $brand)
                    <li><a href="#" class="brandName">{{$brand}}</a></li>
                    @endforeach
                    <li><a href="#" class="brandName">No Specific Brand</a></li>
                    @else
                    <li>No Brands Available For the search result</li>
                    @endif
                  </ul>
                </div>
              </div>
              <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Price</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list">
                    <li><a href="#" class="Price">Under $500</a></li>
                    <li><a href="#" class="Price">Under $1000</a></li>
                    <li><a href="#" class="Price">Under $2000</a></li>
                    <li><a href="#" class="Price">Under $3000</a></li>
                    <li><a href="#" class="Price">Above $3000</a></li>
                  </ul>
                </div>
              </div>
              <!-- <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Popular tags</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="tags-list">
                    <li class="active"><a href="#">Jeans</a></li>
                    <li><a href="#">St.Valentine???s gift</a></li>
                    <li><a href="#">Sunglasses</a></li>
                    <li><a href="#">Discount</a></li>
                    <li><a href="#">Maxi dress</a></li>
                  </ul>
                </div>
              </div> -->
              <a href="https://bit.ly/3eJX5XE" class="bnr image-hover-scale bnr--bottom bnr--left" data-fontratio="3.95">
                <div class="bnr-img">
                  <img src="images/banners/banner-collection-aside.png" alt="">
                </div>
              </a>
            </div>
</div>
