<?php
    require 'config.php';
    session_start();
    if (!isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']===TRUE && !isset($_GET['oid'])) {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header('Location: index.php');
    } else{
      if ($_SESSION['orderConfirmed']===FALSE) {
        //SEND ERROR
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header('Location: index.php');
      }else{
        $_SESSION['orderConfirmed']=FALSE;
      }
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

  <link rel="stylesheet" type="text/css" href="css/orderConfirmationStyle.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  <div class="row">
    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

      <!-- Ordered products table -->
        <table class="table table-bordered table-striped table-responsive-stack"  id="tableOne">
            <thead class="productTableHeader d-none d-md-block">
                <tr>
                  <th scope="col" class="border-0 productTableHeader">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 productTableHeader">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 productTableHeader">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 productTableHeader">
                    <div class="py-2 text-uppercase">Status</div>
                  </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $safeOrderId = preg_replace('/[^\w]/','',$_GET['oid']);
                    $sql="SELECT proid, quantity, totalPrice, orderstatus, proname, proimgurl FROM productsinorder NATURAL JOIN product WHERE oid = '".$safeOrderId."' ORDER BY proname";
                    $result=$conn->query($sql);
                    while ($row=$result->fetch_assoc()) {
                ?>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?=$row['proimgurl']?>" alt="" width="70" class="img-fluid rounded shadow-sm"><br/>
                      <div class="d-inline-block align-middle">
                        <h6 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?=$row['proname']?></a></h6><!-- <span class="text-muted font-weight-normal font-italic d-block">category</span> -->
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?=$row['quantity']?></strong></td>
                  <td class="border-0 align-middle"><strong>&#8377;<?=$row['totalPrice']?></strong></td>
                  <td class="border-0 align-middle"><strong><?=$row['orderstatus']?></strong></td>
                </tr>
                <?php
                        }
                ?> 
            </tbody>
       </table>
      <!-- End -->
    </div>
      </div>


  <hr>
  <p>
    Having trouble? <a href="" style="text-decoration: underline; color: #fff;">Contact us</a>
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

<script type="text/javascript" src="js/orderConfirmation.js"></script>

</body>
</html>