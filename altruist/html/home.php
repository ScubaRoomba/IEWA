  <h2>Welcome!</h2>
  <p>Here you can upload and download files, and share them with your friends!</p>
  <p>Currently, we have
<?php
$count = 0;
$files = glob('downloads/*');
foreach($files as $file) {
	$count += 1;	
}
echo $count;
?> files for download!</p>