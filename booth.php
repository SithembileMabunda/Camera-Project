<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Booth</title>
		<link rel="stylesheet" type="text/css" href="booth.css">
	</head>
	<body bgcolor="grey">
		<ul>
			<li><a>Camagru</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="signout.php">Signout</a></li>
		</ul>
		<div>
      		<div style="width: 75%; float: left;">
        		<video id = "video" autoplay></video>
        		<canvas id = "canvas" style="position: absolute; left: 9px; top: 54px;"></canvas>
      		</div>
      		<div>
        		<button class="button button4" onclick = "snap();">snap</button>
        		<script src="boothone.js"></script>
     	 	</div>
     	</div>
     	<br>
	  	<div class="gallery">
	  		<button class="tablinks" onclick="openCity(event, 'sticker1')"><img src="sticker1.png" width="15%"></button>
	  		<br>
			<button class="tablinks" onclick="openCity(event, 'sticker2')"><img src="sticker4.png" width="15%"></button>
			<br>
			<button class="tablinks" onclick="openCity(event, 'sticker3')"><img src="sticker3.png" width="15%"></button>
	  	</div>
	  	<div id="sticker1" class="tabcontent" style="display : none; position: absolute; left: 250px; top: 100px;">
	  		<img src="sticker1.png" width = "45%">
		</div>
		<div id="sticker2" class="tabcontent" style="display : none; position: absolute; left: 250px; top: 250px;">
	  		<img src="sticker4.png" width = "40%">
		</div>
		<div id="sticker3" class="tabcontent" style="display : none; position: absolute; left: 250px; top: 150px;">
	  		<img src="sticker3.png" width = "45%">
		</div>
		<script src="boothtwo.js"></script>
		<form method="POST" action="boothone.php">
			<input type="text" name="url" id="url" style="display: none;">
			<input class="button button4" type="submit" value="submit" name="done">
		</form>
		<div>
		<form method="post" action="boothtwo.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value = "100000">
			<div>
				<input type="file" name="image">
			</div>
			<div>
				<textarea name="text" cols="40" rows="4" placeholder="image description"></textarea>
			</div>
			<div>
				<input type="submit" name="upload" value="Upload Image">
			</div>
		</form>
	</div>
		<div>
			<?php include 'booththree.php'; ?>
		</div>
	</body>
</html>
//sessions