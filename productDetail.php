<?php
    session_start();
    if (!isset($_GET['proid'])) {
        header("Location: products.php");
    }
    if (!(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE)) {
        include 'serverPhp/remember.php';
    }
    require 'config.php';
    $logInStatus="";

    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
        $logInStatus="true";
    }else{
        $logInStatus="false";
    }

    $productId = $conn->real_escape_string($_GET['proid']);
    $sql = "select proname from product where proid='".$productId."'";
    $result = $conn->query($sql);
    $prodName="";
    while ($row=$result->fetch_assoc()) {
        $prodName.=$row['proname'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Buy <?=$prodName?> in Dehradun | MuskGreen | Fast and Free Delivery | Best Plant Nursery in Dehradun</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >

    <link rel="stylesheet" type="text/css" href="css/style.css" media="(min-width: 768px)">
    <link rel="stylesheet" type="text/css" href="css/mobileNav.css" media="(max-width: 767px)">
    <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/productDetailsStyle.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/typeahead.bundle.js"></script>
    <script type="text/javascript" src="js/liveSearch.js"></script>

    <meta name="description" content="Buy <?=$prodName?> at Lowest Prices in Dehradun. Great Offers on Ornamental, Air Purifiers, Succulents and variety of plants. Find out more!"/>
    <meta name="keywords" content="buy <?=$prodName?> online india, buy <?=$prodName?> online, buy <?=$prodName?> near me, <?=$prodName?> online india, <?=$prodName?> online, <?=$prodName?> nursery">
</head>

<body onload="setCartCount('<?=$logInStatus?>')">

<!--      Top Brand Bar with Search, Login & Signup and Cart (Includes NavBar button in mobile view)-->
        <nav class="navbar navbar-expand-md sticky-top navbar-light topBar d-none d-md-flex">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand py-0 topNavItem" href="index.php">
                <img src="extras/musklogo224.png" width="72%" class="d-inline-block align-top" alt="MuskGreen">
            </a>
            
            <!--Search Box-->
            <form autocomplete="off" class="input-group md-form form-sm form-2" action="products.php?">
              <input class="autocomplete form-control my-0 py-1 amber-border typeahead tt-query" id="myInput" type="text" name="product" placeholder="Search" aria-label="Search" autocomplete="off" spellcheck="false" style="display: inline; text-align: left;">
              <button class="btn btn-secondary" type="submit" style="display: inline;">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
            
            <!--Login/Signup or Account-->
            <?php
                if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
            ?>
            <a class="topNavItem nav-item py-0" href="profile.php"><span class="fa fa-user topNavItem" title="User Account" aria-hidden="true"> <span><br/>Account</span></span></a>
            <!-- Cart -->
            <a class="topNavItem nav-item py-0" href="cart.php"><span class="fa fa-shopping-cart topNavItem" title="Cart" aria-hidden="true"> <span><br/>Cart[<span id="cartCountUserDesktop"><?=$_SESSION['cartCount']?></span>]</span></span></a>
            <?php
                } else {
            ?>
            <a class="topNavItem nav-item py-0" href="#" onclick="signupLogin()"><span class="fa fa-user topNavItem" title="Login Or Signup" aria-hidden="true"> <span><br/>Login/Signup</span></span></a>
            <!-- Cart -->
            <a class="topNavItem nav-item py-0" href="cart.php"><span class="fa fa-shopping-cart topNavItem" title="Cart" aria-hidden="true"> <span><br/>Cart[<span id="cartCountDesktop">0</span>]</span></span></a>
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
                    <a class="dropdown-item" href="products.php?product=Succulents">Succulents</a>
                    <a class="dropdown-item" href="products.php?product=Ornamental">Ornamental Plants</a>
                    <a class="dropdown-item" href="products.php?product=Gift">Gift Plants</a>
                    <a class="dropdown-item" href="products.php?product=Shade">Shade Plants</a>
                    <a class="dropdown-item" href="products.php?product=Indoor">Indoor Plants</a>
                    <a class="dropdown-item" href="products.php?product=Aromatic">Aromatic Plants</a>
                    <a class="dropdown-item" href="products.php?product=Fruit">Fruit Plants</a>
                    <a class="dropdown-item" href="products.php?product=Medicinal">Medicinal Plants</a>
                </div>
              </li>
                
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Flowers
                </a>
                <div class="dropdown-menu dropdownMenu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="products.php?product=Flowering">All Flowers</a>
                    <a class="dropdown-item" href="products.php?product=Rose">Rose Plants</a>
                    <a class="dropdown-item" href="products.php?product=Hibiscus">Hibiscus PLants</a>
                    <a class="dropdown-item" href="products.php?product=Jasmine">Jasmine Plants</a>
                    <a class="dropdown-item" href="products.php?product=Gazania">Gazania Plants</a>
                </div>
              </li>
              
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Pots
                    </a>
                    <div class="dropdown-menu dropdownMenu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="products.php?product=Plastic Pots">Plastic Planters</a>
                        <a class="dropdown-item" href="products.php?product=Ceramic Pots">Ceramic Planters</a>
                        <a class="dropdown-item" href="#">Earthen Planters</a>
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

                            <a class="navbar-brand" href="index.php"><img src="extras/musklogo112.png" alt=""></a>
                            
                            <!-- account -->
                            <?php
                                if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
                            ?>
                            <a class="mobileNavItem py-0" href="profile.php"><span class="fa fa-user mobileNavItem" type="" title="User Account" aria-hidden="true"></span></a>
                            <!-- cart -->
                            <a class="mobileNavItem py-0"><span class="fa fa-shopping-cart mobileNavItem" title="Cart" aria-hidden="true"><span> [<span id="cartCountUserMobile">0</span>]</span></span></a>
                            <?php
                                }else{
                            ?>
                            <a class="mobileNavItem py-0" href="#" onclick="signupLogin()"><span class="fa fa-user mobileNavItem" type="" title="Login or SignUp" aria-hidden="true"></span></a>
                            <!-- cart -->
                            <a class="py-0 mobileNavItem" href="cart.php"><span class="fa fa-shopping-cart mobileNavItem" title="Cart" aria-hidden="true"><span> [<span id="cartCountMobile">0</span>]</span></span></a>
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
                                            <a class="dropdown-item" href="products.php?product=Succulents">Succulents</a>
                                            <a class="dropdown-item" href="products.php?product=Ornamental">Ornamental Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Shade">Shade Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Indoor">Indoor Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Aromatic">Aromatic Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Fruit">Fruit Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Medicinal">Medicinal Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Gift">Gift Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Plants">All Plants</a>
                                        </div>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Flowers</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="products.php?product=Flowering">All Flowers</a>
                                            <a class="dropdown-item" href="products.php?product=Rose">Rose Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Hibiscus">Hibiscus PLants</a>
                                            <a class="dropdown-item" href="products.php?product=Jasmine">Jasmine Plants</a>
                                            <a class="dropdown-item" href="products.php?product=Gazania">Gazania Plants</a>
                                        </div>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pots</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="products.php?product=Plastic Pots">Plastic Planters</a>
                                            <a class="dropdown-item" href="products.php?product=Ceramic Pots">Ceramic Planters</a>
                                            <a class="dropdown-item" href="#">Earthen Planters</a>
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
                            <form autocomplete="off" class="mobileSearchBar input-group md-form form-sm form-2 pl-0 d-md-none" action="products.php?">
                              <input class="autocomplete form-control py-0 amber-border typeahead tt-query" id="myInput2" type="text" name="product" placeholder="Search Plants, Pots and More..." aria-label="Search" autocomplete="off" spellcheck="false">
                              <button class="btn btn-secondary" type="submit" style="display: inline;">
                                <i class="fa fa-search" aria-hidden="true"></i>
                              </button>
                            </form>

                        </nav>
                    </div>
                </div>
            </div>
        </div>

<!-- Main Content starts -->

<?php
    if (isset($_GET['proid'])) {
        $sql = "select * from product p natural join productseller where p.proid='".$productId."'";
        $catsql = "select category from proundercat where proid='".$productId."'";

        $result = $conn->query($sql);
        $catresult = $conn->query($catsql);
        if($result->num_rows > 0){
            while ($row=$result->fetch_assoc()) {
                ?>
                <main class="container productsContainer">
                      <!-- Left Column / Product Image -->
                      <div class="row">
                          <div class="left-column col-md-6">
                            <img data-image="black" src="" alt="">
                            <img data-image="blue" src="" alt="">
                            <img data-image="red" class="active" src="<?=$row['proimgurl']?>" alt="Buy <?=$row['proname']?> Online">
                          </div>


                          <!-- Right Column -->
                          <div class="right-column col-md-6">

                            <!-- Product Description -->
                            <div class="product-description">
                              <span>In 
                                  <?php 
                                    if($catresult->num_rows > 0){
                                        while($catrow=$catresult->fetch_assoc()){
                                            echo $catrow['category'];
                                            echo ", ";
                                        }
                                    }
                                  ?>
                              </span>
                              <h1><?=$row['proname']?></h1>
                              <p style="padding: 8px; overflow: overlay;"><?=$row['prodescription']?></p>
                            </div>

                            <!-- Product Pricing -->
                            <div class="product-price">
                                <?php 
                                    $mrp=floatval($row['sp']) + (floatval($row['discount'])/100)*floatval($row['sp']);
                                ?>
                              <span class="originalPrice" label="Original Price">&#8377;<?=$mrp?></span><span class="muskPrice" label="MuskGreen Price">&#8377;<?=$row['sp']?></span>
                            </div>
                            <span class="btn-group d-none d-sm-block" role="group">
                                <button type="button" class="btn btn-warning cart-btn" onclick="addToCart('<?=$row['proid']?>', '<?=$logInStatus?>')" id="addToCartButton"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
                                <a class="btn btn-danger cart-btn" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Go To Cart</a>
                            </span>
                            <div class="cartButtonGroup d-sm-none" role="group">
                                <button type="button" class="btn btn-warning" onclick="addToCart('<?=$row['proid']?>', '<?=$logInStatus?>')" id="addToCartButtonMobile" style="color: #fff;"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
                                <a class="btn btn-danger" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Go To Cart</a>
                            </div>
                          </div>
                        </div>
                </main>
                <?php
            }
        } else{
            $error='That product either does not exist or has been removed.';
            echo " <script> location.replace(\"error.php?errorMessage=".$error."\");</script>";
        }
    } else {
        $error='Did you alter URL?';
        echo " <script> location.replace(\"error.php?errorMessage=".$error."\");</script>";
    }
?>

<?php 
    $conn->close();
?>


<!--Footer-->
    <footer class="footer">
        <div class="container bottom_border">
        <div class="row">
        <div class=" col-sm-4 col-md col-sm-4  col-12 col">
        <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
        <!--headin5_amrc-->
        <p class="mb10"> MuskGreen  is a startup nestled in the Himalayan foothill city - Dehradun. We provide a platform to deliver our customers the large variety of plants, flowers and the best of organic products.</p>
        <p><i class="fa fa-location-arrow"></i> 34, Kunj Vihar, Dehradun, Uttarakhand - 248001 </p>
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
        <li><a href="sitemap.html">Site Map</a></li>
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
        <li><a href="privacyPolicy.html">Privacy Policy</a></li>
        <li><a href="termsAndConditions.html">Terms & Conditions</a></li>
        </ul>
        <!--footer_ul_amrc ends here-->
        </div>
        </div>
        </div>


        <div class="container">
        <ul class="foote_bottom_ul_amrc">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="#">Sellers</a></li>
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

    <script type="text/javascript" src="js/styler.js"></script>
    <script type="text/javascript" src="js/buttonActions.js"></script>
    <script type="text/javascript" src="js/productDetails.js" charset="utf-8"></script>

</body>
</html>