<?php
	include("inc/config.php");
	include("inc/prod.php");
	session_start();

	if (get_cart_items($_SESSION['user']) == 0 || !isset($_SESSION['cost'])) {
		header("Location: index.php");
	}

	if (isset($_POST['submit'])) {
		unset($_SESSION['cost']);
		$_SESSION['purchase'] = 1;
		remove_all_from_cart($_SESSION['user']);
		header("Location: cart.php");
	}

?>

<html id="background">
<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
    <script src="ajax.js"></script>
    <script src="submitCheck.js"></script>
    <script type="text/javascript" src="fieldCheck.js"></script>
</head>
<body id="bod">
    <div id="welcome">
        
        <p style="font-size:40px; font-family:'Josefin Sans'; color:white; font-weight:ultra-bold;">Welcome <?php if (isset($_SESSION['username'])) { echo $_SESSION['username']; } ?></p>
    
    </div>
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
        
         <div style="text-align: center; width:724px;height:400px;background-color:#E8E8E8   ;position:absolute; top: 424px; box-shadow:  0 5px 8px 0px rgba(0, 0, 0, 0.4), 0 10px 10px 3px rgba(0, 0, 0, 0.19);">
        
        <p></p>
       <span style="font-size:25px; font-family: 'Josefin Sans'; font-weight:500;">The total cost for this order is $<?php echo $_SESSION['cost']; ?></span>
	<div class="container">
        <p id="errorTxt" style="color: red; visibility: hidden; text-align: center; font-family: 'Open Sans Condensed';">i</p>
        <table>
        	<form action="" method="post">
        		<tr><td><label for="fname">First Name: </label></td><td><input type="text" name="fname" id="fname" onblur="fnameCheck()" /></td></tr>
        		<tr><td><label for="lname">Last Name: </label></td><td><input type="text" name="lname" id="lname" onblur="lnameCheck()"/></td></tr>
        	    <tr><td><label for="address">  Address: </label></td><td><input type="text" name="address" id="address" onblur="addressCheck()"/></td></tr>
        		<tr><td><label for="zip">Zip Code: </label></td><td><input type="text" name="zip" id="zip" onblur="zipCheck()" onchange="getCityState(this.value)" /></td></tr>
        		<tr><td><label for="city">City: </label></td><td><input type="text" name="city" id="city" onblur="cityCheck()" /></td></tr>
        		<tr><td><label for="state">State: </label></td><td><input type="text" name="state" id="state" onblur="stateCheck()" /></td></tr>
        		<tr><td><label for="cc">Credit Card: </label></td><td><input type="text" name="cc" id="cc" onblur="ccCheck()" /></td></tr>
        		<tr><td></td><td><input type="submit" name="submit" disabled="disabled" id="submit" style="cursor: pointer; font-family: 'Open Sans Condensed'; font-size:14px; border-radius: 4px; height: 25px; width: 80px;"/></td></tr>
        	</form>
        </table>
	</div>
        
    </div>
        
        <div id="footercart" style="top: 820px;">
        <h3 style="font-size:12px; font-family:futura; position:absolute; left:20px; color:white">Copywrite Urban Demand &copy; The Conquistadors</h3>
        <a href="index.php"><img src="images/home.svg" alt="HOME" style="height:30px;position:absolute; top:4px; left: 300px"></a>
        <img src="images/footer.png" style="width:724px;">
        
    </div>
        
    </div>
    </div>

</body>
    
</html>