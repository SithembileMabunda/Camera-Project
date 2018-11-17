<?php
	if (isset($_POST['upload']))
	{
		$target = "images/".basename($_FILES['image']['name']);

		$db = mysqli_connect('localhost', 'root', 'password', 'camagru');

		$image = $_FILES['image']['name'];
		$text = $_POST['text'];

		$sql = "INSERT INTO `images` (`image_name`, `text`) VALUES ('$target', '$text')";
		mysqli_query($db, $sql);
		mysqli_query($db, "COMMIT");

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			echo "Image uploaded successfully";
		}
		else{
			echo "There was a problem uploading image";
		}
	}
?>