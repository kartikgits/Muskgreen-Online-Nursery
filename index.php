<?php
	session_start();

  if (!(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE)) {
      include 'serverPhp/remember.php';
  }

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
    <meta name="description" content="Buy Plants, Flowers and Pots online in Dehradun at Best Rates. We will soon offer Pan India Delivery. Find out more! For bulk order of plants or flowers, mail us at info@muskgreen.live"/>
    <?php
      if (isset($_GET['delivery-location'])) {
    ?>
        <meta name="keywords" content="online nursery, plantation nursery near me, nursery $_GET['delivery-location'], plant nursery in $_GET['delivery-location'], best nursery in $_GET['delivery-location'], buy indoor plants in $_GET['delivery-location'], buying plants in $_GET['delivery-location'], buy plants online $_GET['delivery-location'], buy succulents online, buy flowering plants online, buy aromatic plants online, buy cactus online, buy landscape plants online, buy ornamental plants online, aromatic plants, cactus, ferns, indoor plants, landscape plants, bamboo, medicated plants, money plants, lucky plants, nursery near me, nursery plants near me, buy pots online, raat ki rani, nursery garden, ornamental plants, gifts plants">
    <?php
      }else{
    ?>
        <meta name="keywords" content="online nursery, plantation nursery near me, nursery india, plant nursery in india, best nursery in india, buy indoor plants in india, buying plants in india, buy plants online india, buy succulents online, buy flowering plants online, buy aromatic plants online, buy cactus online, buy landscape plants online, buy ornamental plants online, aromatic plants, cactus, ferns, indoor plants, landscape plants, bamboo, medicated plants, money plants, lucky plants, nursery near me, nursery plants near me, buy pots online, raat ki rani, nursery garden, ornamental plants, gifts plants">
    <?php
      }
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >
    
    <!-- Our CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="(min-width: 768px)">
    <link rel="stylesheet" type="text/css" href="css/mobileNav.css" media="(max-width: 767px)">
    <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css?v=1.1">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/typeahead.bundle.js"></script>
    <script type="text/javascript" src="js/liveSearch.js"></script>


    <title>MuskGreen - Buy Plants, Flowers & Pots Online in Dehradun | Fast and Free Delivery | Best Plant Nursery in Dehradun</title>
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

                            <a class="navbar-brand" href="#"><img src="extras/musklogo112.png" alt=""></a>
                            
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
      
      
      <!--Main Body starts-->
      <div class="container-fluid mainBodyContainer topContainer d-none d-md-flex">
      
          <!--   Carousel   -->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="extras/carousel1.png?v=1.1" alt="First slide" onclick="goto('Indoor Air Purifier')">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="extras/carousel2.png?v=1.1" alt="Second slide" onclick="goto('Succulents')">
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
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="extras/carouselmini1.png?v=1.1" alt="First slide" onclick="goto('Indoor Air Purifier')">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="extras/carouselmini2.png?v=1.2" alt="Second slide" onclick="goto('Succulents')">
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


    <?php
      if (isset($_GET['delivery-location'])) {
    ?>
    <div class="container-fluid mainBodyContainer">
      <div class="row multiItemBarTitle">
        <div class="col">
          <h3 class="mTitle">Buy Plants Online in <?=$_GET['delivery-location']?></h3>
        </div>
      </div>
      <div class="row multiItemBarBody p-3">
        MuskGreen provides wide range of plants and garden accessories in <?=$_GET['delivery-location']?>. Buy wide range of Succulents, Ornamental Plants, Flowers, Aromatic Plants, Medicinal Plants, Cactus, Pots and much more in <?=$_GET['delivery-location']?>.<br>
        <strong>
          *Plant Delivery available to all areas.<br>
          *Buy Plants in <?=$_GET['delivery-location']?> at Best Prices.<br>
          *Guaranteed Fast Delivery.<br>
          *Best Nursery in <?=$_GET['delivery-location']?>.
        </strong>
      </div>
    </div>
    <?php
      }
    ?>
    
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
                    <a href="products.php?product=Rose">
                      <img src="extras/siteData/catagoryIcons/icon1.png" alt="Roses" width="600" height="400">
                    </a>
                    <div class="desc">Roses</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a href="products.php?product=All Time Oxygen">
                      <img src="extras/siteData/catagoryIcons/icon2.png" alt="All Time Oxygen Plants" width="600" height="400">
                    </a>
                    <div class="desc">All time Oxygen</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a href="products.php?product=Indoor">
                      <img src="extras/siteData/catagoryIcons/icon3.png" alt="Indoor Plants" width="600" height="400">
                    </a>
                    <div class="desc">Indoor Plants</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a href="products.php?product=Air Purifiers">
                      <img src="extras/siteData/catagoryIcons/icon4.png" alt="Air Purifier Plants" width="600" height="400">
                    </a>
                    <div class="desc">Air Purifiers</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a href="products.php?product=Vines">
                      <img src="extras/siteData/catagoryIcons/icon5.png" alt="Vines" width="600" height="400">
                    </a>
                    <div class="desc">Vines</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a href="products.php?product=Fruit">
                      <img src="extras/siteData/catagoryIcons/icon6.png" alt="Fruit Plants" width="600" height="400">
                    </a>
                    <div class="desc">Fruit Plants</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a href="products.php?product=Succulents">
                      <img src="extras/siteData/catagoryIcons/icon7.png" alt="Succulents" width="600" height="400">
                    </a>
                    <div class="desc">Succulents</div>
                  </div>
                </div>

                <div class="responsive">
                  <div class="gallery">
                    <a href="products.php?product=Goodluck">
                      <img src="extras/siteData/catagoryIcons/icon8.png" alt="GoodLuck Plants" width="600" height="400">
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
            <div class="mTitle">Exclusive Discounts</div>
            </div>
        </div>
        <div class="row featuredProductsBody">
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/cactus.jpg" alt="Cactus" class="image">
                      <div class="productPriceDisc">
                          Cactus
                          <p>
                              <span class="discountPrice" title="MuskGreen Exclusive Discounts">Upto 80% Off</span>
                          </p>
                            <p><button onclick="goto('Cactus')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/crassula.jpg" alt="Crassulas" class="image">
                      <div class="productPriceDisc">
                          Crassulas
                          <p>
                              <span class="discountPrice" title="MuskGreen Exclusive Discounts">Upto 75% Off</span>
                          </p>
                            <p><button onclick="goto('Crassula')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/desktopPlants.jpg" alt="Desktop Plants" class="image">
                      <div class="productPriceDisc">
                          Desktop Plants
                          <p>
                              <span class="discountPrice" title="MuskGreen Discounts">Upto 70% Off</span>
                          </p>
                            <p><button onclick="goto('Table')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/dogFlower.jpg" alt="Dog Flowers" class="image">
                      <div class="productPriceDisc">
                          Dog Flowers
                          <p>
                              <span class="discountPrice" title="MuskGreen Discounts">Starting &#8377;99 Only</span>
                          </p>
                            <p><button onclick="goto('Dog Flower')">View All</button></p>
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="row featuredProductsBody">
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/echeveria.jpg" alt="Echeverias" class="image">
                      <div class="productPriceDisc">
                          Echeverias
                          <p>
                              <span class="discountPrice" title="MuskGreen Discounts">Upto 80% Off</span>
                          </p>
                            <p><button onclick="goto('Echeveria')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/pine.jpg" alt="Pines" class="image">
                      <div class="productPriceDisc">
                          Pines
                          <p>
                              <span class="discountPrice" title="MuskGreen Discounts">Upto 50% Off</span>
                          </p>
                            <p><button onclick="goto('Pine')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/rose.jpg" alt="Roses" class="image">
                      <div class="productPriceDisc">
                          Roses
                          <p>
                              <span class="discountPrice" title="MuskGreen Discounts">Upto 69% Off</span>
                          </p>
                            <p><button onclick="goto('Rose')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/salvia.jpg" alt="Salvias" class="image">
                      <div class="productPriceDisc">
                          Salvias
                          <p>
                              <span class="discountPrice" title="Discounted Price">Upto 50% Off</span>
                          </p>
                            <p><button onclick="goto('Salvia')">View All</button></p>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <!-- Order By Price -->
    <div class="container-fluid mainBodyContainer">
        <div class="row featuredProductsTitle">
            <div class="col text-center">
            <div class="mTitle">Plants/Pots by Price</div>
            </div>
        </div>
        <div class="row featuredProductsBody">
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/UNDER99.png" alt="Buy Plants/Pots Under Rs. 99" class="image">
                      <div class="productPriceDisc">
                          Plants/Pots Under 99
                          <p><button onclick="gotoPrice('99')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/UNDER199.png" alt="Buy Plants/Pots Under Rs. 199" class="image">
                      <div class="productPriceDisc">
                          Plants/Pots Under 199
                          <p><button onclick="gotoPrice('199')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/UNDER299.png" alt="Buy Plants/Pots Under Rs. 299" class="image">
                      <div class="productPriceDisc">
                          Plants/Pots Under 299
                          <p><button onclick="gotoPrice('299')">View All</button></p>
                        </div>
                    </div>
                </div>
                <div class="responsive2">
                    <div class="productContainer">
                      <img src="data/indexPage/UNDER399.png" alt="Buy Plants/Pots Under Rs. 399" class="image">
                      <div class="productPriceDisc">
                          Plants/Pots Under 399
                          <p><button onclick="gotoPrice('399')">View All</button></p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
      
    
    <!--Footer-->
    <footer class="footer">
        <div class="container bottom_border">
        <div class="row">
          <div class="col-12">
            <h5 class="headin5_amrc col_white_amrc pt2">Buy Plants Online</h5>
            <p class="mb2 footerLinks">
              <span class="col_white_amrc pt2">Plants by Location: </span> <a href="index.php?delivery-location=Dehradun">Dehradun</a>
            </p>
          </div>
        </div>
        <div class="row">
        <div class=" col-sm-4 col-md col-sm-4  col-12 col">
        <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
        <!--headin5_amrc-->
        <p class="mb10"> MuskGreen  is a startup nestled in the Himalayan foothill city - Dehradun. We provide a platform to deliver our customers the large variety of plants and the best of organic products.</p>
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
        <li><a href="#">Home</a></li>
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
      
    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/styler.js"></script>
    <script type="text/javascript" src="js/buttonActions.js"></script>

    <script type="text/javascript">
      function goto(view) {
        window.location.href = "products.php?product="+view;
      }

      function gotoPrice(price){
        window.location.href = "products.php?productUnder="+price;
      }
    </script>

  </body>
</html>