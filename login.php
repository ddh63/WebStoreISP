<?php
	include("inc/config.php");
	session_start();

	if (isset($_SESSION['user']) != "") {
		header("location: index.php");
	}
	if (isset($_POST['submit'])) {

        if ($_POST['username'] == "" || $_POST['password'] == "") {
            $error = "Please fill in both username and password.";
        }

        if (!isset($error)) {
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$user = mysqli_real_escape_string($db, $_POST['username']);
		$pass = mysqli_real_escape_string($db, $_POST['password']);
		try {
			$res = mysqli_query($db, "SELECT * FROM users WHERE username = '$user'");
			$row = mysqli_fetch_array($res);

			if ($row['password'] == $pass) {
				$_SESSION['user'] = $row['user_id'];
				mysqli_close($db);
				header("location: welcome.php");
			}
			else {
				$error = "The username or password you entered was invalid.";
				mysqli_close($db);
			}
		} catch (Exception $e) {
			echo "Data could not be retrieved from the database.";
			mysqli_close($db);
		}
	}
}

?>

<html id="background">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
</head>
    
    <body id="bod">
    
        <div id="rectangles">
        
                <div style="width:720px;height:400px;background-color:#989898  ;position:absolute; z-index: 1; box-shadow:  0 5px 8px 0px rgba(0, 0, 0, 0.4), 0 10px 10px 3px rgba(0, 0, 0, 0.19);">
                    <div style="width:350px;height:110px;background-color:#C8C8C8   ;position:absolute; z-index: 0; box-shadow:  0 5px 8px 0px rgba(0, 0, 0, 0.4), 0 10px 10px 3px rgba(0, 0, 0, 0.19);">
                        
                        <div style="width:60px;height:60px;background-color:#C8C8C8; z-index: 0; box-shadow:  5px 5px 8px 0px rgba(0, 0, 0, 0.4), 5px 10px 10px 0px rgba(0, 0, 0, 0.19);position:relative; top:-30px; left:15px ">
                            
                            <p style="font-size:50px; font-family: 'Open Sans Condensed', sans-serif; font-weight:ultra-bold;"><a href="index.php" style="text-decoration: none; color:white;">UD</a></p>
                            
                        </div>
                        <p style="font-size:80px; font-family: 'Open Sans Condensed', sans-serif; font-weight:ultra-bold; position: absolute; left:89px; top:-85px; color:#080808  ;">LOGIN</p>
                        
                        
                    </div>

                    <?php if (isset($error)) echo "<p id='wrongUser' style='position: absolute; top: 130px; left: 20px'>" . $error . "</p>"; ?>
                    
                    <div style="position:absolute; top:190px; left:20px;">

                    <form action="" method="post">
                        <label for="userLog" style="font-family: 'Open Sans Condensed';">Username: </label><input type="text" name="username" id="userLog" /><br /><br />
                        <label for="passLog" style="font-family: 'Open Sans Condensed';">Password: </label><input type="password" name="password" id="passLog" /><br /><br />
                        <input type="submit" id="submit" name="submit" value="Submit" style="cursor: pointer; font-family: 'Open Sans Condensed'; margin-top:10px; width: 65px; height: 25px; box-shadow:  5px 5px 8px 0px rgba(0, 0, 0, 0.4), 5px 10px 10px 0px rgba(0, 0, 0, 0.19); border-radius: 5px" /><br />
                    </form>
                    </div>
                    
                    <a href="register.php"><p id="register" style="font-size:15px; font-family: 'Josefin', sans-serif; font-weight:100; color:white; position:absolute; top:360px; left:10px;">New to Urban Demand? Register Today!</p></a>
                    
                </div>
            
                <div style="width:350px;height:500px;background-color:#F0F0F0  ; z-index:1;position: absolute; top: -50px; left:350px; box-shadow:  0 5px 8px 0px rgba(0, 0, 0, 0.4), 0 10px 10px 3px rgba(0, 0, 0, 0.19);">
                    
                    <img src="images/new.gif" style="width:350px;height:500px">
            
            
                </div>
        
        </div>
    
        <div id="footer">
        <h3 style="font-size:12px; font-family:futura; position:absolute; left:20px; color:white">Copywrite Urban Demand &copy; The Conquistadors</h3>
        <a href="index.php"><img src="images/home.svg" alt="HOME" style="height:30px;position:absolute; top:4px; left: 300px"></a>
        <img  src="images/footer.png" style="width:724px;">
        
    </div>
    </body>

</html>