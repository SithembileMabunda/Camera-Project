<?php
	session_start();
?>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form action="sessionone.php" method="post">
			<input type="text" name="user">
			<input type="submit" name="submit">
		</form>
		<?php
			$user = $_POST['user'];
			$_SESSION['user'] = $user;
		?>
	</body>
</html>