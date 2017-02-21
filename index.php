<?php
	session_start();

	if (isset($_SESSION['wrongPass'])) {
		unset($_SESSION['wrongPass']);
	}
	if (isset($_SESSION['regErr'])) {
		unset($_SESSION['regErr']);
	}
?>
<html id="background">
<head>
    <title>Urban Demand</title>
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
    <div id="container">
    <div id="content">
        <img style="width:724px; left:-1px; height:450px;" src="images/content.png">
        
        <h1 style="font-size:48; font-family: 'Josefin Sans', sans-serif; font-weight:400 ; color:#484848; position:absolute; top:-5px; left: 325px">About Us</h1>
        

        <br>
        
        <p style="font-size:20px; font-family: 'Josefin Sans', sans-serif; font-weight:400; color:#484848; position:absolute; top:65px; left: 325px">
            We are Urban Demand. A small clothing<br>
            exchange directed towards urban trends. We specialize in delivering high demand <br> 
            styles at a fraction of the price compaired to<br> 
            more reconizable resellers. We market designs <br> of individual fashion designers. We believe that<br> the best pieces come from the small guys and <br>not large corporations. Therefore we keep the <br>door open for new pieces and designs; and <br> welcome applications to market your products<br> through our site.<br> Thank you for choosing Urban Demand.<br> Your city. Your style. Your life.
        </p>
        
    </div>
    <div id="info">
        <img src="images/WhatsNew.png">
        <img style="position:absolute; top:15px; left:5px" src="images/nyc.jpg">
        
    </div>
    
    <div id="footer">
        <h3 style="font-size:12px; font-family:futura; position:absolute; left:20px; color:white">Copywrite Urban Demand &copy; The Conquistadors</h3>
        <a href="index.php"><img src="images/home.svg" alt="HOME" style="height:30px;position:absolute; top:4px; left: 300px"></a>
        <img  src="images/footer.png" style="width:724px;">
        
    </div>
    </div>

</body>
</html>