<?php

function setComment($conn){
	if(isset($_POST['submitComment'])){
		$UID = $_POST['UID'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO comments(UID, date, message) 
		values('$UID', '$date', '$message')";
		
		$result = $conn->query($sql);
	}
}

function getComment($conn){
	$sql="SELECT*FROM comments";
	$result = $conn->query($sql);
	while($raw=$result->fetch_assoc()){
	echo"<div class='comm'>".
		 	$raw['UID'].	
		 	"     At ".$raw['date']."<br>".	
		 	$raw['message']."<br><br>".
		"</div>";
	echo"<button type=submit>Reply</button>";
	}
	
}

function deletes($conn) {

}
?>