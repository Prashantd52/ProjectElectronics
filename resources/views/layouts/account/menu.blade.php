<div class="col-md-5 aside aside">
            <div class="list-group">
              <a href="{{route('electronic.account_details')}}" class="list-group-item @if($account=='details')active @endif">Account Details</a>
              <a href="{{route('electronic.account_address')}}" class="list-group-item @if($account=='address')active @endif">My Addresses</a>
              <a href="{{route('electronic.account_wishlist')}}" class="list-group-item @if($account=='wishlist')active @endif">My Wishlist</a>
              <a href="{{route('electronic.account_order_history')}}" class="list-group-item @if($account=='history')active @endif">My Order History</a>
              <a href="#" class="list-group-item disabled">My Reviews</a>
              <a href="#" class="list-group-item disabled">My Saved Tags</a>
              <a href="#" class="list-group-item disabled">Compare Products</a>
            </div>
</div>