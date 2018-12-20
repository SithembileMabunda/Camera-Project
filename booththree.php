<?php
	session_start();
?>
<?php
	$user = $_SESSION['user'];
	$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
	$query = $db->prepare("SELECT * FROM `images` where `user_name` = '$user' ORDER BY 'creation_date' DESC");
	$sql = "SELECT * FROM `images` where `user_name` = '$user' ORDER BY 'creation_date' DESC";
	$query->execute();
	while ($row = $query->fetch())
	{
		$delId = "myBtn".$id;
		echo "<div align='center'>\n";
		echo "<img src=".$row['image_name']." width=33.3%>\n";
		echo  "<br>";
		echo "<input class='button button1' type='button' name='delete' value='Delete!' id='".$DelId."' onclick=deletePic(".$row['image_id'].")>";
		echo "</div>";
	}
	//header("Location: profile.php");
?>
