<!DOCTYPE html>
<html>
	<head>
		<title>Gallery</title>
		<script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
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
    		padding: 20px 17.5px;
    		text-align: center;
    		text-decoration: none;
    		display: inline-block;
    		font-size: 16px;
    		margin: auto;
    		cursor: pointer;
		}
		.button4
		{
    		background-color: white;
    		color: black;
    		border: 2px solid #e7e7e7;
		}

		.pagination
		{
    		display: inline-block;
		}

		.pagination a
		{
    		color: black;
    		float: left;
    		padding: 8px 16px;
    		text-decoration: none;
    		margin: auto;
		}
		.pagination a.active
		{
    		background-color: #4CAF50;
    		color: white;
		}

		.pagination a:hover:not(.active) {background-color: #ddd;}

		img
		{
    		display: block;
    		margin-left: auto;
    		margin-right: auto;
		}

		.center
		{
    		margin: auto;
    		width: 60%;
    		padding: 10px;
		}
		div.polaroid
		{
  			width: 33%;
  			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  			text-align: center;
		}

		.more
		{
			margin: 1% 33.3%;
		}
		</style>
	</head>
	<body bgcolor="grey">
		<ul>
			<li><a>Camagru</a></li>
			<li><a href="Booth.php">Booth</a></li>
			<li><a href="Profile.php">Profile</a></li>
			<li><a href="Signout.php">Signout</a></li>
		</ul>
        <div id="list">
			<?php

				include_once "arr.php";

                $i = 0;
                //$pics = array("sticker1.png", "sticker2.png", "sticker3.png", "sticker4.png");
				/*foreach ($pics as $row)
				{*/
					echo "<div align='center' class='polaroid more'>\n";
					echo "<img src=".$pics[$i]." width=100%>\n";
					echo "<br>";
					echo "</div>";
					echo "</div>";
					echo "<input id='next_page' type='button' value='next' onclick=next(".++$i.")>";
				//}
			?>
		<!-- </div> -->
		<script>

			function	next(index)
			{
				var list = document.getElementById("list");
				var button = document.getElementById("next_page");
				$.ajax({method: "POST", url: "postNext.php", data: {"last_index":index}, success: function (result)
				{
					list.innerHTML += result;
					button.onclick = function ()
					{
						index++;
						next(index);
					};
				}});
			}

		</script>
        </body>
</html>