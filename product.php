<?php
	include("inc/config.php");
	include("inc/prod.php");
	session_start();

	if (isset($_GET["id"])) {
		$product_id = intval($_GET['id']);
		$product = get_product_single($product_id);
	}

	if (empty($product)) {
		header("Location: products.php");
		exit();
	}

	if (isset($_POST['add'])) {
		if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		}
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		$usr_id = $_SESSION['user'];
		$qty = $_POST['qty'];
		$size = $_POST['size'];
		$added = false;

		try {
			$row_count = mysqli_query($db, "SELECT product_id FROM users_cart WHERE user_id = $usr_id AND product_id = $product_id AND product_size = '$size';");
			$row_count = $row_count->fetch_row();

			if (isset($row_count[0])) {
				mysqli_query($db, "UPDATE users_cart SET quantity = quantity + $qty WHERE user_id = $usr_id AND product_id = $product_id AND product_size = '$size';");
				$added = true;
			}
			else {
				mysqli_query($db, "INSERT INTO users_cart(user_id, product_id, product_size, quantity) VALUES ($usr_id, $product_id, '$size', $qty);");
				$added = true;
			}
			mysqli_close($db);
		} catch (Exception $e) {
			echo "Data could not be retrieved from the database.";
			mysqli_close($db);
			exit();
		}
	}

?>
<html id="background">
<head>
	<title><?php echo $product['product_name']; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
</head>
    
<body id="bod">
    <?php if (isset($_SESSION['user'])) { ?>
    <div id="welcome">
        
        <p style="font-size:40px; font-family:'Josefin Sans'; color:white; font-weight:ultra-bold;">Welcome <?php echo $_SESSION['username']; ?></p>
    
    </div>
    <?php } ?>
    <img id="bground" src="http://i.imgur.com/nEoRS.gif">
    <div id="container">
    <div id="header">
        <img src="images/NavBar.png">
    </div>
    <div id="title">
        <a href="index.php"><img style="position:relative; left:150px; top:95px" src="images/Urban-Demand.png"></a>
    </div>
    <div id="navagation">
        <img style="position:absolute; top:5px; left:383px" src="images/Ellipse-2.png">
        
        <?php if (isset($_SESSION['username'])) { echo '
        <a href="logout.php?logout">
        <img class="pic" style="position:absolute;top:40px; left:400px" src="images/Logout.png"></a>';}
        else { echo '
        <a href="login.php">
        <img class="pic" style="position:absolute;top:40px; left:400px" src="images/Login.png"></a>';} ?>

        <a href="products.php">
        <img class="pic" style="position:absolute;top:40px; left:498px" src="images/Products.png"></a>
        <a href="cart.php">
        <img class="pic" style="position:absolute;top:40px; left:632px" src="images/Cart.png"></a>
        
    </div>
    
    <div id="prodArea">
        <img style="position:absolute;top:275px; height:500px; width: 724px; left:0px;" src="images/contentProd.png">
        
        <img src="images/Rectangle-1.png" style="position:absolute; top:315px; height:350px;">

        <img src="<?php echo $product['product_img']; ?>" style="position:absolute; top:320px; left: 19px; height: 312px;">
        
        <h1 style="font-size:32; font-family: 'Josefin Sans', sans-serif; font-weight:400 ; color:#484848; position:absolute; top:290px; left: 400px"><?php echo $product['product_name']; ?></h1>
        

        <br>
        
        <p style="font-size:20px; font-family: 'Josefin Sans', sans-serif; font-weight:400; color:#484848; position:absolute; top:335px; left: 345px">
            <?php echo $product['product_desc']; ?>
        </p>

        <h3 style="position: absolute; top: 620px; left: 550px; font-size:32px; font-family: 'Josefin Sans', sans-serif;">$<?php echo $product['product_price']; ?></h3>

        <?php if (isset($_POST['add']) && $added = true) {
		echo "<p id='addCart' style='position: absolute; top: 650px; left:220px; font-size: 20px;'>" . $product["product_name"] . " has been added to your cart</p>";
		} ?>
        
        <form action="" method="post">
			<label style="position: absolute; top: 710px; left:73px; font-size: 20px; font-family: 'Josefin Sans', sans-serif;">Quantity: </label>
			<select id="qty" name="qty" style="position:absolute; top:710px; left: 150px; font-size:20px; border-radius: 5px">
			  	<option value="1">1</option>
			  	<option value="2">2</option>
			  	<option value="3">3</option>
			  	<option value="4">4</option>
			</select>
			<label style="position: absolute; top: 710px; left:320px; font-size: 20px; font-family: 'Josefin Sans', sans-serif;">Size: </label>
			<select id="size" name="size" style="position:absolute; top:710px; left:360px; font-size:20px; border-radius: 5px">
				<?php foreach ($product['sizes'] as $size) { ?>
				<option value="<?php echo $size; ?>"><?php echo $size; ?></option>
				<?php } ?>
			</select>
			<input type="submit" id="submit" name="add" value="Add to cart" style="cursor: pointer; font-family: 'Open Sans Condensed'; font-size:20px; position:absolute; top:708px; left:540px; border-radius: 4px;" />
		</form>
        
    </div>
        
        <div id="footerProd" style="top: 910px">
        <h3 style="font-size:12px; font-family:futura; position:absolute; left:20px; color:white">Copywrite Urban Demand &copy; The Conquistadors</h3>
        <a href="index.php"><img src="images/home.svg" alt="HOME" style="height:30px;position:absolute; top:4px; left: 300px"></a>
        <img src="images/footer.png" style="width:724px;">
        
    </div>
        
    </div>

</body>
    
</html>