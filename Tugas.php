<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container my-5">
      <div class="row justify-content-center align-items-center">
        <div class="card col-sm-6">
          <form action="proses_login_os.php" method="post">
            <div class="card-header">
              <h3>Login</h3>
            </div>
            <div class="card-body">
              <?php if (isset($_SESSION["message"])): ?>
                <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
                  <?php echo $_SESSION["message"]["message"]; ?>
                  <?php unset($_SESSION["message"]); ?>
                </div>
              <?php endif; ?>
              <input type="text" name="username" class="form-control" placeholder="Username" required>
              <br>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <br>
              <button type="submit" class="btn btn-success btn-block">
                LOGIN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
