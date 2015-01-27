<!DOCTYPE html>
<?php
if (isset($_POST['submit'])) {
	echo $_POST;
	echo $_FILES;
}
?>
<html>
<head>
<title>Test audio</title>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="audioGrab.js" type="text/javascript"></script>
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data" id="form">
	<button id="audio" class="btn btn-default">Record</button>
	<button id="stop" style="display: none">Stop</button>
	<input type="file" id="file" name="file">
	<input type="file" accept="audio/*;capture=microphone" id="audioFile"> 
	<input type="submit" name="submit" value="submit">
</form>
<div id="output"></div>
<video controls class="video" id="video"></video>
</body>
</html>