<?php
    require 'config.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Products</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >

    <!-- Our CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="(min-width: 767.99px)">
    <link rel="stylesheet" type="text/css" href="css/mobileNav.css" media="(max-width: 767.99px)">
    <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/cartStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        body {
          background: -webkit-linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
          background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%);
          min-height: 100vh;
        }
    </style>

    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Welcome to MuskGreen - India's Latest Digital Nursery and Organic Products store</title>

</head>

<body>

<!--      Top Brand Bar with Search, Login & Signup and Cart (Includes NavBar button in mobile view)-->
        <nav class="navbar navbar-expand-md sticky-top navbar-light topBar d-none d-md-flex">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand py-0 topNavItem" href="#">
                <img src="extras/musklogo224.png" width="100%" class="d-inline-block align-top" alt="MuskGreen">
            </a>
            
            <!--Search Box-->
            <form autocomplete="off" class="input-group md-form form-sm form-2 pl-0 topNavItem" action="products.php?">
              <input class="autocomplete form-control my-0 py-1 amber-border" id="myInput" type="text" name="product" placeholder="Search" aria-label="Search">
              <div class="input-group-append" type="submit">
                <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
            </form>
            
            <!--Login/Signup or Account-->
            <?php
                if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
            ?>
            <a class="topNavItem nav-item py-0" href="#"><span class="fa fa-user topNavItem" title="User Account" aria-hidden="true"> <span><br/>Account</span></span></a>
            <!-- Cart -->
            <a class="topNavItem nav-item py-0" href="#"><span class="fa fa-shopping-cart topNavItem" title="Cart" aria-hidden="true"> <span><br/>Cart[<span id="cartCountUserDesktop"><?=$_SESSION['cartCount']?></span>]</span></span></a>
            <?php
                } else {
            ?>
            <a class="topNavItem nav-item py-0" href="#" onclick="signupLogin()"><span class="fa fa-user topNavItem" title="Login Or Signup" aria-hidden="true"> <span><br/>Login/Signup</span></span></a>
            <!-- Cart -->
            <a class="topNavItem nav-item py-0" href="#"><span class="fa fa-shopping-cart topNavItem" title="Cart" aria-hidden="true"> <span><br/>Cart[<span id="cartCountDesktop">0</span>]</span></span></a>
            <?php
                }
            ?>

        </nav>
      
      
<!--   Navigation Bar   -->
      <nav class="navbar navbar-expand-md lowerNavBar d-none d-md-flex">
<!--          <a class="navbar-brand" href="#">Navbar</a>-->
          
          <div class="collapse navbar-collapse navigationBar" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Plants
                </a>
                <div class="dropdown-menu dropdownMenu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">All Plants</a>
                    <a class="dropdown-item" href="#">Plant Packs</a>
                    <a class="dropdown-item" href="#">Gift Plants</a>
                    <a class="dropdown-item" href="#">Flowering Plants</a>
                    <a class="dropdown-item" href="#">Indoor Plants</a>
                </div>
              </li>
                
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Flowers
                </a>
                <div class="dropdown-menu dropdownMenu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">All Flowers</a>
                    <a class="dropdown-item" href="#">Rose Plants</a>
                    <a class="dropdown-item" href="#">Hibiscus PLants</a>
                    <a class="dropdown-item" href="#">Jasmine Plants</a>
                    <a class="dropdown-item" href="#">Flowering Creepers</a>
                    <a class="dropdown-item" href="#">PLants for Flower bed</a>
                </div>
              </li>
              
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Pots
                    </a>
                    <div class="dropdown-menu dropdownMenu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Plastic Planters</a>
                        <a class="dropdown-item" href="#">Earthen Planters</a>
                        <a class="dropdown-item" href="#">Concrete Planters</a>
                    </div>
              </li>
                
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Fertilizers
                </a>
              </li>
                
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Soils
                </a>
              </li>
            </ul>
          </div>
      </nav>
      
      
      <!--Mobile Navigation Bar-->
      <div class="mobileBar navigation-wrap bg-light start-header start-style d-md-none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-md navbar-light">

                            <a class="navbar-brand" href="https://themeforest.net/user/ig_design/portfolio" target="_blank"><img src="extras/musklogo112.png" alt=""></a>
                            
                            <!-- account -->
                            <?php
                                if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
                            ?>
                            <a class="mobileNavItem py-0" href="#"><span class="fa fa-user mobileNavItem" type="" title="User Account" aria-hidden="true"></span></a>
                            <!-- cart -->
                            <span class="fa fa-shopping-cart py-0 mobileNavItem" title="Cart" aria-hidden="true"><span> [<span id="cartCountUserMobile">0</span>]</span></span>
                            <?php
                                }else{
                            ?>
                            <a class="mobileNavItem py-0" href="#" onclick="signupLogin()"><span class="fa fa-user mobileNavItem" type="" title="Login or SignUp" aria-hidden="true"></span></a>
                            <!-- cart -->
                            <span class="fa fa-shopping-cart py-0 mobileNavItem" title="Cart" aria-hidden="true"><span> [0]</span></span>
                            <?php
                                }
                            ?>


                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto py-4 py-md-0">
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Plants</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">All Plants</a>
                                            <a class="dropdown-item" href="#">Plant Packs</a>
                                            <a class="dropdown-item" href="#">Gift Plants</a>
                                            <a class="dropdown-item" href="#">Flowering Plants</a>
                                            <a class="dropdown-item" href="#">Indoor Plants</a>
                                        </div>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Flowers</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">All Flowers</a>
                                            <a class="dropdown-item" href="#">Rose Plants</a>
                                            <a class="dropdown-item" href="#">Hibiscus PLants</a>
                                            <a class="dropdown-item" href="#">Jasmine Plants</a>
                                            <a class="dropdown-item" href="#">Flowering Creepers</a>
                                            <a class="dropdown-item" href="#">PLants for Flower bed</a>
                                        </div>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pots</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Plastic Planters</a>
                                            <a class="dropdown-item" href="#">Earthen Planters</a>
                                            <a class="dropdown-item" href="#">Concrete Planters</a>
                                        </div>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link" href="#">Fertilizers</a>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link" href="#">Soils</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!--Search Box (Mobile)-->
                            <form autocomplete="off" class="input-group md-form form-sm form-2 pl-0 d-md-none" action="products.php?">
                              <input class="autocomplete form-control my-0 py-1 amber-border" id="myInput2" type="text" name="product" placeholder="Search" aria-label="Search">
                              <div class="input-group-append" type="submit">
                                <div class="input-group-append">
                                  <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                  </button>
                                </div>
                              </div>
                            </form>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

