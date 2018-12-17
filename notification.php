<?php
	session_start();
?>
<?php
	$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
	$user = $_SESSION['user'];
	if (isset($_POST['notif']))
	{
		$query = $db->prepare("SELECT `notif` FROM `users` WHERE `user_name` = ?");
		$query->execute([$user]);
		$result = $query->fetch();
		if ($result['notif'] == 0)
		{
			$query = $db->prepare("UPDATE `users` SET `notif` = '1' WHERE `user_name` = ?");
			$query->execute([$user]);
			header("Location: profile.php");
		}
		else
		{
			$query = $db->prepare("UPDATE `users` SET `notif` = '0' WHERE `user_name` = ?");
			$query->execute([$user]);
			header("Location: profile.php");
		}
	}
?>