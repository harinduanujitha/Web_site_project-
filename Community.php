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
		<div class='comm'>
		<form method='POST' action='".setComment($conn)."'>
		<input type='hidden' name='UID' value='anonymous'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
		<textarea class='comm' name='message'></textarea>
		<button class='comm' type='submit' name='submitComment'>Ask Question</button>
		</form>
		</div>";
	getComment($conn)
	?>
	</body>
</html>