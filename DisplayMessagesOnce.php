<?php
	include("classes.php");
	$chat = new chat();
	$chat->DisplayMessages();
?>
<script type="text/javascript">$('#ChatMessages').scrollTop($('#ChatMessages')[0].scrollHeight);</script>