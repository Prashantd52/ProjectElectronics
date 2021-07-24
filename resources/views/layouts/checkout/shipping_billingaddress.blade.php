<div id="popupaddshippingaddress" class="addshippingaddressmodal">
    <!-- Modal content -->
    <div class="addshippingaddressmodal-content">
        <span class="close">&times;</span>
        
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
                        @error('address1')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror

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
                        @error('country')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                        <br>
                        <!-- ----------Select State ------------ -->
                        
                        <label class="text-uppercase">State:</label>
                        <select class="form-select col-md-18 state" aria-label="Default select example" name="state" >
                            <option selected disabled>-----Select State-----</option>
                        </select>
                        @error('state')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
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
                                @error('zip_code')
                                   <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <label class="text-uppercase">Phone/Mobile:</label>
                                <div class="form-group">
                                        <input type="text" name="phone" class="col-18">
                                </div>
                                @error('phone')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        

                        <br>
                        <div class="justifty-content-center text-center">
                            
                            <button type="submit" formaction="{{route('add_customer_address')}}" class="btn btn-success col-auto">Save</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<style>
    .addshippingaddressmodal {
        display: none; /* Hidden by default */
        position: absolute; /* Stay in place */
        z-index: 99999; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

        /* Modal Content/Box */
    .addshippingaddressmodal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

        /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<script>

  $(function(){
    $(".country").change(function(){
      let country_id=this.value;
      console.log(country_id);
      $.ajax({
        type: 'GET',
        url: "{{route('select_state')}}",
        data:{
            country_id: country_id,
        },
        success:function(response){
            console.log(response);
            
            $(".state").html(response);
            
        }
      })
     
    })
  });


</script>
