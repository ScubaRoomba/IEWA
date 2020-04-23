<div class="container" id="downloads">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="font-weight-light">Upload</h1>
      <p class="lead">
<?php
//Updated to be less verbose
$uploaded_file = $uploaded_file_name = $uploaded_file_content = $uploaded_file_type = "";
$target_dir = "downloads/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$uploaded_file_name = $_FILES["uploaded_file"]["name"];
	$uploaded_file_temp = $_FILES["uploaded_file"]["tmp_name"];
	$uploaded_file = $target_dir . $uploaded_file_name;
	//$uploaded_file_type = exec("file $uploaded_file_temp");
	
	//file checking
	//All of these comments and legacy code... Just in case I ever want to return old functionality. 
	$fails = 0;
	//case-sensitivity
	//if ((strpos($uploaded_file_name, '.php') !== false) OR (strpos($uploaded_file_type, '.phtml') !== false)) {
	//	$fails += 1;
	//	echo 'Case-Sensitive ".php" extension, or variation, check failed.<br>';
	//}
	//name-variations
	if (substr(strtolower($uploaded_file_name), -4) == ".php") {
		$fails += 1;
	//	echo 'Case-Insensitive ".php" extension check failed.<br>';
	}
	//content-type
	if (in_array(mime_content_type("$uploaded_file"), array('text/php','text/x-php','application/php','application/x-php','application/x-httpd-php','application/x-httpd-php-source'))) {
		$fails += 1;
	//	echo 'Content-Type check failed.<br>';
	}
	//magic-bytes
	//if ((strpos($uploaded_file_type, 'PHP') !== false) OR (strpos($uploaded_file_type, 'HTML') !== false)) {
	//	$fails += 1;
	//	echo 'Magic-Byte check failed.<br>';
	//}
	
	//uploads the file
	if ($fails == 0) {
		if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $uploaded_file)) {
			echo '<h2>Your file was successfully uploaded!</h2>';
		} else {
			echo '<h2>An unexpected error has occured.</h2>';
		}
	} else {
		echo '<p>',$uploaded_file_name,' appears to be malicious. Upload not permitted.</p>';
	}
}

else {

?>

  <p>Select a file to upload, then click "Submit"!</p>
  <form action="?page=upload" method="POST" enctype="multipart/form-data">
    <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="uploaded_file" name="uploaded_file">
      <label class="custom-file-label" for="uploaded_file">Choose file</label>
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php
}
//Congrats, you checked the source code.
?>
      </p>
    </div>
  </div>
</div>
