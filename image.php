<?php
	$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
	session_start();
	$user = $_SESSION['user'];
	
	if (isset($_POST['like']))
	{
		$image = $_POST['imageId'];
		$query = $db->prepare("INSERT INTO `likes` (`image_id`, `user_name`) VALUES (?, ?)");
		$query->execute(array($image, $user));
		
		//echo $_POST['like']." ".$image." ".$user;
		//header("Refresh: 0");
	}

	if (isset($_POST['comment']))
	{
		$comment = $_POST['txt'];
		if (empty($comment))
		{
			//echo "sssss".$comment;
			header("Location: gallery.php?gallery=error1");
		}
		else
		{
			$image = $_POST['imageId'];
			$query = $db->prepare("INSERT INTO `comments` (`image_id`, `comment`, `user_name`) VALUES (?, ?, ?)");
			$query->execute(array($image, $comment, $user));

			$query = $db->prepare("SELECT `notif` FROM `users` WHERE `user_name` = ?");
            $query->execute([$user]);
            $result = $query->fetch();
            if (result['notif'] == 1)
            {
				$query = $db->prepare("SELECT `user_name` FROM `images` WHERE `image_id` = ?");
				$query->execute([$image]);
				$send = result['user_name'];
				$query = $db->prepare("SELECT `email` FROM `users` WHERE `user_name` = ?");
				$query->execute([$send]);
				$mail = result['email'];

				$to = $mail;
	            $subject = 'Some Just Commented On Your Picture!';
	            $message = "
	            <html>
	            <head>
	            <title>Camagru: Comment</title>
	            </head>
	            <body>
	            <p>".$user." just commented on you picture</p>
	            </body>
	            </html>";
	            $headers[] = 'MIME-Version: 1.0';
	            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
	            $headers[] = 'From: smabunda@student.wethinkcode.co.za';
	            $retval = mail($to, $subject, $message, implode("\r\n", $headers));
	            //header("Refresh: 0");
            }
		}
		echo $comment." ".$image." ".$user;
		//if users notification is equal to 0 then do not send notification else do not send notification
		//select user of commented image in image table
		//send email of commented image, user to user

	}

	if (isset($_POST['delete']))
	{
		$image = $_POST['imageId'];
		//$query = $db->prepare("DELETE FROM `images` AND `comments` AND `likes` WHERE `image_id` = ?");
		$query1 = $db->prepare("DELETE FROM `images` WHERE `image_id` = ?");
		$query2 = $db->prepare("DELETE FROM `comments` WHERE `image_id` = ?");
		$query3 = $db->prepare("DELETE FROM `likes` WHERE `image_id` = ?");
		$query1->execute([$image]);
		$query2->execute([$image]);
		$query3->execute([$image]);
		$db->exec("COMMIT");
		//echo "Deleted";
		//header("Refresh: 0");
	}
?>