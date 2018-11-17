<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gallery</title>
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
	<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTg2rO-KcmeupM1olamnp0vR4ROct61rYxdOWnXbDQGy8em5GaK">
		<ul>
			<li><a>Camagru</a></li>
			<li><a href="booth.php">Booth</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="signout.php">Signout</a></li>
		</ul>
		<div>
			<?php
				$db = mysqli_connect('localhost', 'root', 'password', 'camagru');
				$user = $_SESSION['user'];
				$sql = "SELECT * FROM `images` ORDER BY `image_id` DESC";
				$result = mysqli_query($db, $sql);
				echo "<h1 align='center'><u><b>Signed In As ".$_SESSION['user']."</b></u></h1>";
				while ($row = mysqli_fetch_array($result))
				{
					echo "<div align='center' class='polaroid more'>\n";
					echo "<img src=".$row['image_name']." width=100%>\n";
					echo "<br>";
					echo "<form action='image.php' method='post'>";
					echo "<input class='button button1' type='button' name='like' value='Like!'>";
					echo "<input class='button button1' type='text' name='type' placeholder='Enter A Comment'>";
					echo "<input class='button button1' type='submit' name='comment' value='Comment!'>";
					echo "<input class='button button1' type='button' name='delete' value='Delete!'>";
					echo "</form>";
					echo "</div>";
				}
			?>
		</div>
		<div class="pagination">
			<a href="Booth.php">Booth</a>
  			<a href="#" align="center">&lt;</a>
  			<a href="#" align="center">1</a>
  			<a href="#" align="center">2</a>
  			<a href="#" align="center">3</a>
  			<a href="#" align="center">4</a>
  			<a href="#" align="center">5</a>
  			<a href="#" align="center">6</a>
  			<a href="#" align="center">&gt;</a>
  		</div>
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