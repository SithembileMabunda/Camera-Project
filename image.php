<?php
	$user = $_SESSION['user'];
	$comment = $_POST['text'];
	
	if (isset($_POST['like']))
	{
		//select likes;
		//add or subtract like;
		//update like;
		$result->execute();
	}

	if (isset $_POST['comment'])
	{
		if (empty($comment))
		{
			something();
		}
		//insert comment into comments;
		$result->execute();
	}

	if (isset($_POST['delete']))
	{
		//drop image, likes and comments;
		//refresh page;
		$result->execute();
	}
?>