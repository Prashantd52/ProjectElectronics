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
      display: block; /*to make it visible only on fadeIn() function */
      top: 0;
      
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

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
        <p style="color:white"><b>Please Wait...</b></p>
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
  
  
  @include('electronic.js-script')
  
</body>
</html>