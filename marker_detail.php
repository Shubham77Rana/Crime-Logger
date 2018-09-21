<?php

	$crimeid = $_GET['crimeid'];

	$connection = mysqli_connect("localhost","root","","crimeact");

	$sql = "SELECT title, description FROM loggedcrime WHERE id = $crimeid";

	$result = mysqli_fetch_array(mysqli_query($connection, $sql)); 

	echo "<b>".ucfirst($result['title'])."</b><br>".$result['description'];
?>