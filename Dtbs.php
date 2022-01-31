<?php
	$conn=mysqli_connect('localhost','root', '', 'commentsection');
	
	if(!$conn){
		die("Connection fail:".mysqli_connect_error());
		
	}
	
?>