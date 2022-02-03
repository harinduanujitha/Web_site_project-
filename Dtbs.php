<?php
	$conn=mysqli_connect("localhost","root", "", "don't_get_stuck");
	
	if(!$conn){
		die("Connection fail:".mysqli_connect_error());
		
	}
	
?>