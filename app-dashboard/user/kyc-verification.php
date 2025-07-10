<?php
  require_once('session.inc.php');
  $loggedInId = $_SESSION['u_id'];
  if (!isset($loggedInId)) {
    $_SESSION["successMessage"] = "Login to contine";
    header("Location: login.php");
    exit();
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/dashboard.css"> 
  <link rel="stylesheet" href="../../css/loan.css"> 
  <!-- bootstrap plugins -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- fontawesome -->
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/regular.css">
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="../../image/logo.png">
  <title>Whiteskyventures | Kyc-verification</title>
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
            <li><a href="passwordchange.php?a=changepassword"><i class="fa fa-lock"></i> change password</a></li>
            <!-- logout button -->
            <li>
              <form action="logout.inc.php" method="POST">
                <button name="logout" id="logout" name="logout" class="text-danger"><i class="fa fa-sign-out"></i>Logout
              </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      <!-- right side contents -->  
      <div class="right_side row pb-4">
        <div class="col-md-8">
          <!-- error and success message -->
          <div class="pt-2">
            <?php
              echo errorMessage();
              echo successMessage();
            ?>
          </div>
          <form action="kycVerification.inc.php?id=<?= htmlentities($loggedInId); ?>" method="POST" enctype="multipart/form-data">
            <div> 
              <h3 class="text-secondary pt-5 font-extrabold text-capitalize d-flex justify-content-center">Please provide your valid information</h3>
            </div>
            <!-- firstname input field -->
            <div class="d-flex justify-content-center flex-column w-100 pt-4">
              <label for="firstname">First Name</label>
              <input type="text" id="firstname" name="firstname" autocomplete="on" class="p-2">
            </div>
            <!-- lastname input field -->
            <div class="d-flex justify-content-center flex-column w-100 pt-4">
              <label for="lastname">Last Name</label>
              <input type="text" id="lastname" name="lastname" autocomplete="on" class="p-2">
            </div>
            <!-- mother name input field -->
            <div class="d-flex justify-content-center flex-column w-100 pt-4">
              <label for="mother_name">Mother's Maiden Name</label>
              <input type="text" id="mother_name" name="mother_name" autocomplete="on" class="p-2">
            </div>
            <!-- email input field -->
            <div class="d-flex justify-content-center flex-column w-100 pt-4">
              <label for="email">Email</label>
              <input type="text" placeholder="example@gmail.com" id="email" name="email" autocomplete="on" class="p-2">
            </div>
            <!-- bank statement input field -->
            <div class="d-flex justify-content-center flex-column w-100 pt-4">
              <label for="bank_statement">Bank Account Statement</label>
              <input type="file" id="bank_statement" name="bank_statement" class="p-2">
            </div>
            <!-- proof of identity input field -->
            <div class="d-flex justify-content-center flex-column w-100 pt-4">
              <label for="identity">Proof of Identity</label>
              <input type="file" id="identity" name="identity" class="p-2">
            </div>
            <div class="d-flex justify-content-center flex-column w-100 pt-4">
              <button type="submit" id="process" name="submit" class="p-2 text-white font-weight-bold border-0">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="processBtn.js" type="text/javascript"></script>
  <script src="../../page.js" type="text/javascript"></script>
</body>
</html>