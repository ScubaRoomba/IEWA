<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Altruist - Register</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/login-page.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <p><?php include('errors.php'); ?></p>
            <form class="form-signin" method="POST" action="register.php">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                <label for="username">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password_1" name="password_1" class="form-control" placeholder="Password" required>
                <label for="password_1">Password</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="password_2" name="password_2" class="form-control" placeholder="Confirm Password" required>
                <label for="password_2">Confirm Password</label>
              </div>

              <button class="btn btn-lg btn-register btn-block text-uppercase" type="submit" name="reg_user">Register</button>
              <hr class="my-4">
            </form>
            <form class="form-signin" action="login.php">
              <input type="submit" class="btn btn-lg btn-signin btn-block text-uppercase" value="Sign In">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
