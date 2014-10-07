<?php
	session_start();
	include("classes.php");
	$user = new user();
	$user->setUserId($_SESSION['UserId']);
	$user->UserLogOut();
	session_destroy();
	header("Location: index.php");
	exit();
?>