@php
  foreach($blogs as $blog)
  {
    if($blog->id==3)
    {
      $popular_blog=$blog;
      break;
    }
  }
@endphp
<div class="aside-content">
              <div class="aside-block">
                <h2 class="text-uppercase">Popular Tags</h2>
                <ul class="tags-list">
                  <li><a href="#">jeans</a></li>
                  <li><a href="#">hand bags</a></li>
                  <li><a href="#">gift card</a></li>
                  <li><a href="#">goodwin</a></li>
                  <li><a href="#">seiko</a></li>
                  <li><a href="#">banita</a></li>
                  <li><a href="#">foxic</a></li>
                </ul>
              </div>
              <div class="aside-block">
                <h2 class="text-uppercase">Popular Posts</h2>
                <div class="post-prw-simple-sm">
                  <a href="{{route('electronic.blog_post',$popular_blog->slug)}}" class="post-prw-img">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$popular_blog->img_path}}" class="lazyload fade-up" alt="">
                  </a>
                  <div class="post-prw-links">
                    <div class="post-prw-date"><i class="icon-calendar"></i>{{$popular_blog->published_at}}</div>
                    <a href="#" class="post-prw-author">{{$popular_blog->published_by}}</a>
                  </div>
                  <h4 class="post-prw-title"><a href="{{route('electronic.blog_post',$popular_blog->slug)}}">{{$popular_blog->title}}</a></h4>
                  <a href="{{route('electronic.blog_post',$popular_blog->slug)}}" class="post-prw-comments"><i class="icon-chat"></i>15 comments</a>
                </div>
              </div>
              <div class="aside-block">
                <h2 class="text-uppercase">Meta</h2>
                <ul class="list list--nomarker">
                  <li><a href="#">Log in</a></li>
                  <li><a href="#">Entries RSS</a></li>
                  <li><a href="#">Comments RSS</a></li>
                </ul>
              </div>
              <div class="aside-block">
                <h2 class="text-uppercase">Archives</h2>
                <ul class="list list--nomarker">
                  <li><a href="#">January 2018</a></li>
                  <li><a href="#">February 2018</a></li>
                  <li><a href="#">March 2018</a></li>
                </ul>
              </div>
</div>
          