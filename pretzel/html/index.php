<!DOCTYPE html>
<html lang="en">

 <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>The Meme Archives</title>


  <!-- Bootstrap core CSS (because I barely understand css) -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

</head>

<?php
// I don’t actually know what ‘FROM_INDEX’ is, but it’s used in the tutorials
define('FROM_INDEX', 1);
// this is approaching witchcraft. I’ve no idea how this one-liner grabs, or creates, the url
$page = empty($_GET['page']) ? 'home.php' : $_GET['page'];
function page_top($page) {
?>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="?page=home.php">The Meme Archives</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="?page=home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=upload.php">Upload</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php
}

function page_bottom() {
?>

  <!-- /.container -->
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Non Profit Satire 2019</p><br>
      <p class="m-0 text-center text-white">Contact an Administrator: alice@acme.local</p>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
}
register_shutdown_function('page_bottom');
page_top($page);
if(stripos($page, '../') !== false){
        echo 'error: no such page';
} else {
        if(!(include '/var/www/html/' . $page)){
                echo 'error: no such page';
        }
}
?>

