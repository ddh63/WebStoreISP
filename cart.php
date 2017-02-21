<?php
    include("inc/config.php");
    include("inc/prod.php");
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    if (isset($_GET['remove'])) {
        remove_from_cart($_SESSION['user'], $_GET['remove']);
    }

    $_SESSION['cost'] = "0.00";
    $products = get_cart_items($_SESSION['user']);

?>

<html id="background">
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="cartSizing.js"></script>
    <style>
        #checkComp {
    font-family: 'Open Sans Condensed';
    width: 724px;
    text-align: center;
}
    </style>
</head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
    
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
        else{ echo '
        <a href="login.php">
        <img class="pic" style="position:absolute;top:40px; left:400px" src="images/Login.png"></a>';} ?>
        
        <a href="products.php">
        <img class="pic" style="position:absolute;top:40px; left:498px" src="images/Products.png"></a>
        <a href="cart.php">
        <img class="pic" style="position:absolute;top:40px; left:632px" src="images/Cart.png"></a>
        
    </div>
    
    <div id="cartArea">
        
        
         <div id="innerCart" style="width:724px;height:300px; background-color:#E8E8E8; position: absolute; top: 424px; box-shadow: 0 5px 8px 0px rgba(0, 0, 0, 0.4), 0 10px 10px 3px rgba(0, 0, 0, 0.19);">
        
       <?php if ($products != 0) { ?>
		<form id="cartForm" action="">
		<table border="1" style="border-collapse: collapse; font-family: 'Open Sans Condensed';">
			<tr>
				<th>Product Name</th>
				<th>Size</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Remove Item</th>
			</tr>
			<?php foreach ($products as $product) {
				include("inc/list-cart-item.html.php");
			}
			?>
		</table>
		<span style="margin-left: 5px; font-size:17px; font-family: 'Open Sans Condensed';">Total cost: $<?php echo $_SESSION['cost']; ?></span><br />
		<input id="submit" type="button" value="Checkout" style="cursor: pointer; font-family: 'Open Sans Condensed'; font-size:17px; border-radius: 4px; font-weight: bold; margin-top:5px; margin-left: 5px;" onclick="location.href='checkout.php'"  />
		</form>
	    <?php } elseif (isset($_SESSION['purchase'])) { echo "<p id='checkComp'>Checkout Complete</p>"; unset($_SESSION['purchase']); } 
        else { echo "<p id='emptyCart'>There are no items in your cart.</p>"; } ?>
        
    </div>
        
        <div id="footercart" style="<?php if ($products == 0) echo 'top: 474px'; ?>">
        <h3 style="font-size:12px; font-family:futura; position:absolute; left:20px; color:white">Copywrite Urban Demand &copy; The Conquistadors</h3>
        <a href="index.php"><img src="images/home.svg" alt="HOME" style="height:30px;position:absolute; top:4px; left: 300px"></a>
        <img src="images/footer.png" style="width:724px;">
        
    </div>
        
    </div>
    </div>

</body>
    
</html>