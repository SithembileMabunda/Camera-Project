<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Change Username</title>
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
		<form action="changeone.php" method="post" align="center">
			<h2><u><b>Current Username:</b></u></h2>
			<input class='button button1' type="text" name="oname" placeholder="Enter Current Username">
			<h2><u><b>New Username:</b></u></h2>
			<input class='button button1' type="text" name="nname" placeholder="Enter New Username" pattern=".{6,}" title="Six or more characters" required>
			<br>
			<input class='button button1' type="submit" name="submit">
		</form>
		<?php
			$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
			$user = $_SESSION['user'];
			$oname = $_POST['oname'];
			$nname = $_POST['nname'];
			
			if (isset($_POST['submit']))
			{
				if (empty($nname) || empty($oname))
				{
					header("Location: changeone.php?changeone=error1");
					//error("Current Password and/or New Password empty!");
					echo "error1";
				}
				else
				{
					$query = $db->prepare("SELECT `user_name` FROM `users` WHERE `user_name` = ?");
					$query->execute([$user]);
					$result = $query->fetch();
					if ($result['user_name'] != $oname)
					{
						header("Location: changeone.php?changeone=error2");
						//error("Current Password and/or New Password Incorrect!");
						echo "error1";
					}
					else
					{
						$query1 = $db->prepare("UPDATE `users` SET `user_name` = '$nname' WHERE `user_name` = ?");
						$query2 = $db->prepare("UPDATE `images` SET `user_name` = '$nname' WHERE `user_name` = ?");
						$query3 = $db->prepare("UPDATE `comments` SET `user_name` = '$nname' WHERE `user_name` = ?");
						$query4 = $db->prepare("UPDATE `likes` SET `user_name` = '$nname' WHERE `user_name` = ?");
						$query1->execute([$user]);
						$query2->execute([$user]);
						$query3->execute([$user]);
						$query4->execute([$user]);
						$_SESSION['user'] = $nname;
						header("Location: profile.php");
						echo "no-error";
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