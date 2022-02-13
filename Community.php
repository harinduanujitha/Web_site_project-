<?php
	date_default_timezone_set('Asia/Colombo');
	include 'Dtbs.php';
	include 'Functions.php';
?>
<!DOCTYPE html>
<html>
	<Head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="Community style.css">
		<title>
			Comment section test
		</title>
		
	</Head>
	<body>
	<?php
	echo"
		<div class='comm1'>
			<form method='POST' action='".setComment($conn)."'>
				<input type='hidden' name='UID' value='2'>
				<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
				<textarea class='comm' name='message'></textarea>
				<button class='comm' type='submit' name='submitComment'>Comment</button>
			</form>
		</div>";
	echo
	"<br><br>
	<div class='comm2'>
	<form method='POST' action='".ctrlComment($conn)."'>
		<label for='CommNo'>Enter the comment Number you wish to intaract with</label>
		<input type=text name='CommNo'><br><hr>
		<input type='hidden' name='UID' value='1'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
		<textarea class='comm' name='reply'>Comment youre ideas about this question</textarea>
		".
		//set a reply
		"
		<br>
		<button class='comm' type='submit' name='submitReply'>Reply</button>
		".
		//get the replies
		"
		<button class='comm' type='submit' name='getReply'>See Replies</button>
		".
		//add a like
		"
		<br><hr>
		<button class='comm' type='submit' name='Like'>UpVote</button>
		".
		// add a dislike
		"
		<button class='comm' type='submit' name='Disike'>DownVote</button>
	</form>
	</div>
	<hr><hr><hr>";

	getComment($conn)
	//add a like to comment
	/*echo
	"
	<form method='POST' action='".addLike($conn)."'>
		<label for='CommNo'>Enter the comment Number you wish to add a vote</label>
		<input type=text name='CommNo'>
		<button class='comm' type='submit' name='Like'>UpVote</button>
	</form>";
	//add a dislke to comment
	echo
	"
	<form method='POST' action='".addLike($conn)."'>
		<label for='CommNo'>Enter the comment Number you wish to add a vote</label>
		<input type=text name='CommNo'>
		<button class='comm' type='submit' name='Disike'>DownVote</button>
	</form>";
	getComment($conn)*/
	?>
	</body>
</html>