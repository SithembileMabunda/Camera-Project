<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Change</title>
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
		</ul>
		<form action="change.php" method="post" align="center">
			<h2><u><b>Current Password:</b></u></h2>
			<input class='button button1' type="text" name="opass" placeholder="Enter Current Password">
			<h2><u><b>New Password:</b></u></h2>
			<input class='button button1' type="text" name="npass" placeholder="Enter New Password">
			<br>
			<input class='button button1' type="submit" name="submit">
		</form>
		<?php
			$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
			$user = $_SESSION['user'];
			$opass = $_POST['opass'];
			$npass = $_POST['npass'];
			
			if (isset($_POST['submit']))
			{
				if (empty($npass) || empty($opass))
				{
					header("Location: change.php?change=error1");
					//error("Current Password and/or New Password empty!");
				}
				else
				{
					$query = $db->prepare("SELECT `password` FROM `camagru` WHERE `user_name` = ?");
					$query->execute([$user]);
					$result = $query->fetch();
					if ($result['password'] != $opass)
					{
						header("Location: change.php?change=error2");
						//error("Current Password and/or New Password Incorrect!");
					}
					else
					{
						$query = $db->prepare("UPDATE `camagru` SET `password` = '$npass' WHERE `user_name` = ?");
						$query->execute([$user]);
						header("Location: profile.php");
					}
				}
			}
			/*else
			{
				header("Location: change.php?change=error");
			}*/
		?>
	</body>
</html>