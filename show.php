<?php

    $db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
    session_start();
    $user = $_SESSION['user'];
    if(isset($_POST['imageId']))
    {
        $image = $_POST['imageId'];
        $commentsR = $db->prepare("SELECT * FROM `comments` where `image_id` = ?");
        $commentsR->execute([$image]);

        while($comment = $commentsR->fetch())
        {
            echo "<p>".$comment['user_name'].": ".$comment['comment']."</p>";
        }
    }
?>