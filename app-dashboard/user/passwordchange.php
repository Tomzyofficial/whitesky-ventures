<?php
require_once "session.inc.php";
require_once "connection.inc.php";
$loggedIn = $_SESSION['u_id'];
// check whether there is a user logged in before opening
if (!isset($loggedIn)) {
    $_SESSION["successMessage"] = "Login to continue";
    header("Location: login.php");
    exit();
}
?>
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
  <link rel="stylesheet" href="../../css/dashboard.css">
  <!-- bootstrap plugins -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <title>Whiteskyventures | User password change</title>     
  <style>
    .main_wrapper .left_side {height: 100vh;}
    .password_group{
      float: right;
      background-image: linear-gradient(to left, #6b7764 0%, #2f384f 100%); 
      border-radius: 10px;
      padding: 50px 20px;
      margin-top: 5%;
      width: 80%;
    }
    input{
      width: 80%;
      padding: 10px;
      border-radius: 10px;
      outline: none;
      border: none;
      color: #009688;
    }
    /* media query */
    @media screen and (max-width: 991px) {
      .password_group{
          transform: translateY(20%);
          width: 100%;
      }
      .password_group input{width: 100%;}
    }
  </style>
</head>
<body class="bg">
  <!-- body first section -->
  <section>
    <div class="contents">
      <!-- left side navbar -->
      <div class="main_wrapper text-wrap">
        <div class="left_side">
          <!-- nav icon -->
          <div class="menu-btn-burger">
            <div class="menu-icon"></div>
          </div>
          <ul class="nav-links">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li><a href="withdrawal.php?a=withdrawal"><i class="fa fa-wallet"></i> withdraw</a></li>
            <li><a href="history.php?a=transactionhistory"><i class="fa fa-calendar-days"></i> transaction history</a></li>
            <li><a href="request-loan.php?a=request-loan"><i class="fa-brand fa fa-hand-holding-dollar"></i> Request Loan</a></li>
            <li><a href="passwordchange.php?a=changepassword" class="active text-success"><i class="fa fa-lock"></i> change password</a></li>
            <!-- logout button -->
            <li>
              <form action="logout.inc.php" method="POST">
              <button name="logout" id="logout" name="logout" class="text-danger"><i class="fa fa-sign-out"></i>Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      <div class="row text-center">
        <div class="container password_group">
          <?php
            echo errorMessage();
echo successMessage();
?>
          <form action="password.inc.php?id=<?= htmlentities($loggedIn); ?>" method="POST" autocomplete="off">
            <div class="form-group">
              <input type="password" name="pwd" placeholder="Old password">
            </div><br>
            <div class="form-group">
              <input type="password" name="new_pwd" placeholder="New password" min="6">
            </div><br>
            <div class="form-group">
              <input type="password" name="confirmPwd" placeholder="Confirm password" min="6">
            </div><br>
            <button type="submit" name="update" class="btn btn-success btn-lg">Update</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="../../page.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>