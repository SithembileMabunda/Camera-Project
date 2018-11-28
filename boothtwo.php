<?php
	session_start();
?>
<?php
	if (isset($_POST['upload']))
	{

		$image = $_POST['image'];
		$stick = $_POST['sticker'];
		$target = "images/".basename($_FILES['image']['name']);

		$db = mysqli_connect('localhost', 'root', 'password', 'camagru');

		$image = $_FILES['image']['name'];
		$text = $_POST['text'];
		$user = $_SESSION['user'];

		$sql = "INSERT INTO `images` (`image_name`, `user_name`, `text`) VALUES ('$target', '$user', '$text')";
		mysqli_query($db, $sql);
		mysqli_query($db, "COMMIT");

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			echo "Image uploaded successfully";
			echo $image;
			echo $stick;
		}
		else{
			echo "There was a problem uploading image";
		}
		//header("Location: gallery.php");
	}
?>