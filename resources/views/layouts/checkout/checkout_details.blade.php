<div class="col-md-10">
  <form action="{{Route('place_order')}}" method="post">
    @csrf
            <div class="steps-progress">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#step1" data-step="1"><span>01.</span><span>Shipping Address</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#step2" data-step="2"><span>02.</span><span>Billing Address</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#step3" data-step="3"><span>03.</span><span>Delivery Method</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#step4" data-step="4"><span>04.</span><span>Payment Method</span></a>
                </li>
              </ul>
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 25%;"></div>
              </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="step1">
                <div class="tab-pane-inside">
                  <div>
                  <a href="#" class="btn" id="formshippingaddress"><span>Add New Address</span></a>
                  @include('layouts.checkout.shipping_billingaddress')
                </div>
                <div class="row">
                  @foreach($addresses as $address)
                  <div class="col-sm-9">
                  <div class="card-body">
                    <p>{{$address->address_title}}
                      <br> {{$address->address_line_1}}
                      <br> {{$address->address_line_2}}
                      <br> {{$address->city}},  {{$address->zip_code}}
                      <br> <b class="icon-phone"></b> {{$address->phone}}
                    </p>
                  </div>
                  </div>
                  <div class="clearfix">
                    <input id="formcheckoutCheckbox{{$address->id}}" name="shipping_address" type="radio" value="{{$address->id}}" @if($address->address_type == 'Primary') checked @endif>
                    <label for="formcheckoutCheckbox{{$address->id}}">Choose Address</label>
                  </div> 
                  @endforeach
                </div>
                {{--<div>
                  <a href="#"class="btn link-icn js-show-form" data-form="#add_address"><span>Add New Address</span></a>
                  @include('layouts.account.add_address')
                </div>--}}
                  
                  <div class="text-right">
                    <button type="button" class="btn btn-sm step-next">Continue</button>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="step2">
                <div class="tab-pane-inside">
                  <div class="clearfix">
                    <input id="formcheckoutCheckbox2" name="checkbox2" type="checkbox" checked>
                    <label for="formcheckoutCheckbox2">The same as shipping address</label>
                  </div>
                  <br>
                  <h3>Add Billing Address</h3>
                  <div class="form-group" >
                      <div class="card">
                          <div class="card-body">
                              <div class="form-grpup">
                                  <label class="text-uppercase">Address Title:</label>
                                  <input class="col-18" type="text" name="name">
                              </div>

                              <div class="form-grpup">
                                  <label class="text-uppercase">Address Line 1:</label>
                                  <input class="col-18" type="text" name="address1" >
                              </div>
                              

                              <div class="form-grpup">
                                  <label class="text-uppercase">Address Line 2:</label>
                                  <input class="col-18" type="text" name="address2">
                              </div>

                              <label class="text-uppercase">Country:</label>
                              <select class="form-select col-md-18 country" aria-label="Default select example" name="country" >
                                  <option selected disabled>-----Select Country-----</option>
                                  @for($i=0; $i < count($country); $i++)
                                  <option value="{{$country[$i]->id}}">{{$country[$i]->name}}</option>
                                  @endfor
                              </select>
                              
                              <br>
                              <!-- ----------Select State ------------ -->
                              
                              <label class="text-uppercase">State:</label>
                              <select class="form-select col-md-18 state" aria-label="Default select example" name="state" >
                                  <option selected disabled>-----Select State-----</option>
                              </select>
                              
                              <div class="row">
                                  <div class="col-9">
                                      <label class="text-uppercase">City:</label>
                                      <div class="form-group">
                                          <input type="text" name="city" class="col-18">
                                      </div>
                                  </div>
                                  <div class="col-9">
                                      <label class="text-uppercase">zip/postal code:</label>
                                      <div class="form-group">
                                          <input type="text" name="zip_code" class="col-18">
                                      </div>
                                      
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-9">
                                      <label class="text-uppercase">Phone/Mobile:</label>
                                      <div class="form-group">
                                              <input type="text" name="phone" class="col-18">
                                      </div>
                                      
                                  </div>
                              </div>
                              <br>
                          </div>
                      </div>
                  </div>

                  <div class="mt-2"></div>
                  <div class="text-right">
                    <button type="button" class="btn btn-sm step-next">Continue</button>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="step3">
                <div class="tab-pane-inside">
                  <div class="clearfix">
                    <input id="formcheckoutRadio1" value="" name="radio1" type="radio" class="radio" checked="checked">
                    <label for="formcheckoutRadio1">Standard Delivery $2.99 (3-5 days)</label>
                  </div>
                  <div class="clearfix">
                    <input id="formcheckoutRadio2" value="" name="radio1" type="radio" class="radio">
                    <label for="formcheckoutRadio2">Express Delivery $10.99 (1-2 days)</label>
                  </div>
                  <div class="clearfix">
                    <input id="formcheckoutRadio3" value="" name="radio1" type="radio" class="radio">
                    <label for="formcheckoutRadio3">Same-Day $20.00 (Evening Delivery)</label>
                  </div>
                  <div class="text-right">
                    <button type="button" class="btn btn-sm step-next">Continue</button>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="step4">
                <div class="tab-pane-inside">
                  <div class="clearfix">
                    <input id="formcheckoutRadio4" value="6" name="radio2" type="radio" class="radio" checked="checked">
                    <label for="formcheckoutRadio4">Cash On Delivery</label>
                  </div>
                  <div class="clearfix">
                    <input id="formcheckoutRadio5" value="1" name="radio2"  type="radio" class="radio">
                    <label for="formcheckoutRadio5">PayPal</label>
                  </div>
                  <!-- <div class="clearfix">
                    <input id="formcheckoutRadio6" value="" name="radio2"  type="radio" class="radio">
                    <label for="formcheckoutRadio6">DebitCard</label>
                  </div>
                  <div class="mt-2"></div>
                  <label>Cart Number</label>
                  <div class="form-group">
                    <input type="text" class="form-control form-control--sm">
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                      <label>Month:</label>
                      <div class="form-group select-wrapper">
                        <select class="form-control form-control--sm">
                          <option selected value='1'>January</option>
                          <option value='2'>February</option>
                          <option value='3'>March</option>
                          <option value='4'>April</option>
                          <option value='5'>May</option>
                          <option value='6'>June</option>
                          <option value='7'>July</option>
                          <option value='8'>August</option>
                          <option value='9'>September</option>
                          <option value='10'>October</option>
                          <option value='11'>November</option>
                          <option value='12'>December</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <label>Year:</label>
                      <div class="form-group select-wrapper">
                        <select class="form-control form-control--sm">
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2"></div>
                  <label>CVV Code</label>
                  <div class="form-group">
                    <input type="text" class="form-control form-control--sm">
                  </div> -->
                </div>
                <div class="clearfix mt-1 mt-md-2">
                  <input hidden type="text" name="shop_id" value="{{$cartToCheckout[0]->shop_id}}" >
                  <input hidden type="text" name="customer_id" value="{{$cartToCheckout[0]->customer_id}}" >
                  <input hidden type="text" name="shipping_zone_id" value="{{$cartToCheckout[0]->shipping_zone_id}}" >
                  <input hidden type="text" name="cart_id" value="{{$cartToCheckout[0]->cart_id}}" >
                  
                  <button type="submit" class="btn btn--lg w-100">Place Order</button>
                </div>
              </div>
            </div>
  </form>
            @include('layouts.shop_feature')
</div>
<script>
  // Get the modal
  var modal = document.getElementById("popupaddshippingaddress");

  // Get the button that opens the modal
  var btn = document.getElementById("formshippingaddress");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on the button, open the modal
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }


</script>