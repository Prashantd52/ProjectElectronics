<div class="holder holder-mt-medium">
    <div class="container">
        <div class="row grid vert-margin-small">
        @foreach($home_banner as $banner)
          <div class="col-18 col-sm-9">
            <a href="#" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale bnr--top bnr--left fontratio-calc" data-fontratio=8.7>
                <div class="bnr-img  image-container" style="padding-bottom: 65.52%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$banner->path}}" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption " style="padding: 9% 8%; width: 100%;">
                  <div class="bnr-text3 heading-font mt-0 order-1" style="font-size:0.425em; font-weight:400; line-height:1em">{{$banner->title}}</div>
                  <div class="bnr-text3 heading-font mt-xs order-2" style="font-size:1.05em; font-weight:600; line-height:1em;">{{$banner->description}}</div>
                  <div class="bnr-text3 heading-font mt-xs order-3" style="font-size:0.4em; font-weight:400; line-height:1em;">Gadjets</div>
                  <div class="bnr-btn  mt-sm order-3">
                    <div class="btn ">Buy Now</div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
        </div>
    </div>
</div>