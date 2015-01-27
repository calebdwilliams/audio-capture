<?php
if (isset($_POST)) {
	// print_r($_POST);
	$mime = $_FILES['greeting']['type'];
	$access_token = 'token';
	$dest = 'https://api.wit.ai/speech';
	$destination = __DIR__ . '/upload/';
	$path = realpath($destination . 'test.wav');
	// echo $path;
	// print_r($_FILES);

	$moved = move_uploaded_file($_FILES['greeting']['tmp_name'], $destination . 'test.wav');

	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $dest,
		CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer $access_token",
			"Accept: application/json",
			"Content-Type: audio/wav"
		),
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => array(
			'file' => '@' . $path
		),
		CURLOPT_RETURNTRANSFER => true
		// CURLOPT_BINARYTRANSFER => true,
	));

	$output = curl_exec($ch);

	if (curl_errno($ch)) {
		print "Error: " . curl_error($ch);
	}

	curl_close($ch);

	// $output = array();
	// foreach($_FILES as $file) {
	// 	$output[key($file)] = current($file);
	// }
	// header('Content-Type: application/json');
	echo json_encode($output);
	// echo $output;
}
?>