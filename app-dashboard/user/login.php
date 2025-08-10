<?php
require_once("session.inc.php");
require_once("connection.inc.php");
if (isset($_SESSION['u_id'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Language" content="en" />
    <meta name="Author" content="bitcoin, ethereum, usdt" />
    <meta name="description" content="investments, investment sites, investment companies" />
    <meta name="keywords" content="best sites to invest, bitcoin investment sites, bitcoin investment companies" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="../../images/logo.PNG">
    <link rel="stylesheet" href="../../css/login.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://use.fontawesome.com/104bd42fc3.js"></script>
    <title>Whiteskyventures | Login</title>
</head>
<body>
  <div class="container">
    <div class="login-box">
      <h2>Login Here</h2>
      <div class="message_display text-center">
        <?php echo errorMessage();
echo successMessage();
?>
      </div>
      <form action="login.inc.php" method="POST" autocomplete="on">
        <div class="form-group">
          <i class="fa fa-user"></i><input type="text" name="email_fName" placeholder="First Name/Email Address">
        </div><br>
        <div class="form-group">
          <i class="fa fa-lock"></i><input type="password" name="pwd" placeholder="Password">
        </div><br>
        <button type="submit" name="submit" class="btn btn-success">Login</button>
      </form>
      <div class="new_member">
        <p>Don't have an account?<a href="register.php"> Register</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>