<?php
	session_start();
	$connected = FALSE;
	if(!isset($_SESSION['UserName'])) {
		header("Location: index.php?error=1");
		exit();
	}
	else
		$connected = TRUE;

?>
<!doctype HTML>
<html>
	<head>
		<title>Welcome to Chat !</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#ChatText").keyup(function(e){
					var ChatText = $("#ChatText").val();
					if(e.keyCode == 13 && ChatText[0] != "\n"){
						$.ajax({
							type:'POST',
							url:"InsertMessage.php",
							data:{ChatText:ChatText},
							success:function(){
								$("#ChatMessages").load("DisplayMessagesOnce.php");
								$("#ChatText").val("");
							}
						});
					}
				
				});

				setInterval(function() {
				$("#ChatMessages").load("DisplayMessages.php");
				}, 1500);

				$("#ChatMessages").load("DisplayMessagesOnce.php");
			});

		</script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<div class="page resp">
		<h2>Welcome <span style="color: green;"><?php echo htmlspecialchars($_SESSION['UserName']); ?></span> !</h2>
		<a id="disconnect" href="logout.php" title="Logout">Logout</a>
		<div id="ChatBig">
			<div id="ChatMessages"></div>
			<textarea id="ChatText" name="ChatText"></textarea>
		</div>
	</div>
	</body>
</html>