<?php 
	session_start();
	session_destroy();
?>
<!doctype HTML>
<html>
	<head>
		<title>Welcome to my Chat App</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<div class="page resp">
		<div id="LoginDiv">
			<h2>Login</h2>
			<?php
				if (isset($_GET['success'])) { ?>
					<p class="success">You are now registered.</p>
				<?php 
				}
				if(isset($_GET['error'])) { ?>
					<p class="error">Wrong email or password.</p>
				<?php
				}
			?>
			<form method="post" action="UserLogin.php">
				<label>Email</label>
				<input type="mail" name="UserMailLogin" required>
				<label>Password</label>
				<input type="password" name="UserPasswordLogin" required>
				<input id="login" type="submit" value="Login">
			</form>
			<p class="goto">Not registered yet ? Please <a href="signup.php" title="Sign Up">sign up</a></p>
		</div>
	</div>
	</body>
</html>