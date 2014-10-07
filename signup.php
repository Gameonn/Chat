<!doctype HTML>
<html>
	<head>
		<title>Sign Up page</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="page resp">
			<div id="SignUpDiv">
				<h2>Sign Up</h2>
				<form method="post" action="InsertUser.php">
					<label>Your Name</label>
					<input type="text" name="UserName" required>
					<label>Your Email</label>
					<input type="mail" name="UserMail" required>
					<label>Password</label>
					<input type="password" name="UserPassword" required>
					<input id="signup" type="submit" value="Sign Up">
				</form>
				<a class="goto" href="index.php" title="Go back to login page">Go back to login page</a>
			</div>
		</div>
	</body>
</html>