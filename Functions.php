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

function ctrlComment($conn){
	if(isset($_POST['submitReply'])){
		$UID = $_POST['UID'];
		$CommNo=$_POST['CommNo'];
		$date = $_POST['date'];
		$message = $_POST['reply'];

		$sql = "INSERT INTO reply(Comm_No,U_ID,Date,Reply) 
		values('$CommNo','$UID','$date','$message')"; 
		
		$result = $conn->query($sql);
		
	}
	if(isset($_POST['Like'])){
		$CommNo=$_POST['CommNo'];

		$sql="UPDATE comments SET Likes = Likes + 1 WHERE Comm_No= '$CommNo'";
		
		$result = $conn->query($sql);
	}
	if(isset($_POST['Dislike'])){
		$CommNo=$_POST['CommNo'];
		
		$sql="UPDATE comments SET Dislikes = Dislikes + 1 WHERE Comm_No= '$CommNo'";

		$result = $conn->query($sql);
	}
	if(isset($_POST['getReply'])){
		$CommNo=$_POST['CommNo'];

		$sql="	SELECT *
				FROM reply
				WHERE Comm_No='$CommNo'";
				/*LEFT JOIN users 
				ON
    			reply.U_ID=users.U_ID*/
	
		$result = $conn->query($sql);

		//display replies

		echo"
		<div class='stick2'>
		<h4>Replies</h4><hr class='comm'>
		";
		while($raw=$result->fetch_assoc()){
			echo
				$raw['U_ID'].	
				"     replied at ".$raw['Date']."<br>".
				"Comment Number:-"
				.$raw['Comm_No']."<br>".
				"<div class='comm'>".		
					$raw['Reply']."<br><br>".
				"</div><hr class='comm'>";
		}
		echo"</div>";
	}
}

function getComment($conn){
	$sql="	SELECT comments.*, users.U_Name
			FROM comments
			INNER JOIN users 
			ON
    		comments.U_ID=users.U_ID
			ORDER BY Likes DESC";
	
	$result = $conn->query($sql);
	while($raw=$result->fetch_assoc()){
		echo
			"<div class='comm'>".
				$raw['U_Name'].	
				"     Commented at ".$raw['Date']."<br>".
				"Comment Number:-"
				.$raw['Comm_No']."<br>
			</div>".		
				$raw['Comment']."<br><br>
			<br>".
			"<div class='comm'><pre>likes ".$raw['Likes']."     Dislikes <?pre>".$raw['Dislikes']."</div><hr class='comm'><br>";
		//identify comment for the reply
		$thisComment=$raw['Comm_No'];	
	}
}
//function currently not in use
function getReply($conn){

	$sql="SELECT*FROM reply WHERE Comm_No='$comm_No'";
	
	$result = $conn->query($sql);
	echo"
	<div class=comm2>
	<h4>Replies</h4>
	";
	while($raw=$result->fetch_assoc()){
		echo
			$raw['U_ID'].	
			"     Wrote at ".$raw['Date']."<br>".
			"Comment Number:-"
			.$raw['Comm_No']."<br>".
			"<div class='comm'>".		
				$raw['Comment']."<br>".
			"</div><hr><hr>";
	}

	echo"</div>";
}

function setTeam($conn){
	
}
?>