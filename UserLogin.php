<?php
	session_start();
	include("classes.php");
	if (isset($_POST['UserMailLogin']) && isset($_POST['UserPasswordLogin'])) {
		$user = new user();
		$user->setUserMail($_POST['UserMailLogin']);
		$user->setUserPassword(md5($_POST['UserPasswordLogin']."PrivateKey06370azerYEAH"));
		if ($user->UserLogin() == TRUE) {
			$_SESSION['UserId'] = $user->getUserId();
			$_SESSION['UserName'] = $user->getUserName();
			$_SESSION['UserMail'] = $user->getUserMail();
		}
	}
?>