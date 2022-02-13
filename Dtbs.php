<?php
	$conn=mysqli_connect("localhost","root", "", "dgs");
	
	if(!$conn){
		die("Connection fail:".mysqli_connect_error());
		
	}
	
?>