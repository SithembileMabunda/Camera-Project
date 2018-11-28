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
			<a href="#" class="button button1">Change Password</a>
			<a href="#" class="button button1">Change Username</a>
			<a href="#" class="button button1">Change Email Address</a>
		</div>
		<div>
			<?php
				include 'booththree.php';
			?>
		</div>
	</body>
</html>