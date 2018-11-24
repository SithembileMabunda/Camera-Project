<?php
    
    include_once "arr.php";

    if (isset($_POST['last_index']) && $_POST['last_index'] < count($pics))
    {
        $i = $_POST['last_index'];
        echo "<div align='center' class='polaroid more'>\n";
		echo "<img src=".$pics[$i]." width=100%>\n";
		echo "<br>";
		echo "</div>";
    }

?>