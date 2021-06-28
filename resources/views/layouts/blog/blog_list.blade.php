<div class="col-md-14 aside aside--content">
            <div class="post-prws-listing">
              @foreach($blogs as $blog)
              <div class="post-prw">
                <div class="row vert-margin-middle">
                  <div class="post-prw-img col-md-7">
                    <a href="{{route('electronic.blog_post',$blog->slug)}}">
                      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$blog->img_path}}" class="lazyload fade-up" alt="">
                    </a>
                  </div>
                  <div class="post-prw-text col-md-11">
                    <div class="post-prw-links">
                      <div class="post-prw-date"><i class="icon-calendar"></i>{{$blog->published_at}}</div>
                      <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                    </div>
                    <h4 class="post-prw-title"><a href="{{route('electronic.blog_post',$blog->slug)}}">{{$blog->title}}</a></h4>
                    <div class="post-prw-teaser">{!! $blog->excerpt !!}</div>
                    <div class="post-prw-btn">
                      <a href="{{route('electronic.blog_post',$blog->slug)}}" class="btn btn--sm">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
              <!-- <div class="post-prw">
                <div class="row vert-margin-middle">
                  <div class="post-prw-img col-md-7">
                    <a href="{{route('electronic.blog_post')}}">
                      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-01.png" class="lazyload fade-up" alt="">
                    </a>
                  </div>
                  <div class="post-prw-text col-md-11">
                    <div class="post-prw-links">
                      <div class="post-prw-date"><i class="icon-calendar"></i>10 nov, 2020</div>
                      <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                    </div>
                    <h4 class="post-prw-title"><a href="{{route('electronic.blog_post')}}">Home page visual builder</a></h4>
                    <div class="post-prw-teaser">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
                    <div class="post-prw-btn">
                      <a href="{{route('electronic.blog_post')}}" class="btn btn--sm">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="post-prw">
                <div class="row vert-margin-middle">
                  <div class="post-prw-img col-md-7">
                    <a href="{{route('electronic.blog_post')}}">
                      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-02.png" class="lazyload fade-up" alt="">
                    </a>
                  </div>
                  <div class="post-prw-text col-md-11">
                    <div class="post-prw-links">
                      <div class="post-prw-date"><i class="icon-calendar"></i>15 nov, 2020</div>
                      <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                    </div>
                    <h4 class="post-prw-title"><a href="{{route('electronic.blog_post')}}">Slider/Megamenu visual builder</a></h4>
                    <div class="post-prw-teaser">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
                    <div class="post-prw-btn">
                      <a href="{{route('electronic.blog_post')}}" class="btn btn--sm">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="post-prw">
                <div class="row vert-margin-middle">
                  <div class="post-prw-img col-md-7">
                    <a href="{{route('electronic.blog_post')}}">
                      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-03.png" class="lazyload fade-up" alt="">
                    </a>
                  </div>
                  <div class="post-prw-text col-md-11">
                    <div class="post-prw-links">
                      <div class="post-prw-date"><i class="icon-calendar"></i>17 nov, 2020</div>
                      <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                    </div>
                    <h4 class="post-prw-title"><a href="{{route('electronic.blog_post')}}">Full theme control</a></h4>
                    <div class="post-prw-teaser">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
                    <div class="post-prw-btn">
                      <a href="{{route('electronic.blog_post')}}" class="btn btn--sm">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="post-prw">
                <div class="row vert-margin-middle">
                  <div class="post-prw-img col-md-7">
                    <a href="{{route('electronic.blog_post')}}">
                      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-04.png" class="lazyload fade-up" alt="">
                    </a>
                  </div>
                  <div class="post-prw-text col-md-11">
                    <div class="post-prw-links">
                      <div class="post-prw-date"><i class="icon-calendar"></i>01 dec, 2020</div>
                      <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                    </div>
                    <h4 class="post-prw-title"><a href="{{route('electronic.blog_post')}}">FOXic is very versatile</a></h4>
                    <div class="post-prw-teaser">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
                    <div class="post-prw-btn">
                      <a href="{{route('electronic.blog_post')}}" class="btn btn--sm">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="post-prw">
                <div class="row vert-margin-middle">
                  <div class="post-prw-img col-md-7">
                    <a href="{{route('electronic.blog_post')}}">
                      <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-05.png" class="lazyload fade-up" alt="">
                    </a>
                  </div>
                  <div class="post-prw-text col-md-11">
                    <div class="post-prw-links">
                      <div class="post-prw-date"><i class="icon-calendar"></i>15 dec, 2020</div>
                      <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                    </div>
                    <h4 class="post-prw-title"><a href="{{route('electronic.blog_post')}}">Left column visual builder</a></h4>
                    <div class="post-prw-teaser">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </div>
                    <div class="post-prw-btn">
                      <a href="{{route('electronic.blog_post')}}" class="btn btn--sm">Read More</a>
                    </div>
                  </div>
                </div>
              </div> -->
            <!-- <div class="pagination-wrap d-flex mt-4">
              <ul class="pagination mt-0">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
              </ul>
            </div> -->
</div>