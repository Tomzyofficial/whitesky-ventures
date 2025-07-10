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
    <link rel="icon" type="image/x-icon" href="../../image/logo.png">
    <link rel="stylesheet" href="../../css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/104bd42fc3.js"></script>
    <title>Whiteskyventures | Register</title>
</head>
<body>
    <div class="container">
        <div class="signup-box">
            <h2>Register Here</h2>
            <div class="message_display text-center">
                <?php echo errorMessage();
                    echo successMessage();
                ?>
            </div>
            <form action="register.inc.php" method="POST" autocomplete="on">
                <div class="form-group">
                    <i class="fa fa-user"></i><input type="text" name="firstName" placeholder="First Name">
                </div><br>
                <div class="form-group">
                    <i class="fa fa-user"></i><input type="text" name="lastName" placeholder="Last Name">
                </div><br>
            
                <div class="form-group">
                <i class="fa fa-envelope"></i><input type="email" name="email" placeholder="Email Address">
                </div><br>
                <div class="form-group">
                    <i class="fa fa-lock"></i><input type="password" name="pwd" placeholder="Password">
                </div><br>
                <div class="form-group">
                    <i class="fa fa-lock"></i><input type="password" name="confirmPwd" placeholder="Confirm password">
                </div><br>
                <button type="submit" name="submit" class="btn btn-success">Register</button>
            </form>
            <div class="already_member">
                <p>Already have an account?<a href="login.php"> Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>