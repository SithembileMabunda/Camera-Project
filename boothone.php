<?php
	if (isset($_POST['url']) && isset($_POST['done']))
	{
		$url = $_POST['url'];
		$stickerPath = "sticker3.png";
		
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
	
		$sql = "INSERT INTO `images` (`image_name`, `text`) VALUES ('$image', '$text')";
		mysqli_query($db, $sql);

		header("Refresh:0");

		unlink($imagePath);
		destroy($sticker);
		destroy($dest);
	}
?>