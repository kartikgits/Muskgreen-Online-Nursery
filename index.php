<?php
	session_start();
  $logInStatus="";

  if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
      $logInStatus="true";
  }else{
      $logInStatus="false";
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >
    
    <!-- Our CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="(min-width: 768px)">
    <link rel="stylesheet" type="text/css" href="css/mobileNav.css" media="(max-width: 767px)">
    <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/typeahead.bundle.js"></script>
    <script type="text/javascript" src="js/liveSearch.js"></script>


    <title>Welcome to MuskGreen - India's Latest Digital Nursery and Organic Products store</title>
  </head>

  <body onload="setCartCount('<?=$logInStatus?>')">

<!--      Top Brand Bar with Search, Login & Signup and Cart (Includes NavBar button in mobile view)-->
        <nav class="navbar navbar-expand-md sticky-top navbar-light topBar d-none d-md-flex">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand py-0 topNavItem" href="#">
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
                            <a class="mobileNavItem py-0" href="profile.php"><span class="fa fa-user mobileNavItem" type="" title="User Account" aria-hidden="true"></span></a>
                            <!-- cart -->
                            <a class="mobileNavItem py-0"><span class="fa fa-shopping-cart mobileNavItem" title="Cart" aria-hidden="true"><span> [<span id="cartCountUserMobile">0</span>]</span></span></a>
                            <?php
                                }else{
                            ?>
                            <a class="mobileNavItem py-0" href="#" onclick="signupLogin()"><span class="fa fa-user mobileNavItem" type="" title="Login or SignUp" aria-hidden="true"></span></a>
                            <!-- cart -->
                            <a class="py-0 mobileNavItem" href="cart.php"><span class="fa fa-shopping-cart mobileNavItem" title="Cart" aria-hidden="true"><span> [0]</span></span></a>
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
                              <input class="autocomplete form-control py-0 amber-border typeahead tt-query" id="myInput2" type="text" name="product" placeholder="Search Plants, Pots and More..." aria-label="Search" autocomplete="off" spellcheck="false">
                            </form>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
      
      
      <!--Main Body starts-->
      <div class="container-fluid mainBodyContainer topContainer d-none d-md-flex">
      
          <!--   Carousel   -->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="extras/carousel1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="extras/carousel2.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="extras/carousel3.png" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
          
    </div>
      
      
    <!--Mobile Carousel-->
    <div class="container-fluid mainBodyContainer topContainer d-md-none">
      
          <!--   Carousel   -->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="extras/carouselmini1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="extras/carouselmini2.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="extras/carouselmini3.png" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
          
    </div>
    
    <!--  Multi Item Bar  -->
    <div class="container-fluid mainBodyContainer">
        <div class="row multiItemBarTitle">
            <div class="col">
            <div class="mTitle">Best Sellers</div>
            </div>
        </div>
        <div class="row multiItemBarBody">
            <div class="col">
                <div class="responsive">
                  <div class="gallery">
                    <a target="_blank" href="#">
                      <img src="extras/siteData/catagoryIcons/icon1.png" alt="Cinque Terre" width="600" height="400">
                    </a>
                    <div class="desc">Roses</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a target="_blank" href="#">
                      <img src="extras/siteData/catagoryIcons/icon2.png" alt="Forest" width="600" height="400">
                    </a>
                    <div class="desc">All time Oxygen</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a target="_blank" href="img_lights.jpg">
                      <img src="extras/siteData/catagoryIcons/icon3.png" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Indoor Plants</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a target="_blank" href="img_mountains.jpg">
                      <img src="extras/siteData/catagoryIcons/icon4.png" alt="Mountains" width="600" height="400">
                    </a>
                    <div class="desc">Air Purifiers</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a target="_blank" href="img_5terre.jpg">
                      <img src="extras/siteData/catagoryIcons/icon5.png" alt="Cinque Terre" width="600" height="400">
                    </a>
                    <div class="desc">Vines</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a target="_blank" href="img_forest.jpg">
                      <img src="extras/siteData/catagoryIcons/icon6.png" alt="Forest" width="600" height="400">
                    </a>
                    <div class="desc">Fruit Plants</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a target="_blank" href="img_lights.jpg">
                      <img src="extras/siteData/catagoryIcons/icon7.png" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Succelents</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a target="_blank" href="img_mountains.jpg">
                      <img src="extras/siteData/catagoryIcons/icon8.png" alt="Mountains" width="600" height="400">
                    </a>
                    <div class="desc">GoodLuck Plants</div>
                  </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        
    </div>
      
    
    <!--MuskGreen Delivery, Service-->
    <div class="container-fluid mainBodyContainer">
        <div class="row muskGreenServiceBody">
                <div class="responsiveS">
                    <div class="serviceContainer">
                      <img src="extras/siteData/detailIcons/DI1.png" alt="Avatar" class="image" style="background-color: #28634f;">
                        <div class="serviceTitle">WIDE RANGE OF PRODUCTS</div>
                        <div class="serviceDesc">STRAIGHT FROM UTTARAKHAND FOOTHILLS</div>
                    </div>
                </div>
                <div class="responsiveS">
                    <div class="serviceContainer">
                      <img src="extras/siteData/detailIcons/DI2.png" alt="Avatar" class="image" style="background-color: #8E24AA;">
                      <div class="serviceTitle">FREE & FAST DELIVERY</div>
                        <div class="serviceDesc">ON ORDERS ABOVE &#8377; 599</div>
                    </div>
                </div>
                <div class="responsiveS">
                    <div class="serviceContainer">
                      <img src="extras/siteData/detailIcons/DI3.png" alt="Avatar" class="image" style="background-color: #22486c;">
                      <div class="serviceTitle">SERVICE AVAILABLE</div>
                        <div class="serviceDesc">REST ASSURED WITH OUR SERVICE</div>
                    </div>
                </div>
        </div>
      </div>
      
      
    <!--  Featured Products  -->
    <div class="container-fluid mainBodyContainer">
        <div class="row featuredProductsTitle">
            <div class="col text-center">
            <div class="mTitle">Featured Products</div>
            </div>
        </div>
        <div class="row featuredProductsBody">
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="extras/siteData/productImages/image1full.png" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          Product Name
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;120</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;99</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="extras/siteData/productImages/image2full.png" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          Product Name
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;120</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;99</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="extras/siteData/productImages/image3full.png" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          Product Name
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;120</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;99</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="extras/siteData/productImages/image4full.png" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          Product Name
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;120</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;99</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="row featuredProductsBody">
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="extras/siteData/productImages/image5full.png" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          Product Name
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;120</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;99</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="extras/siteData/productImages/image6full.png" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          Product Name
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;120</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;99</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="extras/siteData/productImages/image7full.png" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          Product Name
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;120</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;99</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="extras/siteData/productImages/image8full.png" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          Product Name
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;120</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;99</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/styler.js"></script>
    <script type="text/javascript" src="js/buttonActions.js"></script>

  </body>
</html>