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
    <link rel="stylesheet" type="text/css" href="css/style.css" media="(min-width: 767.99px)">
    <link rel="stylesheet" type="text/css" href="css/mobileNav.css" media="(max-width: 767.99px)">
    <link rel="stylesheet" type="text/css" href="css/profileStyle.css">
    <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">


    <title>Welcome to MuskGreen - India's Latest Digital Nursery and Organic Products store</title>
  </head>

  <body onload="disablePersonal()">
      
      
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
            <?php
                } else {
            ?>
            <a class="topNavItem nav-item py-0" href="#" onclick="signupLogin()"><span class="fa fa-user topNavItem" title="Login Or Signup" aria-hidden="true"> <span><br/>Login/Signup</span></span></a>
            <?php
                }
            ?>
            <!-- Cart -->
            <a class="topNavItem nav-item py-0" href="#"><span class="fa fa-shopping-cart topNavItem" title="Cart" aria-hidden="true"> <span><br/>Cart[0]</span></span></a>

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
                            <?php
                                }else{
                            ?>
                            <a class="mobileNavItem py-0" href="#" onclick="signupLogin()"><span class="fa fa-user mobileNavItem" type="" title="Login or SignUp" aria-hidden="true"></span></a>
                            <?php
                                }
                            ?>
            
                            <!-- cart -->
                            <span class="fa fa-shopping-cart py-0 mobileNavItem" title="Cart" aria-hidden="true"><span> [0]</span></span>


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

        <!-- User Profile content -->
        <div class="container">
            <div class="row">
                <div class="col-sm-10"><h2>Profile</h2></div>
                <div class="col-sm-2"><a href="#" class="pull-right"><img title="MuskGreen" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
            </div>
            <div class="row">
                <div class="col-sm-3"><!--left col-->
                  <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                  </div></hr><br>

                       
                  <div class="panel panel-default">
                    <div class="panel-heading">User Name</div>
                    <div class="panel-body">+919999999999</div>
                  </div>
                  
                <div class="card leftCard">
                  <ul class="nav nav-tabs card-body" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#account"><i class="fa fa-user fa-1x"></i>Account</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#orders"><i class="fa fa-shopping-bag fa-1x"></i>Orders</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#wishlist"><i class="fa fa-heartbeat fa-1x"></i>Wishlist</a></li>
                  </ul>
                </div>
                  
                </div><!--/col-3-->

                <div class="col-sm-9 tab-content">
                <div role="tabpanel" class="tab-pane in active" id="account">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#personal">Personal</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages">Addresses</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Phone/Email</a></li>
                    </ul>


                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane in active" id="personal">
                        <hr>
                        <button class="btn btn-sm" onclick="editPersonal()" title="Enable/Disable Personal Information Form"><i class="fa fa-pencil"></i> Edit</button>
                          <form class="form" action="##" method="post" id="personalForm">
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="first_name"><h4>First Name</h4></label><span class="inputRequired"></span>
                                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="Please Enter Your First Name" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                    <label for="last_name"><h4>Last Lame</h4></label>
                                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="Enter Your Last Name (If Any)">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                      <label for="email"><h4>Email</h4></label><span class="inputRequired"></span>
                                      <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="Please Enter Your Email" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-xs-6">
                                    <label for="email_verify"><h4>Email Again</h4></label><span class="inputRequired"></span>
                                      <input type="password" class="form-control" name="email_verify" id="email_verify" placeholder="Verify Email" title="Enter Above Email Again" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                   <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-check-circle-o"></i> Save</button>
                                        <button class="btn btn-lg btn-secondary" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                              </div>
                        </form>
                      
                      <hr>
                      
                     </div><!--/tab-pane-->
                     <div role="tabpanel" class="tab-pane fade" id="messages">
                       
                       <h2></h2>
                       
                       <hr>
                          <form class="form" action="##" method="post" id="addressForm">
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="first_name"><h4>First name</h4></label>
                                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                    <label for="last_name"><h4>Last name</h4></label>
                                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                  </div>
                              </div>
                  
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="phone"><h4>Phone</h4></label>
                                      <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                  </div>
                              </div>
                  
                              <div class="form-group">
                                  <div class="col-xs-6">
                                     <label for="mobile"><h4>Mobile</h4></label>
                                      <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="email"><h4>Email</h4></label>
                                      <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="email"><h4>Location</h4></label>
                                      <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="password"><h4>Password</h4></label>
                                      <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                    <label for="password2"><h4>Verify</h4></label>
                                      <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                  </div>
                              </div>
                              <div class="form-group">
                                   <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                              </div>
                        </form>
                       
                     </div><!--/tab-pane-->
                     <div role="tabpanel" class="tab-pane fade" id="settings">
                            
                        
                          <hr>
                          <form class="form" action="##" method="post" id="registrationForm">
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="first_name"><h4>First name</h4></label>
                                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                    <label for="last_name"><h4>Last name</h4></label>
                                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                  </div>
                              </div>
                  
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="phone"><h4>Phone</h4></label>
                                      <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                  </div>
                              </div>
                  
                              <div class="form-group">
                                  <div class="col-xs-6">
                                     <label for="mobile"><h4>Mobile</h4></label>
                                      <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="email"><h4>Email</h4></label>
                                      <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="email"><h4>Location</h4></label>
                                      <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                      <label for="password"><h4>Password</h4></label>
                                      <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                  </div>
                              </div>
                              <div class="form-group">
                                  
                                  <div class="col-xs-6">
                                    <label for="password2"><h4>Verify</h4></label>
                                      <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                  </div>
                              </div>
                              <div class="form-group">
                                   <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                        <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                    </div>
                              </div>
                        </form>
                      </div>
                       
                      </div><!--/tab-pane-->
                  </div><!--/tab-content-->


                  <div role="tabpanel" class="tab-pane fade" id="orders">
                    Orders
                  </div><!--/tab-content-->

                  <div role="tabpanel" class="tab-pane fade" id="wishlist">
                    Wishlist
                  </div><!--/tab-content-->
                </div>

                </div><!--/col-9-->
            </div><!--/row-->

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/styler.js"></script>
    <script type="text/javascript" src="js/liveSearch.js"></script>
    <script type="text/javascript" src="js/buttonActions.js"></script>

  </body>
</html>