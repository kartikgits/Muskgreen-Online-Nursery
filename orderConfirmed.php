<?php
    require 'config.php';
    session_start();
    if (!isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']===TRUE) {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header('Location: index.php');
    } else{
      // if ($_SESSION['orderConfirmed']===FALSE) {
      //   //SEND ERROR
      //   header('Location: index.php');
      // }else{
      //   $_SESSION['orderConfirmed']=FALSE;
      // }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Confirmed | MuskGreen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
  <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >

  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style type="text/css">
    div.bodyJumbotron {
      background: -webkit-linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
      background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
      -webkit-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
      -moz-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
      box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
      color: #fff !important;
    }
  </style>


  <style type="text/css">

    .confirmContainer {
      display: flex;
    }

    .checkmark_ok {
      position: absolute;
      animation: grow 1.3s cubic-bezier(0.42, 0, 0.275, 1.155) both;
    }
    .checkmark_ok:nth-child(1) {
      width: 12px;
      height: 12px;
      left: 12px;
      top: 16px;
    }
    .checkmark_ok:nth-child(2) {
      width: 18px;
      height: 18px;
      left: 168px;
      top: 84px;
    }
    .checkmark_ok:nth-child(3) {
      width: 10px;
      height: 10px;
      left: 32px;
      top: 162px;
    }
    .checkmark_ok:nth-child(4) {
      width: 20px;
      height: 20px;
      left: 82px;
      top: -12px;
    }
    .checkmark_ok:nth-child(5) {
      width: 14px;
      height: 14px;
      left: 125px;
      top: 162px;
    }
    .checkmark_ok:nth-child(6) {
      width: 10px;
      height: 10px;
      left: 16px;
      top: 16px;
    }
    .checkmark_ok:nth-child(1) {
      animation-delay: 1.7s;
    }
    .checkmark_ok:nth-child(2) {
      animation-delay: 2.1s;
    }
    .checkmark_ok:nth-child(3) {
      animation-delay: 2.4s;
    }
    .checkmark_ok:nth-child(4) {
      animation-delay: 3.1s;
    }
    .checkmark_ok:nth-child(5) {
      animation-delay: 3.7s;
    }
    .checkmark_ok:nth-child(6) {
      animation-delay: 4.5s;
    }

    .checkmark {
      position: relative;
      padding: 8px;
      animation: checkmark 50.6s cubic-bezier(0.42, 0, 0.275, 1.155) both;
    }

    .checkmark__check {
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 10;
      transform: translate3d(-50%, -50%, 0);
      fill: #fff;
    }

    .checkmark__back {
      animation: rotate 15s linear both infinite;
    }

    @keyframes rotate {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
    @keyframes grow {
      0%, 100% {
        transform: scale(0);
      }
      50% {
        transform: scale(1);
      }
    }

    @keyframes checkmark {
      0%, 100% {
        opacity: 0;
        transform: scale(0);
      }
      10%, 50%, 90% {
        opacity: 1;
        transform: scale(1);
      }
    }

  </style>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
<div class="jumbotron text-center bodyJumbotron">
  <h1 class="display-3 d-none d-sm-block">Thank You!</h1>
  <h1 class="display-4 d-sm-none">Thank You!</h1>

  <!-- <h1 class="display-2"><i class="fa fa-check-circle-o" aria-hidden="true"></i></h1> -->

  <div class="container confirmContainer">
    <div class="row mx-auto">
      <div class="col-12">
      <div class="checkmark">
        <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#E8F5E9">
        </svg>
        <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#E8F5E9">
        </svg>
        <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#E8F5E9">
        </svg>
        <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#E8F5E9">
        </svg>
        <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#E8F5E9">
        </svg>
        <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#E8F5E9">
        </svg>
        <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48" xmlns="http://www.w3.org/2000/svg">
        <path d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23" fill="#509534">
        </svg>
        <svg class="checkmark__back" height="115" viewBox="0 0 120 115" width="120" xmlns="http://www.w3.org/2000/svg">
        <path d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z" fill="#E8F5E9">
        </svg>
      </div>
      </div>
    </div>
  </div>

  <h1 class="display-4 d-none d-md-block">Your order has been confirmed.</h1>
  <h3 class="d-md-none">Your order has been confirmed.</h3>

  <p class="lead"><strong>Please check your email for confirmation.</strong></p>
  <p class="lead">Your green order will be shipped soon.</p>
  <hr>
  <h5>Products in Order</h5>

  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>
</div>


<!--Footer-->
<footer class="footer">
    <div class="container bottom_border">
    <div class="row">
    <div class=" col-sm-4 col-md col-sm-4  col-12 col">
    <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
    <!--headin5_amrc-->
    <p class="mb10"> MuskGreen  is a startup nestled in the Himalayan foothill city - Dehradun. We provide a platform to deliver our customers the large variety of plants and the best of organic products.</p>
    <p><i class="fa fa-location-arrow"></i> 34, Kunj Vihar, Dehradun, Uttarakhand - 248001 </p>
<!--        <p><i class="fa fa-phone"></i>  +91-9999878398  </p>-->
    <p><i class="fa fa fa-envelope"></i> info@muskgreen.live  </p>


    </div>


    <div class=" col-sm-4 col-md  col-6 col">
    <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
    <!--headin5_amrc-->
    <ul class="footer_ul_amrc">
    <li><a href="#">Buy Plants</a></li>
    <li><a href="#">Buy Organic Products</a></li>
    <li><a href="#">Buy Pots</a></li>
    <li><a href="#">Gifts</a></li>
    <li><a href="#">Offer Zone</a></li>
    </ul>
    <!--footer_ul_amrc ends here-->
    </div>


    <div class=" col-sm-4 col-md  col-6 col">
    <h5 class="headin5_amrc col_white_amrc pt2">Resources</h5>
    <!--headin5_amrc-->
    <ul class="footer_ul_amrc">
    <li><a href="#">About us</a></li>
    <li><a href="#">Contact us</a></li>
    <li><a href="#">Wholesale</a></li>
    <li><a href="#">Product Guarantee</a></li>
    <li><a href="#">Customer Reviews</a></li>
    <li><a href="#">Privacy Policy</a></li>
    <li><a href="#">Terms & Conditions</a></li>
    </ul>
    <!--footer_ul_amrc ends here-->
    </div>
    </div>
    </div>


    <div class="container">
    <ul class="foote_bottom_ul_amrc">
    <li><a href="http://webenlance.com">Home</a></li>
    <li><a href="http://webenlance.com">About</a></li>
    <li><a href="http://webenlance.com">Products</a></li>
    <li><a href="http://webenlance.com">Musk Sellers</a></li>
    <li><a href="http://webenlance.com">Contact</a></li>
    </ul>
    <!--foote_bottom_ul_amrc ends here-->
    <p class="text-center">Copyright @2019 | Made with love and care by <a href="#">MuskGreen</a></p>

    <ul class="social_footer_ul">
    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
    </ul>
    <!--social_footer_ul ends here-->
    </div>

</footer>


</body>
</html>