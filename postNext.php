<?php
    
    $db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');

    $query = $db->prepare("SELECT `image_name` FROM `images` ORDER BY `image_id` DESC");
    $query->execute();

    while ($pic = $query->fetch())
    {
        $pics[] = $pic;
    }

    if (isset($_POST['last_index']) && $_POST['last_index'] < count($pics))
    {
        $i = $_POST['last_index'];
        $equal = count($pics) - $i;
        echo $equal;
        echo $i;
        if ($equal < 5)
        {
            while ($equal > 0)
            {
                echo $equal;
                echo "<div align='center' class='polaroid more'>\n";
                echo "<img src=".$pics[$i++]['image_name']." width=100%>\n";
                echo "<br>";
                echo "<form action='image.php' method='post'>";
                echo "<input class='button button1' type='button' name='like' id='".$likeId."' value='Like!' onclick=likePic(".$row['image_id'].")>";
                echo "<input class='button button1' type='text' name='type' id='".$comId."' placeholder='Enter A Comment'>";
                echo "<input class='button button1' type='button' name='comment' value='Comment!' onclick=commentPic(".$row['image_id'].")>";
                echo "<input type='button' class='button button1' name='more' id='".$showId."' align='center' onclick=showComments(".$row['image_id'].") value='&blacktriangledown;'>";
                echo "</form>";
                echo "<br>";
                echo "</div>";
                $equal--;
            }

        }
        if ($equal == 0)
        {
        }
        else
        {
            echo "<div align='center' class='polaroid more'>\n";
    		echo "<img src=".$pics[$i]['image_name']." width=100%>\n";
            echo "<br>";
            echo "<form action='image.php' method='post'>";
            echo "<input class='button button1' type='button' name='like' id='".$likeId."' value='Like!' onclick=likePic(".$row['image_id'].")>";
            echo "<input class='button button1' type='text' name='type' id='".$comId."' placeholder='Enter A Comment'>";
            echo "<input class='button button1' type='button' name='comment' value='Comment!' onclick=commentPic(".$row['image_id'].")>";
            echo "<input type='button' class='button button1' name='more' id='".$showId."' align='center' onclick=showComments(".$row['image_id'].") value='&blacktriangledown;'>";
            echo "</form>";
    		echo "<br>";
    		echo "</div>";
            echo "<div align='center' class='polaroid more'>\n";
            echo "<img src=".$pics[++$i]['image_name']." width=100%>\n";
            echo "<br>";
            echo "<form action='image.php' method='post'>";
            echo "<input class='button button1' type='button' name='like' id='".$likeId."' value='Like!' onclick=likePic(".$row['image_id'].")>";
            echo "<input class='button button1' type='text' name='type' id='".$comId."' placeholder='Enter A Comment'>";
            echo "<input class='button button1' type='button' name='comment' value='Comment!' onclick=commentPic(".$row['image_id'].")>";
            echo "<input type='button' class='button button1' name='more' id='".$showId."' align='center' onclick=showComments(".$row['image_id'].") value='&blacktriangledown;'>";
            echo "</form>";
            echo "<br>";
            echo "</div>";
            echo "<div align='center' class='polaroid more'>\n";
            echo "<img src=".$pics[++$i]['image_name']." width=100%>\n";
            echo "<br>";
            echo "<form action='image.php' method='post'>";
            echo "<input class='button button1' type='button' name='like' id='".$likeId."' value='Like!' onclick=likePic(".$row['image_id'].")>";
            echo "<input class='button button1' type='text' name='type' id='".$comId."' placeholder='Enter A Comment'>";
            echo "<input class='button button1' type='button' name='comment' value='Comment!' onclick=commentPic(".$row['image_id'].")>";
            echo "<input type='button' class='button button1' name='more' id='".$showId."' align='center' onclick=showComments(".$row['image_id'].") value='&blacktriangledown;'>";
            echo "</form>";
            echo "<br>";
            echo "</div>";
            echo "<div align='center' class='polaroid more'>\n";
            echo "<img src=".$pics[++$i]['image_name']." width=100%>\n";
            echo "<br>";
            echo "<form action='image.php' method='post'>";
            echo "<input class='button button1' type='button' name='like' id='".$likeId."' value='Like!' onclick=likePic(".$row['image_id'].")>";
            echo "<input class='button button1' type='text' name='type' id='".$comId."' placeholder='Enter A Comment'>";
            echo "<input class='button button1' type='button' name='comment' value='Comment!' onclick=commentPic(".$row['image_id'].")>";
            echo "<input type='button' class='button button1' name='more' id='".$showId."' align='center' onclick=showComments(".$row['image_id'].") value='&blacktriangledown;'>";
            echo "</form>";
            echo "<br>";
            echo "</div>";
            echo "<div align='center' class='polaroid more'>\n";
            echo "<img src=".$pics[++$i]['image_name']." width=100%>\n";
            echo "<br>";
            echo "<form action='image.php' method='post'>";
            echo "<input class='button button1' type='button' name='like' id='".$likeId."' value='Like!' onclick=likePic(".$row['image_id'].")>";
            echo "<input class='button button1' type='text' name='type' id='".$comId."' placeholder='Enter A Comment'>";
            echo "<input class='button button1' type='button' name='comment' value='Comment!' onclick=commentPic(".$row['image_id'].")>";
            echo "<input type='button' class='button button1' name='more' id='".$showId."' align='center' onclick=showComments(".$row['image_id'].") value='&blacktriangledown;'>";
            echo "</form>";
            echo "<br>";
            echo "</div>";
        }
    }
?>