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

    //-----------------------------------Wishlist---------------------------------
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

//-----------------------------------//Wishlist ---------------------------------


//-----------------------------------Minicart ---------------------------------
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

//----------------------------------- /minicart ---------------------------------

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
      var sortBy='latest';
      var searchlimit="";

      
        $(function(){
            $(".brandName").click(function (){
              var nobrand= $(this).html();
              if(nobrand == 'No Specific Brand')
              {
                searchByBrand="";
              }
              else
              {
                searchByBrand=$(this).html();
              }
                console.log(searchByBrand);
                searchFilter();
            });

            $(".Price").click(function (){
                price=$(this).html();
                if(price == "Above $3000")
                  searchByPrice= price;
                else
                  searchByPrice= parseInt(price.replace('Under $',''));
                console.log(searchByPrice);
                searchFilter();
            });   
            
            $("#sortBy").change(function(){
                sortBy= $(this).val();
              // alert("You have selected the- " + sortBy);
              searchFilter();
            }); 
            $("#searchlimit").change(function(){
              searchlimit= parseInt($(this).val());
              console.log(searchlimit);
                searchFilter();
                //alert("You have selected the- " +searchlimit);
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
                $('#productlisting').html(response.data);
                $('#catItemCount').html(response.itemCount);
            }
            })
        }

        function searchFilter()
        {
          console.log(search);
          console.log(searchByBrand);
          console.log(searchByPrice);
          console.log(sortBy);
          console.log(searchlimit);
          $.ajax({
            url:"{{route('searchOnFilter')}}",
            type:'Get',
            data:{
              brandName: searchByBrand,
              price: searchByPrice,
              search: search,
              sortBy: sortBy,
              searchlimit: searchlimit,
            },
            success: function(response){
              console.log(response);
              //$('#productlisting').html(response); //testing purpose only
              $('#productlisting').html(response.data);
              $('#catItemCount').html(response.itemCount);
              console.log(search);
              console.log(searchByBrand);
              console.log(searchByPrice);
              console.log(sortBy);
              console.log(searchlimit);
            }
          })
        }

      {{--function searchPriceFilter()
        {
          console.log(search);
          $.ajax({
            url:"{{route('searchOnFilter')}}",
            type:'Get',
            data:{
              price: searchByPrice,
              search: search,
            },
            success: function(response){
              //console.log(response);
              $('#productlisting').html(response);
              console.log('success');
            }
          })
        }--}}
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

  //testing purpose------------------
  // function getQuickviewData(product_link,product_name,product_img_path,product_desripction,product_price)
  // { 
  //   $.ajax({
  //     type:'GET',
  //     url:"{{route('quickview')}}",
  //     Data:{
  //       product_slug: product_link,
  //     },
  //     success: function(response)
  //     {
  //       console.log(response);
  //     }
  //   });

  </script>