<div class="container" id="downloads">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <p class="lead">
<div class="container">
	<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Welcome!</h1>
		<p class="lead">Here you can upload and download files, and share them with your friends!</p>
		<p>Currently, we have
<?php
$count = 0;
$files = glob('downloads/*');
foreach($files as $file) {
	$count += 1;	
}
echo $count;
?> files for download!</p>
	</div>
	</div>
</div>
      </p>
    </div>
  </div>
</div>
