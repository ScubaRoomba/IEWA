<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Poison</title>
</head>
<body>
<?php
define('FROM_INDEX', 1);
$page = empty($_GET['page'])?'home.php':$_GET['page'];
function page_top($page){
?>
  <h1>Welcome to Poison!</h1>
  <nav>
    <ul>
    <li><a href="?page=home.php">Home</a></li>
    <li><a href="?page=about.php">About</a></li>
    <li><a href="?page=contact.php">Contact Us</a></li>
    </ul>
  <p>Below this line is the PHP include statement</p>
  <p>____________________________________________</p>
<?php
}

function page_bottom(){
?>
  <p>____________________________________________</p>
  <p></p>
  <p>Above this line is the PHP include statement</p>
  <a href="?page=reset.php">Reset Apache Logs</a>
</body>
</html>

<?php
}
register_shutdown_function('page_bottom');
page_top($page);
if(!(include $page))
	echo ('error: no such page');
?>