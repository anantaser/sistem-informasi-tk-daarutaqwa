<?php 
require 'functions.php'

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Testing Page</title>
</head>
<body>
	 <form METHOD=POST ACTION="awardedit.php\">
		<input TYPE="hidden" NAME="pagestep" value="1">
		<select name="username">
		<option value="" . $username . "">" . $username;
		</select>
	</form>

</body>
</html>