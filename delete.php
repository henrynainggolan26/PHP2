<?php
  $connection = mysqli_connect("localhost", "root", "ssmaju", "test_wordpress");

	$id =$_REQUEST['id'];
	
	
	// sending query
	mysqli_query($connection, "DELETE FROM people WHERE id = '".$id."'")
	or die(mysqli_error());  	
	
	header("Location: people_view.php");
?> 