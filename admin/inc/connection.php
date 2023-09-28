<?php

	$db = mysqli_connect("localhost", "root", "", "newstoday");

	if($db){
		//echo "Database connected succesfully!";
	}
	else{
		echo "Database connection error!";
	}

?>