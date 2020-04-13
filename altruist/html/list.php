  <div id="downloads">
<?php 
$downloads = glob('downloads/*');
foreach($downloads as $download) {
	$name = substr($download,10);
?>
<a href="<?php echo $download;?>"><?php echo $name;?></a><br>

<?php
}
?>
  </div>