<div class="container" id="downloads">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="font-weight-light">Downloads</h1>
      <p class="lead">
<?php 
$downloads = glob('downloads/*');
foreach($downloads as $download) {
	$name = substr($download,10);
?>
<a href="<?php echo $download;?>"><?php echo $name;?></a><br>

<?php
}
?>
      </p>
      <p class="lead mb-0">You've reached the end!</p>
    </div>
  </div>
</div>
