<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
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
	<body background="https://as2.ftcdn.net/jpg/01/33/74/17/500_F_133741768_6dL7b5FQj5lSy6vggHEdPi21ANaq4080.jpg">
		<ul>
			<li><a>Camagru</a></li>
			<li><a href="booth.php">Booth</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="signout.php">Signout</a></li>
		</ul>
		<div>
			<form action="update.php" method="post" align = "center">
				<h1 align="center"><u><b>Change Password</b></u></h1>
				<br>
				<h2 align="center"><u><b>Current Password</b></u></h2>
				<input class='button button1' type="text" name="oldpass" placeholder="Enter Current Password">
				<h2 align="center"><u><b>New Password</b></u></h2>
				<input class='button button1' type="text" name="newpass" placeholder="Enter New Password">
				<br>
				<input class='button button1' type="submit" name="submit" value="Changing!">
			</form>
			<?php
				$db = mysqli_connect('localhost', 'root', 'password', 'camagru');
				$user = $_SESSION['user'];
				$opass = $_POST['oldpass'];
				$npass = $_POST['newpass'];

				$sql = "UPDATE `users` SET `password` = '$npass' WHERE `user_name` = '$user'";
				mysqli_query($db, $sql);
			?>
		</div>
		<div>
			<?php
				$user = $_SESSION['username'];
				$db = mysqli_connect('localhost', 'root', 'password', 'camagru');
				$sql = "SELECT * FROM `images` where `username` = `$user` ORDER BY `image_id` DESC";
				$result = mysqli_query($db, $sql);
				while ($row = mysqli_fetch_array($result))
				{
					echo "<div align='center'>\n";
					echo "<img src=".$row['image_name']." width=33.3%>\n";
					echo "</div>";
				}
			?>
		</div>
	</body>
</html>