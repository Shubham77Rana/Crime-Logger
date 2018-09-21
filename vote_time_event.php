<?php

	$connection = mysqli_connect("localhost","root","","crimeact");

	$crime_id = $_GET['id'];

	mysqli_query($connection, "SET GLOBAL EVENT_SCHEDULER = ON");

	$sql = "CREATE EVENT IF NOT EXISTS rana$crime_id
			ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 3 MINUTE 
			DO
			UPDATE loggedcrime SET archive = (
				SELECT MIN(vote) FROM (
					SELECT vote FROM vote WHERE crime_id = $crime_id GROUP BY vote HAVING COUNT(*) = (
						SELECT MAX(maxvote) FROM (
							SELECT COUNT(*) AS maxvote FROM vote WHERE crime_id = $crime_id GROUP BY vote
						) AS temp1
					)
				) AS temp2
			) - 1 WHERE id = $crime_id";

	mysqli_query($connection, $sql);

	$sql = "CREATE EVENT IF NOT EXISTS ranadel$crime_id
			ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 4 MINUTE 
			DO
			DELETE FROM vote WHERE crime_id = $crime_id";

	mysqli_query($connection, $sql);

	header("Location: index.php");

?>