<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
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
	</style>
	</head>
	<body bgcolor="grey">
		<ul>
			<li><a>Camagru</a></li>
			<li><a href="booth.php">Booth</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="signout.php">Signout</a></li>
		</ul>
		<?php
			echo "<h1 align='center'><u><b>Signed In As ".$_SESSION['user']."</b></u></h1>";
		?>
		<div align="center">
			<form method="post" action="notification.php">
				<a href="change.php" class="button button1">Change Password</a>
				<a href="changeone.php" class="button button1">Change Username</a>
				<a href="changetwo.php" class="button button1">Change Email Address</a>
				<input type="submit" class="button button1" name="notif" value="notif">
			</form>
		</div>
		<div>
			<!--if the users notifications are 0 then display -Off- else display -On- -->
			<?php
				$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
                $user = $_SESSION['user'];
				$query = $db->prepare("SELECT `notif` FROM `users` WHERE `user_name` = ?");
                $query->execute([$user]);
                $result = $query->fetch();
				if ($result['notif'] == 0)
					echo "Notifications Are Off";
				else
					echo "Notifications Are On";
			?>
		</div>
		<div>
			<?php
				include 'booththree.php';
			?>
		</div>
		<script>
  			
  			function deletePic(imageId)
  			{
  				$.ajax({method: "POST", url: "image.php", data: {"imageId":imageId, "delete": "Deleted"}, success: function (result)
  					{
  						alert(result);
  					}})
  			}
  			
  		</script>
	</body>
</html>