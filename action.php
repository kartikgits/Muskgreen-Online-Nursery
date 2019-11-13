<?php 
	require 'config.php';
	session_start();

	if(isset($_POST['action'])){
		$sql="SELECT * FROM productseller natural join product natural join proundercat WHERE isAvailable != 'N'";

		if(isset($_POST['category'])){
			$sql .=" AND category IN ('".$_POST['category'][0]."')";

			$i=1;
			while($i<sizeof($_POST['category'])){
				$sql .= ' AND proid in (select distinct proid from proundercat where category="'.$_POST['category'][$i].'")';
				$i=$i+1;
			}
		} else {
			$sql="SELECT * FROM productseller natural join product WHERE isAvailable != 'N'";
		}

		if (isset($_POST['getResult'])) {
			$safeProduct = preg_replace('/[^\w ]/','',$_POST['getResult']);
			if(strlen($safeProduct) > 0){
				$sql .= " AND proname LIKE '%".$safeProduct."%'";
			}
		}

		$result = $conn->query($sql);
		$output = '';
		
		$logInStatus='false';
		if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']===TRUE) {
			$logInStatus='true';
		}
		
		if($result->num_rows > 0){
			while ($row=$result->fetch_assoc()) {
				$mrp=floatval($row['sp']) + (floatval($row['discount'])/100)*floatval($row['sp']);
				$output .= '<div class="responsive2">
                    <div class="productContainer">
                      <a href="productDetail.php?proid='.$row['proid'].'" target="_blank"><img src="'.$row['proimgurl'].'" class="image"></a>
                      <div class="productPriceDisc">
                          '.$row['proname'].'
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;'. $mrp .'</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;' . $row['sp'] .'</span>
                          </p>
                            <p><button onclick="addToCartProducts(\''.$row['proid'].'\', \''.$logInStatus.'\')" id="addToCartButton'.$row['proid'].'"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button></p>
							
                        </div>
                    </div>
                </div>';
			}
		}
		else {
			$output = "<h3>No Products Found!</h3>";
		}
		echo $output;
	}
	$conn->close();
?>