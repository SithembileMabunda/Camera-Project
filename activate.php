<!DOCTYPE html>
<html>
	<head>
		<title>Activate</title>
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
	<body background="https://cdn.mos.cms.futurecdn.net/6ef44af269e31717530acad4753dd14b.jpg">
		<ul>
			<li><a>Camagru</a></li>
		</ul>
		<h1 align = "center"><u><b>Activate</b></u></h1>
		<form method="POST" action="activate.php" align="center">
			<h2><u><b>User Name:</b></u></h2>
			<input class='button button1' type="text" name="username" placeholder="Enter User Name" required>
			<h2><u><b>Password:</b></u></h2>
			<input class='button button1' type="password" name="password" placeholder="Enter Password" required>
			<h2><u><b>Confirmation Code:</b></u></h2>
			<input class='button button1' type="text" name="code" placeholder="Enter Code To Confirm" required>
			<br>
			<input class='button button1' type="submit" name="submit" value="Activate">
		</form>
		<?php
			$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8', 'root', 'password');
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$code = $_POST['code'];
			if (isset($_POST['submit']))
			{
				if (empty($user) || empty($pass) || empty($code))
				{
					header("Location: signin.php?signin=error1");
					//error("Username and/or Password and/or Code empty!");
				}
				else
				{
					$query = $db->prepare("SELECT `password` FROM `users` WHERE `user_name` = ?");
					$query->execute([$user]);
					$result = $query->fetch();
					if ($result['password'] != $pass)
					{
						header("Location: signin.php?signin=error2");
						//error("username and/or password incorrect!");
					}
					else
					{
						$query = $db->prepare("SELECT `code` FROM `users` WHERE `user_name` = ?");
						$query->execute([$user]);
						$result = $query->fetch();
						if ($result['code'] != $code)
						{
							header("Location: activate.php?signin=error3");
							//error("Code Incorrect!");
						}
						else
						{
							$query = $db->prepare("UPDATE `users` SET `active` = '1' WHERE `user_name` = ?");
							$query->execute([$user]);
							header('Location: signin.php');
						}
					}
				}
			}
			/*else
			{
				header("Location: activate.php?activate=error");
			}*/
		?>
</html>