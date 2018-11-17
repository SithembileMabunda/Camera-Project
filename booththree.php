<?php
	$user = $_SESSION['username'];
	$db = mysqli_connect('localhost', 'root', 'password', 'camagru');
	$sql = "SELECT * FROM `images` where `user_name` = `$user` ORDER BY `image_id` DESC";
	$result = mysqli_query($db, $sql);
	while ($row = mysqli_fetch_array($result))
	{
		echo "<div align='center'>\n";
		echo "<img src=".$row['image_name']." width=33.3%>\n";
		echo "</div>";
	}
?>