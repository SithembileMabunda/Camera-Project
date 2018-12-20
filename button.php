<!DOCTYPE html>
<html>
	<head>
		<title>Button</title>
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

				$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');

				echo "<h1 align='center'><u><b>Signed In As ".$_SESSION['user']."</b></u></h1>";

				$query = $db->prepare("SELECT `image_name` FROM `images` ORDER BY `image_id` DESC");
				$query->execute();


			    while ($pic = $query->fetch())
			    {
			    	$pics[] = $pic;
			    }

                $i = 0;
                //$pics = array("sticker1.png", "sticker2.png", "sticker3.png", "sticker4.png");
				/*foreach ($pics as $row)
				{*/
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
					echo "</div>";
					echo "<input id='next_page' type='button' value='&blacktriangledown;' onclick=next(".++$i.")>";
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
						index += 5;
						next(index);
					};
				}});
			}

		</script>
		<div id="myModal" class="modal">

			  <!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>
					<div id="comments">
						
					</div>
				</div>

			</div>
		</div>
		<script>
			

			function showComments(imageId)
			{
				// Get the modal
				var modal = document.getElementById('myModal');
				var comments = document.getElementById('comments');

				// Get the button that opens the modal
				var btn = document.getElementById("myBtn" + imageId);

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks the button, open the modal 
				//btn.onclick = function() {
				    modal.style.display = "block";
				//}

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				    modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				    if (event.target == modal) {
				        modal.style.display = "none";
				    }
				}
				$.ajax({method: "POST", url: "show.php", data: {"imageId":imageId}, success: function (result)
  					{
  						comments.innerHTML = result;
  					}})
			}
		</script>
  		<script>
  			
  			function likePic(imageId)
  			{
  				$.ajax({method: "POST", url: "image.php", data: {"imageId":imageId, "like":"stop it i like it"}, success: function (result)
  					{
  						alert(result);
  					}})
  			}

  			function commentPic(imageId)
  			{
  				var txt = document.getElementById("typed" + imageId).value;
  				$.ajax({method: "POST", url: "image.php", data: {"imageId":imageId, "comment":"stop it i comment it", "txt": txt}, success: function (result)
  					{
  						alert(result);
  					}})
  			}
  			
  		</script>
        </body>
</html>