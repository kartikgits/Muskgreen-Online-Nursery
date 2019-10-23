<?php
	session_start();
	require 'config.php';

	if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
		if (isset($_POST['newAddressForm']) && $_POST['newAddressForm']=="true") {
			$safeAddressName = preg_replace('/[^\w,. ]/','',$_POST['address_name']);
			if (isset($_POST['address_contact']) && $_POST['address_contact']!="") {
				$safeContact = preg_replace('/[^\w]/','',$_POST['address_contact']);
			}else{
				$safeContact = $_SESSION['userPrimeNumber'];
			}
			$safeLocality = preg_replace('/[^\w,. ]/','',$_POST['address_locality']);
			$safeArea = preg_replace('/[^\w,. ]/','',$_POST['address_area']);
			if (isset($_POST['address_landmark']) && $_POST['address_landmark']!="") {
				$safeLandmark = preg_replace('/[^\w,. ]/','',$_POST['address_landmark']);
			}
			$safePincode = preg_replace('/[^\w]/','',$_POST['address_pincode']);

			if (isset($_POST['address_landmark']) && $_POST['address_landmark']!="") {
				$insertAddressQuery = "insert into useraddress (uid, addressName, locality, pincode, area, landmark, phone) values ('".$_SESSION['userId']."','".$safeAddressName."','".$safeLocality."','".$safePincode."','".$safeArea."','".$safeLandmark."','".$safeContact."')";
			}else{
				$insertAddressQuery = "insert into useraddress (uid, addressName, locality, pincode, area, phone) values ('".$_SESSION['userId']."','".$safeAddressName."','".$safeLocality."','".$safePincode."','".$safeArea."','".$safeContact."')";
			}

			if ($conn->query($insertAddressQuery) === TRUE) {
			} else {
			}
		}
		else if (isset($_POST['editAddressForm']) && $_POST['editAddressForm']=="true") {
			$safeAddressName = preg_replace('/[^\w ]/','',$_POST['edit_address_name']);
			if (isset($_POST['edit_address_contact']) && $_POST['edit_address_contact']!="") {
				$safeContact = preg_replace('/[^\w]/','',$_POST['edit_address_contact']);
			}else{
				$safeContact = $_SESSION['userPrimeNumber'];
			}
			$safeLocality = preg_replace('/[^\w, ]/','',$_POST['edit_address_locality']);
			$safeArea = preg_replace('/[^\w, ]/','',$_POST['edit_address_area']);
			if (isset($_POST['edit_address_landmark']) && $_POST['edit_address_landmark']!="") {
				$safeLandmark = preg_replace('/[^\w, ]/','',$_POST['edit_address_landmark']);
			}
			$safePincode = preg_replace('/[^\w]/','',$_POST['edit_address_pincode']);

			if (isset($_POST['edit_address_landmark']) && $_POST['edit_address_landmark']!="") {
				$updateAddressQuery = "update useraddress set locality='".$safeLocality."', pincode='".$safePincode."', area='".$safeArea."', landmark='".$safeLandmark."', phone='".$safeContact."' where uid='".$_SESSION['userId']."' and addressName='".$safeAddressName."'";
			}else{
				$updateAddressQuery = "update useraddress set locality='".$safeLocality."', pincode='".$safePincode."', area='".$safeArea."', phone='".$safeContact."' where uid='".$_SESSION['userId']."' and addressName='".$safeAddressName."'";
			}

			if ($conn->query($updateAddressQuery) === TRUE) {
			} else {
			}
		}
		else if (isset($_POST['delete_address']) && $_POST['delete_address']=="true") {
			$safeAddressName = preg_replace('/[^\w ]/','',$_POST['address_name']);
			$deleteAddressQuery = "delete from useraddress where uid='".$_SESSION['userId']."' and addressName='".$safeAddressName."'";
			if ($conn->query($deleteAddressQuery) === TRUE) {
			} else {
			}
		}
		else if (isset($_POST['personalForm']) && $_POST['personalForm']=="true") {
			$safeFName = preg_replace('/[^\w ]/','',$_POST['first_name']);
			if (isset($_POST['last_name']) && $_POST['last_name']!="") {
				$safeLName = preg_replace('/[^\w ]/','',$_POST['last_name']);
			}else{
				$safeLName = "";
			}

			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$updateUserQuery = "update user set fname='".$safeFName."', lname='".$safeLName."', email='".$_POST['email']."' where uid='".$_SESSION['userId']."'";

				if ($conn->query($updateUserQuery) === TRUE) {
					$_SESSION['userFName']=$safeFName;
					$_SESSION['userLName']=$safeLName;
					$_SESSION['userEmail']=$_POST['email'];
				} else {
				}
			}else{
				//invalid email format
			}
		}

		//ProductDetail page
		else if(isset($_POST['add_to_cart']) && $_POST['add_to_cart']=="true"){
			$safeProductId = preg_replace('/[^\w]/','',$_POST['product_id']);
			$addToCartQuery = "insert into usercart (proid, uid) values ('".$safeProductId."', '".$_SESSION['userId']."')";
			if ($conn->query($addToCartQuery) === TRUE) {
			} else {
			}
		}

		else if(isset($_POST['delete_from_cart']) && $_POST['delete_from_cart']=="true"){
			$safeProductId = preg_replace('/[^\w]/','',$_POST['product_id']);
			$deleteFromCartQuery = "delete from usercart where uid = '".$_SESSION['userId']."' and proid = '".$safeProductId."'";
			if ($conn->query($deleteFromCartQuery) === TRUE) {
			} else {
			}
		}

		//Cart page
		else if (isset($_POST['get_cart_subtotal']) && $_POST['get_cart_subtotal']=="true") {
			$getCartSubtotalQuery ="select usercart.proid, (sp-((discount/100)*cp))*quantity as subprice from usercart natural join product natural join productseller where usercart.uid='".$_SESSION['userId']."' group by proid";
			$result=$conn->query($getCartSubtotalQuery);
			$subTotal=0.0;
			while ($row=$result->fetch_assoc()) {
				$subTotal = $subTotal + floatval($row['subprice']);
			}
			$subTotal = number_format((float)$subTotal, 2, '.', '');
			echo $subTotal;
		}

		else if (isset($_POST['quantity_change']) && $_POST['quantity_change']=="true") {
			$safeProductId = preg_replace('/[^\w]/','',$_POST['product_id']);
			$safeQuantity = intval($_POST['selected_quantity']);
			$changeQuantityQuery="update usercart set quantity=".$safeQuantity." where uid = '".$_SESSION['userId']."' and proid = '".$safeProductId."'";
			if ($conn->query($changeQuantityQuery) === TRUE) {
			} else {
			}
		}

		else if (isset($_POST['delete_cart_product']) && $_POST['delete_cart_product']=="true") {
			$safeProductId = preg_replace('/[^\w]/','',$_POST['product_id']);
			$changeQuantityQuery="delete from usercart where uid = '".$_SESSION['userId']."' and proid = '".$safeProductId."'";
			if ($conn->query($changeQuantityQuery) === TRUE) {
			} else {
			}
			$updateFromCartQuery = "select count(proid) from usercart where uid = '".$_SESSION['userId']."'";
			$result=$conn->query($updateFromCartQuery);
			$row=$result->fetch_assoc();
			$_SESSION['cartCount']=$row['count(proid)'];
		}

		else if (isset($_POST['cookie_to_cart']) && $_POST['cookie_to_cart']=="true") {
			$productArray = json_decode($_POST['productsInCart']);

			$sqlInsertProducts = "insert into usercart (proid, uid) values ";
			$i=0;
			foreach ($productArray as $productId) {
				$productId = $conn->real_escape_string($productId);
				if ($i==0) {
					$sqlInsertProducts=$sqlInsertProducts."('".$productId."','".$_SESSION['userId']."')";
				}else{
					$sqlInsertProducts=$sqlInsertProducts.",('".$productId."','".$_SESSION['userId']."')";
				}
				$i=$i+1;
			}

			if ($conn->query($sqlInsertProducts) === TRUE) {
			} else {
			}

			$updateFromCartQuery = "select count(proid) from usercart where uid = '".$_SESSION['userId']."'";
			$result=$conn->query($updateFromCartQuery);
			$row=$result->fetch_assoc();
			$_SESSION['cartCount']=$row['count(proid)'];
		}
	}


	// If the user isn't logged in but needs data from DB
	if (isset($_POST['cookie_get_cart']) && $_POST['cookie_get_cart']=="true") {
		$productArray = json_decode($_POST['productsGetCart']);
		$productIds="";
		$i=0;
		foreach ($productArray as $productId) {
			$productId = $conn->real_escape_string($productId);
			if ($i==0) {
				$productIds=$productIds."'".$productId."'";
			}else{
				$productIds=$productIds.",'".$productId."'";
			}
			$i=$i+1;
		}
		$sqlGetProducts = "SELECT * FROM product NATURAL JOIN productseller WHERE product.proid in (".$productIds.") ORDER BY proname";

		$result=$conn->query($sqlGetProducts);
        $itemsCount=0;
        $output='';
        while ($row=$result->fetch_assoc()) {
            $itemsCount=$itemsCount+1;
            $muskPrice = floatval($row['sp']) - ((floatval($row['discount'])/100) * floatval($row['cp']));

            $output = $output.'<tr>
                      <th scope="row" class="border-0">
                        <div class="p-2">
                          <img src="'.$row['proimgurl'].'" alt="" width="70" class="img-fluid rounded shadow-sm"><br/>
                          <div class="ml-3 d-inline-block align-middle">
                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">'.$row['proname'].'</a></h5>
                          </div>
                        </div>
                      </th>
                      <td class="border-0 align-middle"><strong>&#8377;'.$muskPrice.'</strong></td>
                      <td class="border-0 align-middle">
                        <strong>
                        <form style="display: inline-block; max-width: 100px;">
                            1
                        </form>
                        </strong>
                        </td>
                      <td class="border-0 align-middle"><a href="#" onclick="deleteNotUserProduct(\''.$row['proid'].'\')" class="text-dark"><i class="fa fa-trash" style="color: #4d4d4d;"></i></a></td>
                    </tr>';
        }
        if ($itemsCount === 0) {
			$output="
				<div class=\"d-flex justify-content-center\">
				<i class=\"fa fa-leaf fa-2x\" aria-hidden=\"true\" style=\"color: #4d4d4d;\"></i><br/>
				<h5>Oops.. Nothing Green Here</h5>
				</div>";
		}
		echo $output;
	}

	$conn->close();
?>