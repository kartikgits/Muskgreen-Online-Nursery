<?php
	session_start();

    header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    require 'config.php';

    if (!isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']===TRUE) {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header('Location: index.php');
    } else{
    	if ($_SESSION['cartCount']<1) {
    		header('Location: index.php');
    	}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout - MuskGreen | India's Latest Digital Nursery and Organic Products store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >

    <!-- MuskGreen CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="(min-width: 768px)">
    <link rel="stylesheet" type="text/css" href="css/mobileNav.css" media="(max-width: 767px)">
    <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
		* {
		  box-sizing: border-box;
		}

		body {
		  background-color: #f1f1f1;
		}

		.regForm {
		  background-color: #ffffff;
		  /*margin: 100px auto;*/
		  /*padding: 40px;*/
		  /*width: 70%;*/
		  /*min-width: 300px;*/
		  margin-top: 2rem;
		  margin-bottom: 2rem;
		  min-height: 90vh;
		  padding: 2rem;
		  -webkit-box-shadow: 1px 1px 7px 0px rgba(40,99,79,1);
		  -moz-box-shadow: 1px 1px 7px 0px rgba(40,99,79,1);
		  box-shadow: 1px 1px 7px 0px rgba(40,99,79,1);
		}

		@media screen and (max-width: 768px) {
			.regForm {
				margin-top: 8rem;
				margin-bottom: 1rem;
			}
		}

		h1 {
		  text-align: center;  
		}

		input {
		  padding: 10px;
		  width: 100%;
		  font-size: 17px;
		  border: 1px solid #aaaaaa;
		}

		/* Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
		}

		form.muskForm input { background-color: #fff; }

		.inputRequired:after { content:' *'; color: #e32;}

		/* Hide all steps by default: */
		.tab {
		  display: none;
		}

		button {
		  background-color: #4CAF50;
		  color: #ffffff;
		  border: none;
		  padding: 10px 20px;
		  font-size: 17px;
		  cursor: pointer;
		}

		button:hover {
		  opacity: 0.8;
		}

		#prevBtn {
		  background-color: #bbbbbb;
		}

		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none;  
		  border-radius: 50%;
		  display: inline-block;
		  opacity: 0.5;
		}

		.step.active {
		  opacity: 1;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #4CAF50;
		}

		/*Address & Payment select styles*/
		.addressLabel {
			cursor: pointer;
			border: 0px;
			background-color: rgba(34, 72, 108, 0.8) !important;
			border-radius: 16px !important;
		}

		.addressLabel:hover {
			-webkit-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			-moz-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
		}

		.addressLabelSelected {
			-webkit-box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
			-moz-box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
			box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
		}

		.paymentLabel {
			cursor: pointer;
			color: #fff !important;
			background-color: rgba(34, 72, 108, 0.8) !important;
			border-radius: 16px !important;
		}

		.paymentLabel:hover {
			-webkit-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			-moz-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
		}

		.paymentLabelSelected {
			-webkit-box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
			-moz-box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
			box-shadow: 0px 0px 10px 2px rgba(40,99,79,1) !important;
		}

		.reviewOrder {
			background: rgba(34, 72, 108, 0.8);
          	-webkit-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			-moz-box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			box-shadow: 0px 0px 18px -9px rgba(40,99,79,1);
			color: #fff !important;
		}

		.nextButton {
			box-shadow: 0px 0px 0px 0px rgba(96,116,71,0);
			animation: nextButton 1s infinite;
		}

		@-webkit-keyframes nextButton {
		  0% {
		    -webkit-box-shadow: 0px 0px 0px 0px rgba(96,116,71,0.6);
		  }
		  70% {
		      -webkit-box-shadow: 0px -10px 26px 21px rgba(96,116,71,0);
		  }
		  100% {
		      -webkit-box-shadow: 0px 0px 0px 0px rgba(96,116,71,0);
		  }
		}

		@keyframes nextButton {
		  0% {
		    -moz-box-shadow: 0px 0px 0px 0px rgba(96,116,71,0.6);
			box-shadow: 0px 0px 0px 0px rgba(96,116,71,0.6);
		  }
		  70% {
		      -moz-box-shadow: 0px -10px 26px 21px rgba(96,116,71,0);
			box-shadow: 0px -10px 26px 21px rgba(96,116,71,0);
		  }
		  100% {
		      -moz-box-shadow: 0px 0px 0px 0px rgba(96,116,71,0);
			box-shadow: 0px 0px 0px 0px rgba(96,116,71,0);
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

	<!-- Main body -->
	<div class="container regForm">
		<div class="row">
			<div class="col-sm-12">
				<h3 style="display: inline-block;">MuskGreen Checkout</h3><h4 style="display: inline-block; float: right;"><button type="button" class="btn btn-success" id="buttonShow"><i class="fa fa-caret-down" aria-hidden="true"></i></button></h4>
				<!-- Circles which indicates the steps of the form: -->
				<div style="text-align:center; margin-top:10px;">
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
				</div>
				<br/>
				<!-- One "tab" for each step in the form: -->
				<div class="tab"><h5 style="display: inline-block;">Profile Information:</h5>
					<button class="btn btn-sm" onclick="editPersonal()" title="Enable/Disable Personal Information Form"><i class="fa fa-pencil"></i> Edit</button>
				  <form class="form muskForm" action="" method="post" id="personalForm">
				      <input type="hidden" name="personalForm" value="true"/>
				      <div class="form-group">
				          <div class="col-xs-6">
				              <label for="first_name"><h6>First Name</h6></label><span class="inputRequired"></span>
				              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" value="<?=$_SESSION['userFName']?>" title="Please Enter Your First Name" required>
				          </div>
				      </div>
				      <div class="form-group">
				          <div class="col-xs-6">
				            <label for="last_name"><h6>Last Lame</h6></label>
				              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" value="<?=$_SESSION['userLName']?>" title="Enter Your Last Name (If Any)">
				          </div>
				      </div>
				      <div class="form-group">
				          <div class="col-xs-6">
				              <label for="email"><h6>Email</h6></label><span class="inputRequired"></span>
				              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?=$_SESSION['userEmail']?>" title="Please Enter Your Email" required>
				          </div>
				      </div>
				      <div class="form-group">
				           <div class="col-xs-12">
				                <br>
				                <button class="btn btn-lg btn-success" type="button" id="submitPersonal"><i class="fa fa-check-circle-o"></i> Save</button>
				                <button class="btn btn-lg btn-secondary" type="reset" id="resetPersonal"><i class="fa fa-repeat"></i> Reset</button>
				            </div>
				      </div>
					</form>
				</div>

				<div class="tab"><h5>Select An Address:</h5>
				  <div class="card-deck" id="toEditAddress">
				  <?php
				  	$sqlAddressCount="SELECT * FROM useraddress WHERE uid = '".$_SESSION['userId']."'";
				    $resultAddressCount=$conn->query($sqlAddressCount);
				    $addressCount=0;
				    while($row=$resultAddressCount->fetch_assoc()){
				    	$addressCount=$addressCount+1;
				        	//show select address and add address
				  ?>
				          <label class="card text-white bg-primary addressLabel" id="addressSelectId<?=$addressCount?>" style="min-width: 16rem; max-width: 16rem; margin-top: 1.7rem;">
				            <div class="card-body">
				              <h5 class="card-title" style="color: #fff;"><?=$row['addressName']?> <small class="text-center"><a href="#" onclick="editUserAddress('<?=$row['addressName']?>', '<?=$row['locality']?>', '<?php if(is_null($row['landmark'])){echo "";}else {echo $row['landmark'];}?>','<?=$row['area']?>', '<?=$row['city']?>', '<?=$row['state']?>', '<?=$row['pincode']?>', '<?=$row['phone']?>')" data-toggle="modal" data-target="#editAddressModal" style="color: #fff;">Edit</a></small><input type="radio" value="<?=$row['addressName']?>_<?=$addressCount?>" name="addressSelect" style="width: 10px; visibility: hidden;"></h5>
				              <p class="card-text"><small class="text-white">
				                <?=$row['locality']?>,
				                <?php
				                    if(is_null($row['landmark'])){
				                        echo " ";
				                    } else {
				                        echo " Near ".$row['landmark'].",";
				                    }
				                ?>
				                <?=$row['area']?>, 
				                <?=$row['city']?>, 
				                <?=$row['state']?> - <?=$row['pincode']?>
				                </small></p>
				              <p class="card-text"><small class="text-white"><?=$row['phone']?></small></p>
				            </div>
				          </label>
				  <?php
				        }
				  ?>
				  		</div>
				  <?php
				  	if ($addressCount===0) {
				  		echo "You do not have any saved addresses. Please add an Address.";
				  	}
				    if ($addressCount<5) {
				  ?>
				  		<br/>
				  		<div class="text-center"><h4>OR</h4></div>
				  		<h5>Add An Address:
				  			<button type="button" class="btn btn-sm" title="Click To Add New Address" id="newAddressFormButton" data-toggle="modal" data-target="#addAddressModal" onclick="addUserAddress()"><i class="fa fa-map-marker"></i> Add Address</button>
				  		</h5>
				  <?php
				    }
				    echo "<div id=\"addressCountDiv\" style=\"display:none;\">".$addressCount."</div>";
				  ?>
				</div>
				<?php
				?>
				<div class="tab"><h5>Select Payment Method:</h5>
				<label class="card text-white mb-4 paymentLabel" id="paymentMethodOnlineId" style="min-width: 10rem; max-width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #fff !important;">Pay Online<input type="radio" name="paymentSelect" value="onlinePay" style="width: 10px; visibility:hidden;"></h5>
				    <p class="card-text" style="color: #fff !important">with VISA, MasterCard, Rupay, Paytm and other methods</p>
				  </div>
				</label>
				<label class="card text-white mb-4 paymentLabel" id="paymentMethodCodId" style="min-width: 10rem; max-width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title" style="color: #fff !important">Pay at Delivery<input type="radio" name="paymentSelect" id="paymentMethodId" value="codPay" style="width: 10px; visibility:hidden;"></h5>
				    <p class="card-text" style="color: #fff !important;">with Paytm or Cash</p>
				  </div>
				</label>
				</div>

				<div class="tab"><h5>Review Order:</h5>
					<div class="card mb-3 reviewOrder" style="max-width: 540px;">
				  <div class="row no-gutters">
				    <div class="col-md-4 text-center">
				      <img src="https://via.placeholder.com/150x240" class="card-img" alt="" style="max-width: 300px; max-height: 300px;">
				    </div>
				    <div class="col-md-8">
				      <div class="card-body">
				        <h5 class="card-title text-white" id="totalOrderCharges"></h5>
				        <p class="card-text">
				        	<div class="text-white" id="orderSubtotal"></div>
				        	<div class="text-white" id="orderDeliveryCharges"></div>
				        </p>
				        <p class="card-text"><small class="text-muted" style="color: #fff !important">Your payments are completely secured with MuskGreen. In case of an order failure, we'll fully refund your amount.</small></p>
				      </div>
				    </div>
				  </div>
				</div>
				</div>

				<div style="overflow:auto;">
				<div style="float:right;">
				  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
				  <button class="nextButton" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
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



	<!-- The AddAddress Modal -->
      <div class="modal fade" id="addAddressModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Address</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" id="addAddressBox">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>

	<!-- The EditAddress Modal -->
	  <div class="modal fade" id="editAddressModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Edit Address</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body" id="editUserAddressBox">
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        </div>
	        
	      </div>
	    </div>
	  </div>

	  <!-- Redirection Form - op -->
	  <form method="post" name="payOnlineForm" action="onlinePayment.php">
	  	<input type="hidden" name="order_confirmation" value="true">
	  	<input type="hidden" name="payment_method" value="onlinePay">
	  	<input type="hidden" name="delivery_address" value="" id="user_delivery_address">
	  </form>

	<script type="text/javascript" src="js/styler.js"></script>
	<script type="text/javascript" src="js/liveSearch.js"></script>
	<script type="text/javascript" src="js/checkOut.js"></script>
	<script type="text/javascript" src="js/buttonActions.js"></script>

</body>
</html>