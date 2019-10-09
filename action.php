<?php 
	require 'config.php';

	if(isset($_POST['action'])){
		$sql="SELECT * FROM productseller natural join product natural join proundercat WHERE isAvailable != 'N'";

		if(isset($_POST['category'])){
			$category = implode(",",  $_POST['category']);
			$sql .=" AND category IN ('".$category."')";
		}

		$result = $conn->query($sql);
		$output = '';

		if($result->num_rows > 0){
			while ($row=$result->fetch_assoc()) {
				$finalprice = floatval($row['sp']) - (floatval($row['discount'])/100 * floatval($row['cp']));
				$output .= '<div class="responsive2">
                    <div class="productContainer">
                      <img src="'.$row['proimgurl'].'" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          '.$row['proname'].'
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;'. floatval($row['sp']) .'</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;' . $finalprice .'</span>
                          </p>
                            <p><button><a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a> Add to Cart</button></p>
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
?>