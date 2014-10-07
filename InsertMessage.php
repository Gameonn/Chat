<?php
	session_start();
	include("classes.php");
	if (isset($_POST['ChatText']) && !empty($_POST['ChatText'])) {
		$chat = new chat();
		$chat->setChatUserId($_SESSION['UserId']);
		$chat->setChatText($_POST['ChatText']);
		$chat->InsertChatMessage();
	}
?>