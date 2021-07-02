<div class="row collection-grid-2 mobile-sm-pad custom-grid data-to-show-4 data-to-show-lg-3 data-to-show-md-2 data-to-show-sm-2">
  @foreach($categories as $category)
  @if($category->category_sub_group_id== $subgroupid)
    <div class="collection-grid-2-item w-100 text-center">
        <a href="{{route('electronic.category',$category->slug)}}" class="bnr-wrap collection-grid-2-item-inside">
            <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$category->img_path}}" class="lazyload fade-up" alt="{{$category->name}}">
            </div>
        </a>
        <h3 class="collection-grid-2-title"><a href="{{route('electronic.category',$category->slug)}}" >{{$category->name}}</a></h3>
        <!-- <h5 class="collection-item-qty">15 Items</h5> -->
    </div>
  @endif
  @endforeach()
        <!-- <div class="collection-grid-2-item w-100 text-center">
            <a href="" class="bnr-wrap collection-grid-2-item-inside">
              <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/categories/category-img-01.png" class="lazyload fade-up" alt="Category Name">
              </div>
            </a>
            <h3 class="collection-grid-2-title"><a href="{{route('electronic.category')}}">Accessories</a></h3>
            <h5 class="collection-item-qty">15 Items</h5>
          </div>
          <div class="collection-grid-2-item w-100 text-center">
            <a href="" class="bnr-wrap collection-grid-2-item-inside">
              <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/categories/category-img-02.png" class="lazyload fade-up" alt="Category Name">
              </div>
            </a>
            <h3 class="collection-grid-2-title"><a href="{{route('electronic.category')}}">Dresses</a></h3>
            <h5 class="collection-item-qty">15 Items</h5>
          </div>
          <div class="collection-grid-2-item w-100 text-center">
            <a href="" class="bnr-wrap collection-grid-2-item-inside">
              <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/categories/category-img-03.png" class="lazyload fade-up" alt="Category Name">
              </div>
            </a>
            <h3 class="collection-grid-2-title"><a href="{{route('electronic.category')}}">Electronics</a></h3>
            <h5 class="collection-item-qty">15 Items</h5>
          </div>
          <div class="collection-grid-2-item w-100 text-center">
            <a href="" class="bnr-wrap collection-grid-2-item-inside">
              <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/categories/category-img-04.png" class="lazyload fade-up" alt="Category Name">
              </div>
            </a>
            <h3 class="collection-grid-2-title"><a href="{{route('electronic.category')}}">Footwear</a></h3>
            <h5 class="collection-item-qty">15 Items</h5>
          </div>
          <div class="collection-grid-2-item w-100 text-center">
            <a href="" class="bnr-wrap collection-grid-2-item-inside">
              <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/categories/category-img-05.png" class="lazyload fade-up" alt="Category Name">
              </div>
            </a>
            <h3 class="collection-grid-2-title"><a href="{{route('electronic.category')}}">Furniture</a></h3>
            <h5 class="collection-item-qty">15 Items</h5>
          </div>
          <div class="collection-grid-2-item w-100 text-center">
            <a href="" class="bnr-wrap collection-grid-2-item-inside">
              <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/categories/category-img-06.png" class="lazyload fade-up" alt="Category Name">
              </div>
            </a>
            <h3 class="collection-grid-2-title"><a href="{{route('electronic.category')}}">Plumbing</a></h3>
            <h5 class="collection-item-qty">15 Items</h5>
          </div>
          <div class="collection-grid-2-item w-100 text-center">
            <a href="" class="bnr-wrap collection-grid-2-item-inside">
              <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/categories/category-img-07.png" class="lazyload fade-up" alt="Category Name">
              </div>
            </a>
            <h3 class="collection-grid-2-title"><a href="{{route('electronic.category')}}">Plumbing</a></h3>
            <h5 class="collection-item-qty">15 Items</h5>
          </div>
          <div class="collection-grid-2-item w-100 text-center">
            <a href="" class="bnr-wrap collection-grid-2-item-inside">
              <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 80.0%">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/categories/category-img-08.png" class="lazyload fade-up" alt="Category Name">
              </div>
            </a>
            <h3 class="collection-grid-2-title"><a href="{{route('electronic.category')}}">Plumbing</a></h3>
            <h5 class="collection-item-qty">15 Items</h5>
          </div> -->
</div>
<!-- <div class="more-link-wrapper text-center"><a href="#" class="btn">All Products</a></div> -->
