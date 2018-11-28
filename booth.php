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
        		<img id = "img" style="position: absolute; left: 9px; top: 54px;">
      		</div>
      		<div>
        		<button class="button button4" onclick = "snap();">snap</button>
        		<script src="boothone.js"></script>
     	 	</div>
     	</div>
     	<br>


	  	<div class="gallery">
	  		<form method="post" action="boothone.php" align="center">
	  			<img src="sticker1.png" id="pic1" class="tablinks" onclick="openCity('sticker1.png')" width="100%">
	  			<img src="sticker4.png" id="pic2" class="tablinks" onclick="openCity('sticker4.png')" width="100%">
	  			<img src="sticker3.png" id="pic3" class="tablinks" onclick="openCity('sticker3.png')" width="100%">
				<input type="text" name="url" id="url" style="display: none;">
				<input type="text" name="sticker" id="sticker" style="display: none;">
				<input class="button button4" type="submit" value="submit" name="done">
			</form>
	  	</div>
	  	<div id="selected_sticker" class="tabcontent" style="display : none; position: absolute; left: 250px; top: 100px;">
	  		<img id="omunye" src="sticker2.png" width = "45%">
		</div>
		<div class="gallery">
			<form method="post" action="boothtwo.php" enctype="multipart/form-data" align="center">
				<input class="button button4" type="hidden" name="size" value = "100000">
				<div>
					<input  type="file" name="image" onchange="loadFile(event)">
					<input type="text" name="sticker" id="sticker" style="display: none;">
				</div>
				<div>
					<textarea  name="text" cols="25" rows="4" placeholder="image description"></textarea>
				</div>
				<div>
					<input class="button button4" type="submit" name="upload" value="Upload Image">
				</div>
			</form>
		</div>
		<div>
			<?php include 'booththree.php'; ?>
		</div>
		<script>

			var img = document.getElementById("img");

			function openCity(selectedSticker)
			{
				var sticker = document.getElementById("sticker");
				var omunye = document.getElementById("omunye");
				var div = document.getElementById("selected_sticker");

				sticker.value = selectedSticker;
				omunye.src = selectedSticker;
				div.style.display = "block";
			}

			var loadFile = function(event)
		    {
				img.width = video.clientWidth;
				img.height = video.clientHeight;
			    img.src = URL.createObjectURL(event.target.files[0]);
			    img.style.display = "block";
		    };
		</script>
	</body>
</html>