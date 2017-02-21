<?php
	include("inc/config.php");
	session_start();

	if (isset($_SESSION['user']) != "") {
		header("Location: index.php");
	}

	if (isset($_POST['submit'])) {

		if ($_POST['password'] != $_POST['passwordCheck']) {
			unset($_SESSION['regErr']);
			$_SESSION['wrongPass'] = true;
			header("Location: register.php");
			break;
		}

		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$user = mysqli_real_escape_string($db, $_POST['username']);
		$pass = mysqli_real_escape_string($db, $_POST['password']);

		try { 
			$testQuery = "SELECT username FROM users WHERE username = '$user'";
			$result = mysqli_query($db, $testQuery);
			$_SESSION['count'] = mysqli_num_rows($result);
			if ($_SESSION['count'] != 0) {
	    		mysqli_close($db);
	    		$_SESSION['regErr'] = "Username taken. Please select a different username.";
	    		if (isset($_SESSION['wrongPass'])) {
	    			unset($_SESSION['wrongPass']);
	    		}

	    		header("Location: register.php");
			}

			$sql = "INSERT INTO users(`username`, `password`) VALUES('$user', '$pass')";
			
			if (mysqli_query($db, $sql)) {
				$res = mysqli_query($db, "SELECT * FROM users WHERE username = '$user'");
				$row = mysqli_fetch_array($res);

				if ($row['password'] == $pass) {
					$_SESSION['user'] = $row['user_id'];
					if (isset($_SESSION['regErr'])) { unset($_SESSION['regErr']); }
					mysqli_close($db);
					header("location: welcome.php");
				}
			}
			else {
				$error = "There was an error registering you. Please try again.";
				mysqli_close($db);
			}
		} catch (Exception $e) {
			echo "Data could not be retrieved from the database.";
			mysqli_close($db);
			exit();
		}
	}
?>

<!doctype HTML>
<html id="background">
<head>
	<title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
    <script src="passwordCheck.js"></script>
</head>
    
    <body id="bod">
    
        <div id="rectangles">
        
                <div style="width:720px;height:400px;background-color:#989898  ;position:absolute; z-index: 1; box-shadow:  0 5px 8px 0px rgba(0, 0, 0, 0.4), 0 10px 10px 3px rgba(0, 0, 0, 0.19);">
                    <div style="width:350px;height:110px;background-color:#C8C8C8   ;position:absolute; z-index: 0; box-shadow:  0 5px 8px 0px rgba(0, 0, 0, 0.4), 0 10px 10px 3px rgba(0, 0, 0, 0.19);">
                        
                        <div style="width:60px;height:60px;background-color:#C8C8C8; z-index: 0; box-shadow:  5px 5px 8px 0px rgba(0, 0, 0, 0.4), 5px 10px 10px 0px rgba(0, 0, 0, 0.19);position:relative; top:-30px; left:15px ">
                            
                            <p style="font-size:50px; font-family: 'Open Sans Condensed', sans-serif; font-weight:ultra-bold;"><a href="index.php" style="text-decoration: none; color:white;">UD</a></p>
                            
                        </div>
                        <p style="font-size:70px; font-family: 'Open Sans Condensed', sans-serif; font-weight:ultra-bold; position: absolute; left:89px; top:-65px; color:#080808  ;">REGISTER</p>
                        
                        
                    </div>
                    
                    <?php if (isset($error)) echo $error . "<br />"; ?>
                    <?php if (isset($_SESSION['regErr'])) echo "<p id='sameUser' style='position: absolute; top: 115px; left: 20px'>" . $_SESSION['regErr'] . "</p>"; ?>
                    <?php if (isset($_SESSION['wrongPass'])) echo "<p id='wrongPass' style='position: absolute; top: 115px; left: 20px'>Passwords did not match. Try again.</p>"; ?>

                    <div style="position:absolute; top:160px; left:20px; align-items: center;">
                    <form action="" method="post">
                        <label for="userReg" style="font-family: 'Open Sans Condensed';">Username: </label><input type="text" name="username" id="userReg" required /><br /><br />
                        <label for="passReg" style="font-family: 'Open Sans Condensed';">Password: </label><input type="password" name="password" id="passReg" required /><br /><br />
                        <label for="passCheckReg" style="font-family: 'Open Sans Condensed';">Reenter Password: </label><input type="password" name="passwordCheck" id="passCheckReg" onblur="passwordEqual()" required /><br /><br />   
                        <input type="submit" id="submit" name="submit" value="Submit" style="cursor: pointer; font-family: 'Open Sans Condensed'; margin-top:10px; width: 65px; height: 25px; box-shadow:  5px 5px 8px 0px rgba(0, 0, 0, 0.4), 5px 10px 10px 0px rgba(0, 0, 0, 0.19); border-radius: 5px" /><br />
                    </form>
                    </div>
                    
                    <a href="login.php"><p id="register" style="font-size:15px; font-family: 'Josefin', sans-serif; font-weight:100; color:white; position:absolute; top:360px; left:10px">Already have an account? Login!</p></a>
                    
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