<!-- Main Content Starts -->
<div class="px-4 px-lg-0">
  <div class="container text-white py-5 text-center">
    <h4>Your Cart</h4>
  </div>

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
            <table class="table table-bordered table-striped table-responsive-stack"  id="tableOne">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col" class="border-0 bg-light">
                        <div class="p-2 px-3 text-uppercase">Product</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Price</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Quantity</div>
                      </th>
                      <th scope="col" class="border-0 bg-light">
                        <div class="py-2 text-uppercase">Remove</div>
                      </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
                            $sql="SELECT * FROM usercart NATURAL JOIN product NATURAL JOIN productseller WHERE uid = '".$_SESSION['userId']."' ORDER BY proname";
                            $result=$conn->query($sql);
                            $itemsCount=0;
                            while ($row=$result->fetch_assoc()) {
                                $itemsCount=$itemsCount+1;
                                $muskPrice = floatval($row['sp']) - ((floatval($row['discount'])/100) * floatval($row['cp']));
                    ?>
                    <tr>
                      <th scope="row" class="border-0">
                        <div class="p-2">
                          <img src="<?=$row['proimgurl']?>" alt="" width="70" class="img-fluid rounded shadow-sm"><br/>
                          <div class="ml-3 d-inline-block align-middle">
                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?=$row['proname']?></a></h5><!-- <span class="text-muted font-weight-normal font-italic d-block">category</span> -->
                          </div>
                        </div>
                      </th>
                      <td class="border-0 align-middle"><strong>&#8377;<?=$muskPrice?></strong></td>
                      <td class="border-0 align-middle">
                        <strong>
                        <form style="display: inline-block; max-width: 100px;">
                            <select class="form-control">
                            <?php
                                for ($i=1; $i <= 10; $i++) { 
                                    if ($i==$row['quantity']) {
                                        echo "<option value=\"".$i."\" selected>".$i."</option>";
                                    }else{
                                        echo "<option value=\"".$i."\">".$i."</option>";
                                    }
                                }
                            ?>
                            </select>
                        </form>
                        </strong>
                        </td>
                      <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash" style="color: #4d4d4d;"></i></a></td>
                    </tr>
                    <?php
                            }
                            if ($itemsCount === 0) {
                                echo "
                                <div class=\"d-flex justify-content-center\">
                                    <i class=\"fa fa-leaf fa-2x\" aria-hidden=\"true\" style=\"color: #4d4d4d;\"></i><br/>
                                    <h5>Oops.. Nothing Green Here</h5>
                                </div>";
                            }
                        }
                    ?> 
                </tbody>
           </table>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
          <div class="p-4">
            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
            <div class="input-group mb-4 border rounded-pill p-2">
              <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0 applyCouponText">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong><span id="cartSubtotal"></span></strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong><span id="cartDeliveryCharges"></span></strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>&#8377;0.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"><span id="totalCartCharges"></span></h5>
              </li>
            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Proceed to Checkout</a>
          </div>
        </div>
      </div>

    </div>
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

<!--  Main Body Ends  -->
      
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/styler.js"></script>
    <script type="text/javascript" src="js/buttonActions.js"></script>
    <script type="text/javascript" src="js/cartActions.js"></script>
    <script type="text/javascript" src="js/liveSearch.js"></script>

</body>
</html>