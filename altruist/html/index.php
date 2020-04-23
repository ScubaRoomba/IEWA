<?php 
	define('FROM_INDEX', 1);
	$page = empty($_GET['page']) ? 'home' : $_GET['page'];
	session_start(); 
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>

<?php
	function page_top($page) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Altruist</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/sticky-footer.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/background.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="?page=home">Hello, <?php echo $_SESSION['username']; ?>!</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="?page=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=list">Download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=upload">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?logout='1'">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php
	}

	function page_bottom() {
?>
	</div>

  <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Contact us: alice@larrynet.app</small>
    </div>
  </footer>

<?php
	}
	register_shutdown_function('page_bottom');
	page_top($page);
	if(!(include $page . '.php')) {
		echo 'error: no such page';
	}
?>
</body>
</html>
