<!DOCTYPE html>
<html>
<head>
	<title>Error | MuskGreen - Buy Plants, Vegetables and Fruits online in Dehradun</title>
	<meta name="robots" content="noindex">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" >
	<link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/errorStyle.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>Oops!</h1>

                <div class="card text-center" style="">
                  <img src="extras/errorDesert.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text lead">
                        <?php
                            if (isset($_GET['errorMessage'])) {
                                echo $_GET['errorMessage'];
                            } else{
                                echo "Something went wrong or you landed up at wrong page.";
                            }
                        ?>
                    </p>
                  </div>
                </div>

                <div class="error-details">
                    <small>MuskGreen | Buy Plants, Vegetables, Fruits online</small>
                </div>
                <div class="error-actions">
                    <a href="index.php" class="btn btn-success btn-lg"><span class="fa fa-home"></span>
                        Make It Green </a><a href="index.php" class="btn btn-default btn-lg"><span class="fa fa-pencil"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>