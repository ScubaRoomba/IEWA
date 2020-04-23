<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Altruist - Login</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/login-page.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <p><?php include('errors.php'); ?></p>
            <form class="form-signin" method="POST" action="login.php">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                <label for="username">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">  <!-- lmao, doesn't do anything -->
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-signin btn-block text-uppercase" type="submit" name="login_user">Sign in</button>
              <hr class="my-4">
            </form>
            <form class="form-signin" action="register.php">
              <input type="submit" class="btn btn-lg btn-register btn-block text-uppercase" value="Register">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
