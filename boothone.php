<?php
	session_start();
	$user = $_SESSION['user'];
	if (isset($_POST['url']) && isset($_POST['done']))
	{
		$url = $_POST['url'];
		$stickerPath = $_POST["sticker"];
		/*if ($_POST['pic1'])
		{
			$stickerPath = "sticker1.png";
		}
		if ($_POST['pic2'])
		{
			$stickerPath = "sticker2.png";
		}
		if ($_POST['pic3'])
		{
			$stickerPath = "sticker3.png";
		}*/
		
		$bomb = explode(",", $url);
		$decoded = base64_decode($bomb[1]);
		$name = rand(0, 100000);
		$fd = fopen("images/".$name.".jpg", "w");
		fwrite($fd, $decoded);
		fclose($fd);
		$imagePath = "images/".$name.".jpg";

		$sticker = imagecreatefrompng($stickerPath);
		$dest = imagecreatefromjpeg($imagePath);
		
		list($stickerW, $stickerH) = getimagesize($stickerPath);
		
		imagecolortransparent($sticker, imagecolorat($sticker, 0, 0));
		
		imagecopymerge($dest, $sticker, 0, 0, 0, 0, $stickerW, $stickerH, 100);
		
		$currTime = time();
		$newImageName = "images/".date("Y_m_d")."_".$currTime.".jpg";
		
		imagejpeg($dest, $newImageName, 100);

		$image = $newImageName;
		$db = mysqli_connect('localhost', 'root', 'password', 'camagru');
		$text = "caption";
	
		$sql = "INSERT INTO `images` (`image_name`, `user_name`, `text`) VALUES ('$image', '$user', '$text')";
		mysqli_query($db, $sql);

		//header("Refresh:0");
		header("Location: gallery.php");

		unlink($imagePath);
		destroy($sticker);
		destroy($dest);
	}
?>