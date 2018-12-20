<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
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
    <body background = "https://hdqwalls.com/download/camera-vintage-pic-1920x1080.jpg">
        <ul>
            <li><a>Camagru</a></li>
            <li><a href="Home.html">Home</a></li>
            <li><a href="signin.php">Signin</a></li>
            <li><a href="signup.php">Signup</a></li>
        </ul>
        <h1 align = "center"><u><b>Signup</b></u></h1> 
        <div>
        <form action="signup.php" align = "center" method="post">
            <h2><u><b>First Name:</b></u></h2>
            <input class='button button1' type="text" name="fname" placeholder="Enter Your First Name" required><br>
            <h2><u><b>Last Name:</b></u></h2>
            <input class='button button1' type="text" name="lname" placeholder="Enter Your Last Name" required><br>
            <h2><u><b>User Name:</b></u></h2>
            <input class='button button1' type="text" name="uname" placeholder="Enter Your User Name" pattern=".{6,}" title="Six or more characters" required><br>
            <h2><u><b>Email:</b></u></h2>
            <input class='button button1' type="email" name="email" placeholder="Enter Your Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br>
            <h2><u><b>Password:</b></u></h2>
            <input class='button button1' type="password" name="pass" placeholder="Enter Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
            <input class='button button1' type="submit" name="submit" value="OK">
        </form>
        <?php
            $db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');

            $first = $_POST['fname'];
            $last = $_POST['lname'];
            $user = $_POST['uname'];
            $mail = $_POST['email'];
            $pword = $_POST['pass'];
            $code = mt_rand(1000, 9999);

            $pword = hash('whirlpool', $pword);

            $query = $db->prepare("INSERT INTO `users` (`first_name`, `last_name`, `user_name`, `email`, `password`, `code`) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute(array($first, $last, $user, $mail, $pword, $code));
            $to = $mail;
            $subject = 'Validate Camagru Account';
            $url = $_SERVER['HTTP_HOST'] . str_replace("/signup.php", "", $_SERVER['REQUEST_URI']);
            $message = "
            <html>
            <head>
            <title>Validate Account</title>
            </head>
            <body>
            <p>Please Click On Link Below To Activate Account</p>
            <p>Please Enter This Code:".$code."</p>
            <button><a href='http://".$url."/activate.php'><b>link</b></a></button>
            </body>
            </html>";
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'From: smabunda@student.wethinkcode.co.za';
            $retval = mail($to, $subject, $message, implode("\r\n", $headers));
            if( $retval == true ) {
                echo "Message sent successfully...";
            }
            else {
                echo "Message could not be sent...";
            }
        ?>
    </div>
    </body>
</html>