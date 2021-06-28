<div class="related-posts">
            <div class="title-with-arrows">
                <h3 class="h2-style"><a href="{{route('electronic.blog')}}">Related Posts</a></h3>
                <div class="carousel-arrows"></div>
            </div>
            <div class="post-prws post-prws-carousel js-post-prws-carousel" data-slick='{"slidesToShow": 1, "responsive": [{"breakpoint": 1024,"settings": {"slidesToShow": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'>
                <div class="post-prw">
                  <div class="row vert-margin-middle">
                    <div class="post-prw-img col-md-7">
                      <a href="{{route('electronic.blog_post',$blogs[0]->slug)}}">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$blogs[0]->img_path}}" class="lazyload fade-up" alt="">
                      </a>
                    </div>
                    <div class="post-prw-text col-md-11">
                      <div class="post-prw-links">
                        <div class="post-prw-date"><i class="icon-calendar"></i>{{$blogs[0]->published_at}}</div>
                        <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                      </div>
                      <h4 class="post-prw-title"><a href="{{route('electronic.blog_post',$blogs[0]->slug)}}">{{$blogs[0]->title}}</a></h4>
                      <div class="post-prw-teaser">{!! $blogs[0]->excerpt !!}</div>
                      <div class="post-prw-btn">
                        <a href="{{route('electronic.blog_post',$blogs[0]->slug)}}" class="btn btn--sm">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="post-prw">
                  <div class="row vert-margin-middle">
                    <div class="post-prw-img col-md-7">
                      <a href="{{route('electronic.blog_post',$blogs[1]->slug)}}">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$blogs[1]->img_path}}" class="lazyload fade-up" alt="">
                      </a>
                    </div>
                    <div class="post-prw-text col-md-11">
                      <div class="post-prw-links">
                        <div class="post-prw-date"><i class="icon-calendar"></i>{{$blogs[1]->published_at}}</div>
                        <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                      </div>
                      <h4 class="post-prw-title"><a href="{{route('electronic.blog_post',$blogs[1]->slug)}}">{{ $blogs[1]->title }}</a></h4>
                      <div class="post-prw-teaser">{!! $blogs[1]->excerpt !!}</div>
                      <div class="post-prw-btn">
                        <a href="{{route('electronic.blog_post',$blogs[1]->slug)}}" class="btn btn--sm">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
</div>