<?php
	include("classes.php");
	$user = new user();

	if (isset($_POST['UserName']) && isset($_POST['UserMail']) && isset($_POST['UserPassword'])) {
		$user->setUserName($_POST['UserName']);
		$user->setUserMail($_POST['UserMail']);
		$user->setUserPassword(md5($_POST['UserPassword']."PrivateKey06370azerYEAH"));
		$user->InsertUser();
		header("Location: index.php?success=1");
		exit();
	}
?>