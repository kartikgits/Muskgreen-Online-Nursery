<?php
    require 'config.php';
    session_start();
    ob_start();  //to set cookies after sending output
    if (!isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']===TRUE && !isset($_GET['oid'])) {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header('Location: index.php');
    } 
    else{
      if (!isset($_SESSION['orderConfirmed']) || $_SESSION['orderConfirmed']===FALSE) {
        //SEND ERROR
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        $error="Location: error.php";
        header($error);
      }
	  
    }
	if(isset($_SESSION['onlinePay']) && $_SESSION['onlinePay']===TRUE){
		if(!isset($_SESSION['onlinePayStatus']) || $_SESSION['onlinePayStatus']!=TRUE){
			$error="Location: error.php?errorMessage="."There was an error processing transaction. If the transaction was successful, we will process your order soon.";
			header($error);
		}
		$_SESSION['onlinePay']=FALSE;
		$_SESSION['onlinePayStatus']=FALSE;
	}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Confirmed | MuskGreen</title>
  <meta name="robots" content="noindex">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
  <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >

  <link rel="stylesheet" type="text/css" href="css/style.css" media="(min-width: 768px)">
  <link rel="stylesheet" type="text/css" href="css/mobileNav.css" media="(max-width: 767px)">
  <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
  <link rel="stylesheet" type="text/css" href="css/orderConfirmationStyle.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/typeahead.bundle.js"></script>
  <script type="text/javascript" src="js/liveSearch.js"></script>

</head>
<body onload="notifyUserMail('<?=$_GET['oid']?>')">

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


<!-- Main Content -->

<div class="container mainBodyContainer">
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

  <p class="lead"><strong class="text-white">Please check your email for confirmation.</strong></p>
  <p class="lead text-white">Your green order will be shipped soon.</p>
  
  <hr>

  <h5>Order Details</h5>
  <div class="card">
  <div class="card-body">
      <p class="text-left font-weight-light" style="color: #4d4d4d;">Order Id: <?=$_GET['oid']?></p>
  <?php
    if (isset($_GET['txnid'])) {
  ?>
      <p class="text-left font-weight-light text-truncate" style="color: #4d4d4d;">Txn ID: <?=$_GET['txnid']?></p>
      <p class="text-left font-weight-light" style="color: #4d4d4d;">Payment: Prepaid</p>
  <?php
    }else {
  ?>
      <p class="text-left font-weight-light" style="color: #4d4d4d;">Payment: Cash on Delivery</p>
  <?php 
    }
  ?>
  </div>
  </div>

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
                    
                    $prdArray=array();
                    $sno=0;
                    while ($row=$result->fetch_assoc()) {
                      $sno+=1;
                      $prd = array($sno, $row['proname'], $row['quantity'], $row['totalPrice']);
                      array_push($prdArray, $prd);
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
                  <td class="border-0 align-middle"><strong><?=$row['orderstatus']?><i class="fa fa-spinner fa-spin fa-fw"></i></strong></td>
                </tr>
                <?php
                        }
                    setcookie('productsBuyList', json_encode($prdArray), time()+120);
                ?> 
            </tbody>
       </table>
      <!-- End -->
    </div>
      </div>


  <hr>
  <p class="text-white">
    Having trouble? <a href="" style="text-decoration: underline; color: #fff;">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>
</div>

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

<script type="text/javascript" src="js/styler.js"></script>
<script type="text/javascript" src="js/orderConfirmation.js"></script>
<script type="text/javascript" src="js/buttonActions.js"></script>

<?php
  ob_end_flush();
?>

</body>
</html>