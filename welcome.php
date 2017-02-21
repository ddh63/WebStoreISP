<?php
	session_start();
	include("inc/config.php");

	if (!isset($_SESSION['user'])) {
		header("Location: login.php");
	}

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$res = mysqli_query($db, "SELECT * FROM users WHERE user_id = " . $_SESSION['user']);
	$userRow = mysqli_fetch_array($res);
	$_SESSION['username'] = $userRow['username'];
	mysqli_close($db);
	header("Location: index.php");
?>