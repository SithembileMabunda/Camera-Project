<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Change Email</title>
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
		<form action="changetwo.php" method="post" align="center">
			<h2><u><b>Current Email:</b></u></h2>
			<input class='button button1' type="text" name="omail" placeholder="Enter Current Email" required>
			<h2><u><b>New Email:</b></u></h2>
			<input class='button button1' type="text" name="nmail" placeholder="Enter New Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
			<br>
			<input class='button button1' type="submit" name="submit">
		</form>
		<?php
			$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
			$user = $_SESSION['user'];
			$omail = $_POST['omail'];
			$nmail = $_POST['nmail'];
			
			if (isset($_POST['submit']))
			{
				if (empty($nmail) || empty($omail))
				{
					header("Location: changetwo.php?changetwo=error1");
					//error("Current Password and/or New Password empty!");
				}
				else
				{
					$query = $db->prepare("SELECT `email` FROM `users` WHERE `user_name` = ?");
					$query->execute([$user]);
					$result = $query->fetch();
					if ($result['mail'] != $omail)
					{
						header("Location: changetwo.php?changetwo=error2");
						//error("Current Password and/or New Password Incorrect!");
					}
					else
					{
						$query = $db->prepare("UPDATE `users` SET `email` = '$nmail' WHERE `user_name` = ?");
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