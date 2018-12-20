<?php
	session_start();
?>
<?php
	if (isset($_POST['upload']))
	{

		$image = $_POST['image'];
		$stickerPath = $_POST['sticker2'];
		$target = "images/".basename($_FILES['image']['name']);

		$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');

		$image = $_FILES['image']['name'];
		$text = $_POST['text'];
		$user = $_SESSION['user'];


		$sticker = imagecreatefrompng($stickerPath);
		$dest = imagecreatefromjpeg($_FILES['image']['tmp_name']);
		
		list($stickerW, $stickerH) = getimagesize($stickerPath);
		
		imagecolortransparent($sticker, imagecolorat($sticker, 0, 0));
		
		imagecopymerge($dest, $sticker, 0, 0, 0, 0, $stickerW, $stickerH, 100);
		
		$currTime = time();
		$newImageName = "images/".date("Y_m_d")."_".$currTime.".jpg";
		
		imagejpeg($dest, $newImageName, 100);

		$image = $newImageName;
		$text = "caption";

		$query = $db->prepare("INSERT INTO `images` (`image_name`, `user_name`, `text`) VALUES (?, ?, ?)");
        $query->execute(array($newImageName, $user, $text));

		/*if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			echo "Image uploaded successfully";
			echo $image;
			echo $stick;
		}
		else{
			echo "There was a problem uploading image";
		}*/
		header("Location: gallery.php");

		destroy($sticker);
		destroy($dest);
		//header("Location: gallery.php");
	}
?>