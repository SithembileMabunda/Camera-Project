<!DOCTYPE html>
<html>
	<head>
		<title>Forgot</title>
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
	<body background="https://images.alphacoders.com/580/580959.jpg">
		<ul>
			<li><a>Camagru</a></li>
		</ul>
		<h1 align = "center"><u><b>Forgot</b></u></h1>
		<form action="forgot.php" method="post" align = "center">
			<h2><u><b>User Name:</b></u></h2>
			<input class='button button1' type="text" name="user" placeholder="Enter Your User Name" required>
			<h2><u><b>Email:</b></u></h2>
			<input class='button button1' type="email" name="mail" placeholder="Enter Email Address" required>
			<br>
			<input class='button button1' type="submit" name="submit">
		</form>
		<?php
			$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
			$user = $_POST['user'];
			$mail = $_POST['mail'];

			if (isset($_POST['submit']))
			{
				$user = $_POST['user'];
				$mail = $_POST['mail'];

				if (isset($_POST['submit']))
                {
                    if (empty($user) || empty($mail))
                    {
                        header("Location: forgot.php?forgot=error1");
                       //error("Username and/or Email Address Empty!");
                    }
                    else
                    {
                        $query = $db->prepare("SELECT `email` FROM `users` WHERE `user_name` = ?");
                        $query->execute([$user]);
                        $result = $query->fetch();
                        if ($result['email'] != $mail)
                        {
                            header("Location: forgot.php?forgot=error2");
                            //error("Username and/or Email Address Incorrect!");
                        }
                        else
                        {
                        	$to = $mail;
                        	$subject = 'Remember Camagru Account';
                            $url = $_SERVER['HTTP_HOST'] . str_replace("/forgot.php", "", $_SERVER['REQUEST_URI']);
		            		$message = "
		            		<html>
		            		<head>
		            		<title>Remember Account</title>
		            		</head>
		            		<body>
		            		<p>Please Click On Link Below To Remember Account</p>
		            		<button button='button button4'><a href='http://".$url."/remember.php'><b>link</b></a></button>
		            		</body>
		            		</html>";
		            		$headers[] = 'MIME-Version: 1.0';
		            		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		            		$headers[] = 'From: smabunda@student.wethinkcode.co.za';
		            		mail($to, $subject, $message, implode("\r\n", $headers));
                        }
                    }
                }
			}
			/*else
			{
				header("Location: forgot.php");
			}*/
		?>
	</body>
</html>