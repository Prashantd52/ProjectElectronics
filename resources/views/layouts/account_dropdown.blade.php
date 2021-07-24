<div class="dropdn-content" id="dropdnAccount">
      <div class="dropdn-content-block">
        <div class="dropdn-close"><span class="js-dropdn-close">X Close</span></div>
        <ul>
          @if (Route::has('login'))
            @auth
              <li><h5>Hello, {{ Auth::user()->name }}</h5></li>
              <li><i class="icon-user">&nbsp;</i><a href="{{ route('electronic.account_details') }}"><span> My account</span></a></li>
              <li><i class="icon-cart">&nbsp;</i><a href="{{ route('electronic.account_order_history') }}"><span >My Orders</span></a></li>
              <li><i class="icon-wishlist">&nbsp;</i><a href="{{ route('electronic.account_wishlist') }}"><span >My wishlist</span></a></li>
              <li><i class="icon-cart">&nbsp;</i><a href="{{route('electronic.cart')}}"><span>My Cart</span></a></li> 
              <li><i class="icon-login">&nbsp;</i><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            @else
              <li><a href="{{ route('login') }}"><span>Log In </span><i class="icon-login"></i></a></li>
              @if (Route::has('register'))  
                <li><a href="{{route('electronic.account_create')}}"><span>Register </span><i class="icon-user2"></i></a></li>
              @endif
            @endauth
          @endif
        </ul>
        <!-- <div class="dropdn-form-wrapper">
          <h5>Quick Login</h5>
          <form action="#">
            <div class="form-group">
              <input type="text" class="form-control form-control--sm is-invalid" placeholder="Enter your e-mail">
              <div class="invalid-feedback">Can't be blank</div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control--sm" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn">Enter</button>
          </form>
        </div> -->
      </div>
      <div class="drop-overlay js-dropdn-close"></div>
    </div>