<?php
	include("inc/config.php");
	include("inc/prod.php");
	session_start();

	if (empty($_GET["pg"])) {
		$current_page = 1;
	}
	else {
		$current_page = $_GET["pg"];
	}

	$current_page = intval($current_page);

	$total_products = get_products_count();
	$products_per_page = 6;
	$total_pages = ceil($total_products / $products_per_page);

	if ($current_page > $total_pages) {
		header("Location: products.php?pg=" . $total_pages);
	}

	if ($current_page < 1) {
		header("Location: products.php");
	}

	$start = (($current_page - 1) * $products_per_page) + 1;
	$end = $current_page * $products_per_page;
	if ($end > $total_products) {
		$end = $total_products;
	}

	$productsOnPage = $end - $start;

	$products = get_products_subset($start, $end);
?>
<html id="background">
<head>
<title>Products <?php if ($current_page > 1) echo " - Page " . $current_page; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>    
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
        <img style="position:absolute;top:275px; left:0px; width: 724px; <?php if ($productsOnPage <= 2) echo 'height: 390px;'; else echo 'height: 640px;'; ?>" src="images/contentProd.png">
        <img style="position:absolute;top:341px; left:0px" src="images/Rectangle-2.png">
        <h1 style="position:absolute; top:255px; left:250px; font-family: 'Josefin Sans', sans-serif; font-weight:400 ; color:#484848; font-size:50px">PRODUCTS</h1>
        
        <marquee behavior="scroll" direction="right" style="position:absolute; top:346px;font-family: futura; font-size:20px; opacity:.5">Free Shipping on Orders over $75</marquee>
        

        <?php if ($productsOnPage >= 0) { ?>
        	<img src="images/Rectangle-1.png" style="position:absolute; top:395px; left:47px;">
        		<a href="<?php echo 'product.php?id=' . $products[0]['product_id']; ?>">
                	<img src="<?php echo $products[0]['product_img']; ?>" style="position:absolute; top:398px; left:56px;height:160px;width:160px;">
           		</a>
        <?php } ?>
        
        <?php if ($productsOnPage >= 1) { ?>
	        <img src="images/Rectangle-1.png" style="position:absolute; top:395px; left:275px;">
	        	<a href="<?php echo 'product.php?id=' . $products[1]['product_id']; ?>">
	                <img src="<?php echo $products[1]['product_img']; ?>" style="position:absolute; top:398px; left:284px;height:160px;width:160px;">
	            </a>
        <?php } ?>
        
        <?php if ($productsOnPage >= 2) { ?>
	        <img src="images/Rectangle-1.png" style="position:absolute; top:395px; left:500px;">
	        	<a href="<?php echo 'product.php?id=' . $products[2]['product_id']; ?>">
	                <img src="<?php echo $products[2]['product_img']; ?>" style="position:absolute; top:398px; left:509px; heigth:160px; width:160px;">
	            </a>
        <?php } ?>

        <?php if ($productsOnPage >= 3) { ?>
	        <img src="images/Rectangle-1.png" style="position:absolute; top:635px; left:47px;">
	        	<a href="<?php echo 'product.php?id=' . $products[3]['product_id']; ?>">
	                <img src="<?php echo $products[3]['product_img']; ?>" style="position:absolute; top:638px; left:56px; height:160;width:160px;">
	           	</a>
        <?php } ?>

        <?php if ($productsOnPage >= 4) { ?>
	        <img src="images/Rectangle-1.png" style="position:absolute; top:635px; left:275px;">
	        	<a href="<?php echo 'product.php?id=' . $products[4]['product_id']; ?>">
	                <img src="<?php echo $products[4]['product_img']; ?>" style="position:absolute; top:638px; left:284px;height:160px;width:160px;">
	            </a>
        <?php } ?>

        <?php if ($productsOnPage >= 5) { ?>
	        <img src="images/Rectangle-1.png" style="position:absolute; top:635px; left:500px;">
	        	<a href="<?php echo 'product.php?id=' . $products[5]['product_id']; ?>">
	                <img src="<?php echo $products[5]['product_img']; ?>" style="position:absolute; top:638px; left:509px; height:160px;width:160px;">
	            </a>
        <?php } ?>

        <?php include("inc/pagenumbers.html.php"); ?>
        
    </div>
        
        <div id="footerProd" style="<?php if ($productsOnPage <= 2) echo 'top: 810px' ; else echo 'top: 1050px;' ?>">
        <h3 style="font-size:12px; font-family:futura; position:absolute; left:20px; color:white">Copywrite Urban Demand &copy; The Conquistadors</h3>
        <a href="index.php"><img src="images/home.svg" alt="HOME" style="height:30px;position:absolute; top:4px; left: 300px"></a>
        <img src="images/footer.png" style="width:724px;">
        
    </div>
        
    </div>

</body>
    
</html>