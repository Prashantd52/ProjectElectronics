<div class="card-total">
    <div class="text-right">
        <button class="btn btn--grey" type="submit"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
    </div>
    <div class="row d-flex">
        <div class="col card-total-txt">Total</div>
        <div class="col-auto card-total-price text-right">${{$cart->total +0}}</div>
    </div>
    <div>
    <a class="btn btn--full btn--lg"href="{{route('electronic.checkout',$cart->id)}}">
        <span>Checkout</span>
    </a>
    </div>
    <div class="card-text-info text-right">
        <h5>Standart shipping</h5>
        <p><b>10 - 11 business days</b><br>1 item ships from the U.S. and will be delivered in 10 - 11 business days</p>
    </div>
</div>