<?php
	session_start();
?>
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

		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		    background-color: #fefefe;
		    margin: auto;
		    padding: 20px;
		    border: 1px solid #888;
		    width: 80%;
		}

		/* The Close Button */
		.close {
		    color: #aaaaaa;
		    float: right;
		    font-size: 28px;
		    font-weight: bold;
		}

		.close:hover,
		.close:focus {
		    color: #000;
		    text-decoration: none;
		    cursor: pointer;
		}
		</style>
	</head>
	<body bgcolor="grey">
		<ul>
			<li><a>Camagru</a></li>
			<li><a href="booth.php">Booth</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="signout.php">Signout</a></li>
		</ul>
		<div>
			<?php
				$db = new PDO ('mysql:host=localhost;dbname=camagru;charset=utf8mb4', 'root', 'password');
				$user = $_SESSION['user'];
				$sql = $db->prepare("SELECT * FROM `images` ORDER BY `image_id` DESC");
				$sql->execute();

				echo "<h1 align='center'><u><b>Signed In As ".$_SESSION['user']."</b></u></h1>";
				while ($row = $sql->fetch())
				{
					$id = $row['image_id'];
					$comId = "typed".$id;
					$showId = "myBtn".$id;
					$likeId = "like".$id;
					echo "<div align='center' class='polaroid more'>\n";
					echo "<img src=".$row['image_name']." width=100% alt='missing image'>\n";
					echo "<br>";
					echo "<form action='image.php' method='post'>";
					echo "<input class='button button1' type='button' name='like' id='".$likeId."' value='Like!' onclick=likePic(".$row['image_id'].")>";
					echo "<input class='button button1' type='text' name='type' id='".$comId."' placeholder='Enter A Comment'>";
					echo "<input class='button button1' type='button' name='comment' value='Comment!' onclick=commentPic(".$row['image_id'].")>";
					//echo "<a href='#' align='center' class='button button1'>&blacktriangledown;</a>";
					echo "<input type='button' class='button button1' name='more' id='".$showId."' align='center' onclick=showComments(".$row['image_id'].") value='&blacktriangledown;'>";
					echo "</form>";
					echo "</div>";
				}
			?>
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
		<div class="pagination" align="center">
			<a href="Booth.php">Booth</a>
  			<a href="#" align="center">&blacktriangledown;</a>
  		</div>
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
<!--<?php
	/*if the like is clicked and is equal to zero then change it to one, otherwise change it to zero
	$db = mysqli_connect('localhost', 'root', 'password', 'camagru');
	$sql = "SELECT `likes` FROM `images`";
	$result = mysqli_query($db, $sql);
	echo $result;
	if ($result == 0)
	{
		$sql = "UPDATE likes to '1'";
		mysqli_query($db, $sql);
		mail("","","");
	}
	else
	{
		$sql = "UPDATE likes to '0'";
		mysqli_query($db, $sql);
		mail("","","");
	}
?>
<?php
	//comments;
	mail("","","")*/
?>-->