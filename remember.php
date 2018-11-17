<!DOCTYPE html>
<html>
	<head>
		<title>Remember</title>
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
	<body background="http://www.hd-freeimages.com/uploads/large/hd-photography-wallpapers/free-photography-retro-camera-hd-wallpapers-download.jpg">
		<ul>
			<li><a>Camagru</a></li>
		</ul>
		<h1 align = "center"><u><b>Remember</b></u></h1>
		<form method="POST" action="remember.php" align="center">
			<h2><u><b>User Name:</b></u></h2>
			<input class='button button1' type="text" name="username" placeholder="Enter User Name" required>
			<h2><u><b>Confirmation Code:</b></u></h2>
			<input class='button button1' type="text" name="code" placeholder="Enter Code To Confirm" required>
			<br>
			<input class='button button1' type="submit" name="submit" value="OK">
		</form>
		<?php
			$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8', 'root', 'password');
			$user = $_POST['username'];
			$code = $_POST['code'];
			if (isset($_POST['submit']))
			{
				if (empty($user) || empty($code))
				{
					header("Location: remember.php?remember=error1");
					//error("Username and/or Password and/or Code empty!");
				}
				else
				{
					$query = $db->prepare("SELECT `code FROM `users` WHERE `user_name` = ?");
					$query->execute([$user]);
					$result = $query->fetch();
					if ($result['code'] != $code)
					{
						header("Location: remember.php?remember=error2");
						//error("username and/or password incorrect!");
					}
					else
					{
						$query = $db->prepare("SELECT `password` FROM `users` WHERE `user_name` = ?");
						$query->execute([$user]);
						$result = $query->fetch();
						$pass = $result['password'];
						$to = $mail;
			            $subject = 'Account Password';
			            $message = "
			            <html>
			            <head>
			            <title>Account Password</title>
			            </head>
			            <body>
			            <p>$user, This Is Your Account Password: $pass</p>
			            <button><a href='http://localhost:8080/Camagru/signin.php'><b>link</b></a></button>
			            </body>
			            </html>";
			            $headers[] = 'MIME-Version: 1.0';
			            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
			            $headers[] = 'From: smabunda@student.wethinkcode.co.za';
			            mail($to, $subject, $message, implode("\r\n", $headers));
					}
				}
			}
			/*else
			{
				header("Location: remember.php?remember=error");
			}*/
		?>
</html>