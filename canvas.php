<!DOCTYPE html>

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
		echo $image;

		//unlink($imagePath);
		//destroy($sticker);
		//destroy($dest);

		

		$db = mysqli_connect('localhost', 'root', 'password', 'camagru');
		//$image = $newImageName;
		$text = "caption";
	
		$sql = "INSERT INTO `images` (`image_name`, `text`) VALUES ('$image', '$text')";
		mysqli_query($db, $sql);
		header("Refresh:0");

		unlink($imagePath);
		destroy($sticker);
		destroy($dest);
	}
?>
<html>
	<head>
		<title>Booth</title>
		<style>
		ul
		{
    		list-style-type: none;
    		margin: 0;
    		padding: 0;
    		overflow: hidden;
    		background-color: #333;
		}

		li a
		{
    		display: block;
    		color: white;
    		text-align: center;
    		padding: 14px 16px;
    		text-decoration: none;
    		float: left;
		}
		
		.button
        {
            background-color: #333;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .button4
        {
            background-color: white;
            color: black;
            border: 2px solid #e7e7e7;
        }

		div.gallery
		{
    		margin: 5px;
    		border: 1px solid #ccc;
    		float: left;
    		width: 180px;
		}

		div.gallery img
		{
    		width: 100%;
    		height: auto;
		}
		</style>
	</head>
	<body bgcolor="grey">
		<ul>
			<li><a>Camagru</a></li>
			<li><a href="Gallery.php">Gallery</a></li>
			<li><a href="Profile.php">Profile</a></li>
			<li><a href="Signout.php">Signout</a></li>
		</ul>
		<div>
      		<div style="width: 75%; float: left;">
        		<video id = "video" autoplay></video>
        		<canvas id = "canvas" style="position: absolute; left: 9px; top: 54px;"></canvas>
      		</div>
      		<div>
        		<button class="button button4" onclick = "snap();">snap</button>
        		<script type="text/javascript">
	          		var video = document.getElementById('video');
	          		var canvas = document.getElementById('canvas');
	          		var context = canvas.getContext('2d');

	          		navigator.mediaDevices.getUserMedia({video:true}).then((stream) => {video.srcObject = stream});
	    
	         		 function throwError (e){
	         		  alert(e.name);
	         		 }

	         	 	function snap (){
	        	 	   canvas.width = video.clientWidth;
	        	 	   canvas.height = video.clientHeight;
	        		    context.drawImage(video, 0, 0,);
	        		    document.getElementById("url").value = canvas.toDataURL("image/jpeg");
	        		 }
	       	 	</script>
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
		<script>
			function openCity(evt, cityName) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active";
		}
		</script>
		<form method="POST" action="canvas.php">
			<input type="text" name="url" id="url" style="display: none;">
			<input class="button button4" type="submit" value="submit" name="done">
		</form>
		<!--<div>
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
			?>-->
		</div>
	</body>
</html>