<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  @yield('title')
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <!-- Vendor CSS -->
  <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
  <link href="css/vendor/vendor.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style-electronics.css" rel="stylesheet">
  <style>
    .ajaxloader {
      position: fixed;
      
      height: 100vh; /* to make it responsive */
      width: 100vw; /* to make it responsive */
      overflow: hidden; /*to remove scrollbars */
      z-index: 99999; /*to make it appear on topmost part of the page */
      display: none; /*to make it visible only on fadeIn() function */

    }
  </style>
  <!-- Custom font -->
  <link href="fonts/icomoon/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- script-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body 
  @if(isset($product))
  class="template-product has-smround-btns has-loader-bg equal-height has-sm-container"
  @elseif(isset($category))
  class="template-collection has-smround-btns has-loader-bg equal-height has-sm-container"
  @else
  class="has-smround-btns has-loader-bg equal-height has-sm-container"
  @endif
>
    @include('layouts.header')
    <div class="flash-message">
    @if(session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @elseif(session('warning'))
    <div class="alert alert-warning text-center ">{{session('warning')}}</div>
    @elseif(session('danger'))
    <div class="alert alert-danger text-center ">{{session('danger')}}</div>
    @endif
    </div>
    <div class="ajaxloader">
      <center>
        <img src="images/ajax-loader.gif" >
      </center>
    </div>
    
        @yield('content')
        
    <br>
    <!------------- quickview page------------------------ -->
      <div>
        @include('electronic.quickview')
      </div>
    <!------------- /quickview page------------------------ -->
    @include('layouts.footer.footer_top')
    @yield('footer')
    @include('layouts.footer.footer_info')
    @include('layouts.footer.footer_bottom')
    <div class="footer-sticky">
      @yield('footersticky')
      <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top">
        <i class="icon icon-angle-up"></i>
      </a>
    </div>
    <div class="loader-horizontal js-loader-horizontal">
      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
      </div>
    </div>
    </div> 
  <script src="js/vendor-special/lazysizes.min.js"></script>
  <script src="js/vendor-special/ls.bgset.min.js"></script>
  <script src="js/vendor-special/ls.aspectratio.min.js"></script>
  <script src="js/vendor-special/jquery.min.js"></script>
  <script src="js/vendor-special/jquery.ez-plus.js"></script>
  <script src="js/vendor/vendor.min.js"></script>
  <script src="js/app-html.js"></script>
  
  <script>

    $(function(){
      
      $(document).ajaxSend(function(){
          $(".ajaxloader").fadeIn(250);
      });
      $(document).ajaxComplete(function(){
          $(".ajaxloader").fadeOut(250);
      });
      updateWishlistCount();
      updateMiniCartCount();
      updatemincartdata();
    });

    //---------------Add to cart ---------------
    function addToCart(id){
    
      $.ajax({
        url: "{{route('addToCart')}}",
        type: 'POST',
        data: {
          _token:'{{ csrf_token() }}',
          product_id: id
          },
        success: function(response){
          console.log(response);
          var dataResult = JSON.parse(response);
          if(dataResult.data=="Please login")
            window.location = "{{route('login')}}";
          else
          {
            document.getElementById("addedtocarttext").innerHTML=dataResult.data;
            if(dataResult.data== "Added To Cart")
            {
              updateMiniCartCount();
              updatemincartdata();
            }
          }
        }
      });
    }

    function addToCartWithQuantity(id){
      var q= parseInt(document.getElementById("quantity"+id).value);
      console.log(q);
      $.ajax({
        url: "{{route('addToCart')}}",
        type: 'POST',
        data: {
          _token:'{{ csrf_token() }}',
          product_id: id,
          quantity: q
          },
        success: function(response){
          console.log(response);
          var dataResult = JSON.parse(response);
          if(dataResult.data=="Please login")
            window.location = "{{route('login')}}";
          else
          {
            document.getElementById("addedtocarttext").innerHTML=dataResult.data;
            if(dataResult.data== "Added To Cart")
            {
              updateMiniCartCount();
              updatemincartdata();
              
            }
          }
        }
      });
    }

    //--------------- /Add to cart---------------

    function add_to_wishlist(inventory_id,product_id)
    {
      $.ajax({
        url:"{{route('add_wishlist')}}",
        type:'POST',
        data:{
          _token:'{{ csrf_token() }}',
          inventory_id: inventory_id,
          product_id: product_id
        },
        success: function(response){
          
          var dataResult = JSON.parse(response);
          updateWishlistCount();
          console.log('response');
          alert('added to wishlist')
        }
      })
    }

    function remove_from_wishlist(inventory_id)
    {
      console.log('response1');
      $.ajax({
        url:"{{route('remove_wishlist')}}",
        type:'DELETE',
        data:{
          _token:'{{ csrf_token() }}',
          inventory_id: inventory_id
        },
        success: function(response){
          
          var dataResult = JSON.parse(response);
          updateWishlistCount();
          if($('#wished_product'+inventory_id))
          {
            $('#wished_product'+inventory_id).hide();
          }
          console.log('response');
          alert('remove from wishlist');
        }
      })
    }
   

    function updateWishlistCount()
    {
      $.ajax({
        type:'GET',
        url:"{{route('update_wishlist_count')}}",
        success: function(response){
          $("#wishlist_quant1").html(response);
          $("#wishlist_quant2").html(response);
          console.log(response);
        }
      })
    }

    function updateMiniCartCount()
    {
      $.ajax({
        type:'GET',
        url:"{{route('update_minicart_count')}}",
        success: function(response){
          $("#minicart_quantity1").html(response.minicartCount);
          $("#minicart_quantity2").html(response.minicartCount);
          $("#minicart_total1").html('$'+response.carttotal);
          $("#minicart_total2").html('$'+response.carttotal)
          console.log(response);
        }
      })
    }

    function updatemincartdata()
    {
      $.ajax({
        url: "{{route('minicart')}}",
        type:'GET',
        success:function(data){
          $('#minicartdata').html(data);
          //console.log(data);
        }
      });
    }

    function decreaseqty(id,stock)
    {
      var quantity= parseInt($("#quantity"+id).val()) - 1;
      console.log(quantity);
      if(quantity==0)
      {
        alert("Quantity at least 1 to be purchase");
      }
    }

    function increaseqty(id,stock)
    {
      var quantity= parseInt($("#quantity"+id).val()) + 1;
      console.log(quantity);
      if(stock <quantity)
      {
        alert("Only "+stock+" available in stock");
      }
    }
  
  
  //-------------------Search script------------------
      var search="{{$search ?? ""}}";
      var searchByBrand="";
      var searchByPrice="";

      
        $(function(){
            $(".brandName").click(function (){
                searchByBrand=$(this).html();

                console.log(searchByBrand);
                searchBrandFilter(searchByBrand,search);
            });

            $(".Price").click(function (){
                searchByPrice=$(this).html();
                console.log(searchByPrice);
                searchPriceFilter(searchByPrice,search);
            });
        });

        function searchCategoryFilter(id,search)
        {
            console.log(search);
            $.ajax({
            url:"{{route('searchOnFilter')}}",
            type:'GET',
            data:{
                category_id: id,
                search: search,
            },
            success: function(response){
                console.log("done");
                $('#productlisting').html(response);
            }
            })
        }

        function searchBrandFilter(brand,search)
        {
          $.ajax({
            url:"{{route('searchOnFilter')}}",
            type:'Get',
            data:{
              brandName: brand,
              search: search,
            },
            success: function(response){
              console.log(response);
              $('#productlisting').html(response);
              console.log('success');
            }
          })
        }

        function searchPriceFilter(price_code,search)
        {
          console.log(search);
          $.ajax({
            url:"{{route('searchOnFilter')}}",
            type:'Get',
            data:{
              price: price_code,
              search: search,
            },
            success: function(response){
              //console.log(response);
              $('#productlisting').html(response);
              console.log('success');
            }
          })
        }
  //-------------------/Search script------------------

      $(".minicart-link").click(function(){
        $("#dropdnMinicart").show();
      })


  //---------------quickview script----------
  function getQuickviewData(product_link,product_name,product_img_path,product_desripction,product_price)
  {
    console.log(product_link);
    console.log(product_name);
    console.log(product_img_path);
    console.log(product_desripction);
    console.log(product_price);
    //alert('hello')
    //alert('functionworking');
    document.getElementById("quickView").style.display= "block";

    $("#product_name").html(product_name);
    $("#product_price").html("$"+product_price);
    $("#product_description").html(product_desripction);
    $("#product_image").attr("src",product_img_path);
    $("#product_link").attr("href",product_link);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() 
      {
        document.getElementById("quickView").style.display = "none";
      }
  }
  </script>
  @yield('script')
  
</body>
</html>