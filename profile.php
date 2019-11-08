<?php
    require 'config.php';
    session_start();
    if (!isset($_SESSION['isLoggedIn']) && !$_SESSION['isLoggedIn']===TRUE) {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header('Location: index.php');
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
    <link rel="stylesheet" type="text/css" href="css/profileStyle.css">
    <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
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

        <!-- User Profile content -->
        <div class="container userProfileContainer">
            <div class="row">
                <div class="col-sm-12 py-4"><h3>Profile</h3></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                      <div class="avatar"><i class="fa fa-user-circle-o fa-5x" aria-hidden="true" style="color: #607447 !important;"></i></div>
                    </div><hr>

                    <div class="panel panel-default">
                      <div class="panel-heading"><?=$_SESSION['userFName']?> <?=$_SESSION['userLName']?></div>
                      <div class="panel-body"><?=$_SESSION['userPrimeNumber']?></div>
                    </div>
                    
                  <div class="card text-center leftCard">
                      <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#account"><i class="fa fa-user fa-1x"></i>Account</a></li>
                          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#orders"><i class="fa fa-shopping-bag fa-1x"></i>Orders</a></li>
                          <li class="nav-item"><a class="nav-link" href="signOut.php"><i class="fa fa-sign-out fa-1x"></i>Logout</a></li>
                        </ul>
                      </div>
                  </div>
                </div><!--/col-3-->

                <div class="col-sm-9 tab-content">
                <div role="tabpanel" class="tab-pane in active" id="account">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#personal">Personal</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addresses">Addresses</a></li>
                    </ul>


                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane in active" id="personal">
                        <hr>
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
                                        <button class="btn btn-lg btn-success" type="submit" id="submitPersonal"><i class="fa fa-check-circle-o"></i> Save</button>
                                        <button class="btn btn-lg btn-secondary" type="reset" id="resetPersonal"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                              </div>
                        </form>
                      
                      <hr>
                      
                     </div><!--/tab-pane-->
                     <div role="tabpanel" class="tab-pane fade" id="addresses">
                     <hr>
                       <h5 class="">Saved Addresses: </h5>
                       <?php
                            $sql="SELECT * FROM user NATURAL JOIN useraddress where user.uid = '".$_SESSION['userId']."'";
                            $result=$conn->query($sql);
                            $addressFlag = 0;
                            while ($row=$result->fetch_assoc()) {
                                $addressFlag = $addressFlag + 1;
                        ?>
                       <div class="card-deck" id="toEditAddress">
                          <div class="card" style="min-width: 10rem;">
                            <div class="card-body">
                              <h5 class="card-title"><?=$row['addressName']?> <small class="text-center"><a href="#" onclick="editAddress('<?=$row['addressName']?>', '<?=$row['locality']?>', '<?php if(is_null($row['landmark'])){echo "";}else {echo $row['landmark'];}?>','<?=$row['area']?>', '<?=$row['city']?>', '<?=$row['state']?>', '<?=$row['pincode']?>', '<?=$row['phone']?>')" data-toggle="modal" data-target="#editAddressModal">Edit</a> <a href="#" onclick="deleteAddress('<?=$row['addressName']?>')" data-toggle="modal" data-target="#deleteAddressModal">Delete</a></small></h5>
                              <p class="card-text"><small class="text-muted">
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
                              <p class="card-text"><small class="text-muted"><?=$row['phone']?></small></p>
                            </div>
                          </div>
                        </div>
                       <?php 
                            }
                            if ($addressFlag===0) {
                                echo "You do not have any saved addresses. Please add an Address.";
                            }
                            if ($addressFlag < 5) {
                                echo "<button class=\"btn btn-sm\" title=\"Click To Add New Address\" id=\"newAddressFormButton\"><i class=\"fa fa-map-marker\"></i> Add Address</button>";
                            }
                       ?>
                          <br>
                          <form class="form muskForm" action="" method="post" id="newAddressForm" >
                            <input type="hidden" name="newAddressForm" value="true"/>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="address_name"><h6>Address Name</h6></label><span class="inputRequired"></span>
                                      <input type="text" class="form-control" name="address_name" id="address_name" placeholder="Eg. Home, Office etc." title="Please Enter A Unique Address Name" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="address_contact"><h6>Contact Number</h6></label>
                                      <input type="text" class="form-control" name="address_contact" id="address_contact" placeholder="Enter Address Phone/Mobile Number" title="Enter Contact (Leave Blank To Use Your Number)">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="address_locality"><h6>Locality</h6></label><span class="inputRequired"></span>
                                      <input type="text" class="form-control" name="address_locality" id="address_locality" placeholder="Eg. Colony/Village name" title="Please Enter Your Locality" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="address_area"><h6>Area</h6></label><span class="inputRequired"></span>
                                      <input type="text" class="form-control" name="address_area" id="address_area" placeholder="Eg. Street name" title="Please Enter Your Area" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="address_landmark"><h6>Landmark</h6></label>
                                      <input type="text" class="form-control" name="address_landmark" id="address_landmark" placeholder="Eg. Famous Monument/School/Park name etc." title="Please Enter Any Nearby Landmark">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="address_city"><h6>City</h6></label><span class="inputRequired"></span>
                                      <input type="text" class="form-control" name="address_city" id="address_city" placeholder="Dehradun" title="Please Enter Your City Name" disabled>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="address_pincode"><h6>PinCode</h6></label><span class="inputRequired"></span>
                                      <input type="text" class="form-control" name="address_pincode" id="address_pincode" placeholder="PinCode/ZipCode Number" title="Please Enter Your PinCode Number" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="address_state"><h6>State</h6></label><span class="inputRequired"></span>
                                      <input type="text" class="form-control" name="address_state" id="address_state" placeholder="Uttarakhand" title="Please Enter Your State Name" disabled>
                                  </div>
                              </div>
                              <div class="form-group">
                                   <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit" id="submitNewAddress"><i class="fa fa-check-circle-o"></i> Save</button>
                                        <button class="btn btn-lg btn-secondary" type="reset" id="resetNewAddress"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                              </div>
                        </form>
                       
                     </div><!--/tab-pane-->
                       
                    </div><!--/tab-pane-->
                  </div><!--/tab-content-->


                  <div role="tabpanel" class="tab-pane fade" id="orders">
                    <div class="panel panel-default panel-order">
                      <div class="panel-heading">
                          <strong>My Orders</strong>
                      </div>
                      <?php
                            $sql="SELECT proimgurl, orderstatus, proname, oid, concat(oid, '', proid) as refid, quantity, totalPrice, DATE(orderdate) as odate from productorder natural join productsinorder natural join product where oid in (select oid from productorder where uid = '".$_SESSION['userId']."')";
                            $orderCount = 0;
                            if ($result=$conn->query($sql)===TRUE){
                              while ($row=$result->fetch_assoc()) {
                                $orderCount = $orderCount + 1;
                                $orderStatus = "";
                                if ($row['orderstatus']=="Processing") {
                                  $orderStatus=$orderStatus."<span class=\"p-1 mb-1 bg-warning text-dark\">Processing</span>";
                                } else if ($row['orderstatus']=="Shipped"){
                                  $orderStatus=$orderStatus."<span class=\"p-1 mb-1 bg-info text-white\">Shipped</span>";
                                } else if ($row['orderstatus']=="Delivered"){
                                  $orderStatus=$orderStatus."<span class=\"p-1 mb-1 bg-success text-white\">Delivered</span>";
                                } else if ($row['orderstatus']=="Cancelled") {
                                  $orderStatus=$orderStatus."<span class=\"p-1 mb-1 bg-light text-dark\">Cancelled</span>";
                                } else if ($row['orderstatus']=="Rejected") {
                                  $orderStatus=$orderStatus."<span class=\"p-1 mb-1 bg-danger text-white\">Rejected</span>";
                                }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-2"><img src="<?=$row['proimgurl']?>" class="media-object img-thumbnail"></div>
                              <div class="col-md-10">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="pull-right"><?php echo $orderStatus; ?></div>
                                    <span><strong><?=$row['proname']?></strong></span><br>
                                    Quantity : <?=$row['quantity']?> at <i class="fa fa-inr" aria-hidden="true"></i><?=$row['totalPrice']?> <br>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-md-4">
                                        Date: <?=$row['odate']?>
                                      </div>
                                      <div class="col-md-4">
                                        OrderID: <?=$row['oid']?>
                                      </div>
                                      <div class="col-md-4">
                                        Ref.ID: <?=$row['refid']?>
                                      </div>
                                    </div> 
                                  </div>
                                </div>
                              </div>
                            </div>

                        <?php
                            }
                          }
                            if ($orderCount < 1) {
                        ?>
                              <div class="panel-footer">Nothing here... Order something <span style="color: #607447;">Green</span></div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                  </div><!--/tab-content-->
                </div><!--/col-9-->
            </div>
        </div><!--/row-->

      <?php
        $conn->close();
      ?>

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
                    <div class="modal-body" id="editAddressBox">
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                  </div>
                </div>
              </div>

              <!-- The DeleteAddress Modal -->
                <div class="modal fade" id="deleteAddressModal" tabindex="-1" role="dialog" aria-labelledby="deleteAddressTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteAddressTitle">Delete Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="deleteAddressModalBody">
                        Are you sure that you want delete this address?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="deleteAddressConfirm">Delete</button>
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
    <script type="text/javascript" src="js/styler.js"></script>
    <script type="text/javascript" src="js/buttonActions.js"></script>

  </body>
</html>