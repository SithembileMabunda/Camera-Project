<?php
	session_start();
?>
<html>
	<head>
		<title>Signin</title>
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
	<body background = "https://images.wallpaperscraft.com/image/camera_vintage_retro_127949_1920x1080.jpg">
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="signin.php">Signin</a></li>
			<li><a href="signup.php">Signup</a></li>
            <li><a href="forgot.php">Forgot</a></li>
		</ul>
		<div class = "h1">
        	<h1 align = "center"><u><b>Signin</b></u></h1>
    	</div>
    	<div>
        	<form action="signin.php" method="post" align = "center">
            	<h2><u><b>User Name:</b></u></h2>
            	<input class='button button1' type="text" name="username" placeholder="Enter Your User Name" required><br>
            	<h2><u><b>Password:</b></u></h2>
            	<input class='button button1' type="password" name="pass" placeholder="Enter Your Password" required><br>
                <a href="forgot.php"><font color="red">Forgot Password?</font></a><br>
            	<input class='button button1' type="submit" name="submit" value="Login!">

        	</form>
            <?php
                $db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
                $user = $_POST['username'];
                $pass = $_POST['pass'];

                if (isset($_POST['submit']))
                {
                    if (empty($user) || empty($pass))
                    {
                        header("Location: signin.php?signin=error1");
                       //error("Username and/or Password empty!");
                    }
                    else
                    {
                        $pass = hash('whirlpool', $pass);
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
                            $query = $db->prepare("SELECT `active` FROM `users` WHERE `user_name` = ?");
                            $query->execute([$user]);
                            $result = $query->fetch();
                            if ($result['active'] != 1)
                            {
                                header("Location: signin.php?signin=error3");
                                //error("Account Not Active!");
                            }
                            else
                            {
                                $_SESSION['user'] = $user;
                                header("Location: gallery.php");
                            }
                        }
                    }
                }
                /*else
                {
                    header("Location: signin.php?signin=error");
                }*/
            ?>
    	</div>
	</body>
</html>