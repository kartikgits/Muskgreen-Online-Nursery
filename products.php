<?php
	require 'config.php';
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >

    <link rel="stylesheet" type="text/css" href="css/style.css" media="(min-width: 768px)">
    <link rel="stylesheet" type="text/css" href="css/mobileNav.css" media="(max-width: 767px)">
    <link rel="stylesheet" type="text/css" href="css/liveSearchStyle.css">
    <link rel="stylesheet" type="text/css" href="css/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

                            <a class="navbar-brand" href="index.php" target="_blank"><img src="extras/musklogo112.png" alt=""></a>
                            
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
	if(!isset($_GET['product'])){
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 d-none d-md-block">
			<!-- Filter -->
			<h5>Filter Product</h5>
			<hr>
			<h6 class="text-info">Select Category</h6>
			<ul class="list-group">
				<?php
					$sql="SELECT category FROM categorydesc ORDER BY category";
					$result=$conn->query($sql);
					while ($row=$result->fetch_assoc()) {
				?>
				<li class="list-group-item">
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input product_check" value="<?= $row['category']; ?>" id="category"><?= $row['category']; ?>
						</label>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>


		<div class="col-md-9 mainBodyContainer">
	        <div class="row featuredProductsTitle">
	            <div class="col text-center">
	            <div class="mTitle" id="textChange">All Products</div>
	            </div>
	        </div>

	        <div class="text-center" id="loader" style="">
					<span class="spinner-grow text-muted"></span>
					<span class="spinner-grow text-primary"></span>
					<span class="spinner-grow text-success"></span>
					<span class="spinner-grow text-info"></span>
					<span class="spinner-grow text-success"></span>
					<span class="spinner-grow text-primary"></span>
					<span class="spinner-grow text-muted"></span>
			</div>

	        <div class="row featuredProductsBody" id="result">
				<?php
					$sql="SELECT * FROM product NATURAL JOIN productseller";
					$result=$conn->query($sql);
					while ($row=$result->fetch_assoc()) {
                        $mrp=floatval($row['sp']) + (floatval($row['discount'])/100)*floatval($row['sp']);
				?>
				<div class="responsive2">
                    <div class="productContainer">
                      <a href="productDetail.php?proid=<?=$row['proid']?>" target="_blank"><img src="<?= $row['proimgurl']; ?>" class="image"></a>
                      <div class="productPriceDisc">
                          <?= $row['proname']; ?>
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;<?=$mrp?></strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;<?=$row['sp']?></span>
                          </p>
                            <p><button onclick="addToCartProducts('<?=$row['proid']?>', '<?=$logInStatus?>')" id="addToCartButton<?=$row['proid']?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button></p>
                        </div>
                    </div>
                </div>
			<?php } ?>
			</div>
    	</div>
	</div>
</div>

<div class="modal fade" id="filterProductsModal" tabindex="-1" role="dialog" aria-labelledby="filterProducts" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Filter -->
                <h5>Filter Products</h5>
                <hr>
                <h6 class="text-info">Select Category</h6>
                <ul class="list-group">
                    <?php
                        $sql="SELECT category FROM categorydesc ORDER BY category";
                        $result=$conn->query($sql);
                        while ($row=$result->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input product_check" value="<?= $row['category']; ?>" id="category"><?= $row['category']; ?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
	}
?>

<?php 
	if(isset($_GET['product'])){
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 d-none d-md-block">
			<!-- Filter -->
			<h5>Filter Product</h5>
			<hr>
			<h6 class="text-info">Select Category</h6>
			<ul class="list-group">
				<?php
					$safeProduct = preg_replace('/[^\w ]/','',$_GET['product']); 
					if(strlen($safeProduct) > 0){
						$sql="SELECT DISTINCT category FROM proundercat NATURAL JOIN product WHERE proname LIKE '%".$safeProduct."%' ORDER BY category";
						$result=$conn->query($sql);
						while ($row=$result->fetch_assoc()) {
				?>
				<li class="list-group-item">
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input product_check" value="<?= $row['category']; ?>" id="category"><?= $row['category']; ?>
						</label>
					</div>
				</li>
				<?php }
                    } else {
                        $error='Did you alter URL?';
                        echo " <script> location.replace(\"error.php?errorMessage=".$error."\");</script>";
                    }
                ?>
			</ul>
		</div>


		<div class="col-md-9 mainBodyContainer">
	        <div class="row featuredProductsTitle">
	            <div class="col text-center">
	            <div class="mTitle" id="textChange">Search Results for <?=$_GET['product']?></div>
	            </div>
	        </div>

	        <div class="text-center" id="loader" style="">
					<span class="spinner-grow text-muted"></span>
					<span class="spinner-grow text-primary"></span>
					<span class="spinner-grow text-success"></span>
					<span class="spinner-grow text-info"></span>
					<span class="spinner-grow text-success"></span>
					<span class="spinner-grow text-primary"></span>
					<span class="spinner-grow text-muted"></span>
			</div>

	        <div class="row featuredProductsBody" id="result">
				<?php
					$safeProduct = preg_replace('/[^\w ]/','',$_GET['product']); 
					if(strlen($safeProduct)){
						$sql="SELECT DISTINCT(product.proid), proname, proimgurl, sp, cp, discount, isAvailable FROM productseller NATURAL JOIN product NATURAL JOIN proundercat WHERE proname LIKE '%".$safeProduct."%' OR category LIKE '%".$safeProduct."%' ORDER BY proname";
						$result=$conn->query($sql);
						while ($row=$result->fetch_assoc()) {
                            $mrp=floatval($row['sp']) + (floatval($row['discount'])/100)*floatval($row['sp']);
				?>
				<div class="responsive2">
                    <div class="productContainer">
                      <a href="productDetail.php?proid=<?=$row['proid']?>" target="_blank"><img src="<?= $row['proimgurl']; ?>" class="image"></a>
                      <div class="productPriceDisc">
                          <?= $row['proname']; ?>
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;<?=$mrp?></strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;<?=$row['sp']?></span>
                          </p>
                            <p><button onclick="addToCartProducts('<?=$row['proid']?>', '<?=$logInStatus?>')" id="addToCartButton<?=$row['proid']?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button></p>
                        </div>
                    </div>
                </div>
			<?php }} ?>
			</div>
    	</div>
	</div>
</div>

<div class="modal fade" id="filterProductsModal" tabindex="-1" role="dialog" aria-labelledby="filterProducts" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Filter -->
                <h5>Filter Products</h5>
                <hr>
                <h6 class="text-info">Select Category</h6>
                <ul class="list-group">
                    <?php
                        $sql="SELECT category FROM categorydesc ORDER BY category";
                        $result=$conn->query($sql);
                        while ($row=$result->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input product_check" value="<?= $row['category']; ?>" id="category"><?= $row['category']; ?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	}
?>

<?php 
    $conn->close();
?>

<!-- Button trigger modal -->
<div class="d-md-none fixed-bottom filterProductGroup">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filterProductsModal">
      Filter Products
    </button>
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
        <div class="d-md-none">
            <br>
        </div>
        </div>

    </footer>

<!--  Main Body Ends  -->

    <script type="text/javascript" src="js/styler.js"></script>
    <script type="text/javascript" src="js/buttonActions.js"></script>

	<script type="text/javascript">

		function getQueryStringValue (key) {
			return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));  
		}

		$(document).ready(function(){

			$(".product_check").click(function(){
				$("#loader").show();

				var action = 'data';
				var category = get_filter_text('category');

				$.ajax({
					url:'action.php',
					method: 'POST',
					data:{action:action, category:category, getResult:getQueryStringValue("product")},
					success:function(response){
						$("#result").html(response);
						$("#loader").hide();
						$("#textChange").text("Filtered Products");
					}
				});
			});

			function get_filter_text(text_id){
				var filterData = [];
				$('#'+text_id+':checked').each(function(){
					filterData.push($(this).val());
				});
				return filterData;
			}

		});
	</script>

</body>
</html>