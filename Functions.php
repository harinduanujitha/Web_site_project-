<?php

function setComment($conn){
	if(isset($_POST['submitComment'])){
		$UID = $_POST['UID'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO comments(U_ID,Date,Comment) 
		values('$UID', '$date', '$message')";
		
		$result = $conn->query($sql);
	}
}


function setReply($conn){
	if(isset($_POST['submitReply'])){
		$UID = $_POST['UID'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO comments(U_ID,Date,Reply) 
		values('$UID', '$date', '$message')";
		
		$result = $conn->query($sql);
	}
}

function addLike($conn){

}

function getComment($conn){
	$sql="SELECT*FROM comments";
	$result = $conn->query($sql);
	while($raw=$result->fetch_assoc()){
		echo"<div class='comm'>".
				$raw['U_ID'].	
				"     At ".$raw['Date']."<br>".	
				$raw['Comment']."<br><br>".
			"</div>";
		echo"<button type=submit>Reply</button>";
		echo"
			<form method='POST' action='".setReply($conn)."'>
				<input type='hidden' name='UID' value='2'>
				<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
				<textarea class='comm' name='message'>Comment youre ideas about this question</textarea>
				<button class='comm' type='submit' name='submitReply'>Reply</button>
			</form>";
	}
	
}

function deletes($conn) {

}
?>