<?php

$uploaded_file = $uploaded_file_name = $uploaded_file_content = $uploaded_file_type = "";
$target_dir = "downloads/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$uploaded_file_name = $_FILES["uploaded_file"]["name"];
	$uploaded_file_temp = $_FILES["uploaded_file"]["tmp_name"];
	$uploaded_file = $target_dir . $uploaded_file_name;
	$uploaded_file_content = $_FILES["uploaded_file"]["type"];
	$uploaded_file_type = exec("file $uploaded_file_temp");
	$uploaded_file_extension = substr($uploaded_file_name, -4);
	
//file checking
	$fails = 0;
	//case-sensitivity
	if ((strpos($uploaded_file_name, '.php') !== false) OR (strpos($uploaded_file_type, '.phtml') !== false)) {
		$fails += 1;
		echo 'Case-Sensitive ".php" extension, or variation, check failed.<br>';
	}
	//name-variations
	if (substr(strtolower($uploaded_file_name), -4) == ".php") {
		$fails += 1;
		echo 'Case-Insensitive ".php" extension check failed.<br>';
	}
	//content-type
	if (in_array($uploaded_file_content, array('text/php','text/x-php','application/php','application/x-php','application/x-httpd-php','application/x-httpd-php-source'))) {
		$fails += 1;
		echo 'Content-Type check failed.<br>';
	}
	//magic-bytes
	if ((strpos($uploaded_file_type, 'PHP') !== false) OR (strpos($uploaded_file_type, 'HTML') !== false)) {
		$fails += 1;
		echo 'Magic-Byte check failed.<br>';
	}
	
//uploads the file
	if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $uploaded_file)) {
		echo '<h2>Your file was successfully uploaded!</h2><br><p>Your file failed ',$fails,' of 4 file checks.</p>';
	} else {
		echo '<h2>An unexpected error has occured.</h2>';
	}
}
else {

?>
  <p>Select a file for upload, then click "Submit"!</p>
  <form action="?page=upload" method="POST" enctype="multipart/form-data">
    <input type="file" name="uploaded_file"/>
    <input type="submit" name="submit" value="Submit"/>
  </form>

<?php
}
?>