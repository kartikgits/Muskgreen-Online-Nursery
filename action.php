<?php 
	require 'config.php';

	if(isset($_POST['action'])){
		$sql="SELECT * FROM products WHERE pcategory != ''";

		if(isset($_POST['pcategory'])){
			$pcategory = implode(",",  $_POST['pcategory']);
			$sql .="AND pcategory IN ('".$pcategory."')";
		}

		$result = $conn->query($sql);
		$output = '';

		if($result->num_rows > 0){
			while ($row=$result->fetch_assoc()) {
				$output .= '<div class="responsive2">
                    <div class="productContainer">
                      <img src="'.$row['pimage'].'" alt="Avatar" class="image">
                      <div class="productPriceDisc">
                          '.$row['pname'].'
                          <p>
                              <span class="originalPrice" title="Original Price"><strike>&#8377;'. number_format($row['pprice']).'</strike></span>
                              <span class="discountPrice" title="Discounted Price">&#8377;'. number_format($row['pprice']).'</span>
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