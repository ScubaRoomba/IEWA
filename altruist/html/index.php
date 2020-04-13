<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Traverse</title>
</head>
<body>
<?php
define('FROM_INDEX', 1);
$page = empty($_GET['page']) ? 'home' : $_GET['page'];
function page_top($page) {
?>
  <h1>Simple File Sharing Site</h1>
  <nav>
    <ul>
    <li><a href="?page=home">Home</a></li>
    <li><a href="?page=list">Download Files</a></li>
    <li><a href="?page=upload">Upload Files</a></li>
    </ul>
  <p>____________________________________________</p>
<?php
}

function page_bottom() {
?>
  <p>____________________________________________</p>
  <br>
  <p>Contact us: alice@acme.local</p>
</body>
</html>

<?php
}
register_shutdown_function('page_bottom');
page_top($page);
if(!(include $page . '.php'))
    echo 'error: no such page';
?>

