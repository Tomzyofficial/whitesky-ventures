<?php
  require_once('session.inc.php');
  $loggedInId = $_SESSION['u_id'];
  if (!isset($loggedInId)) {
    $_SESSION["successMessage"] = "Login to contine";
    header("Location: login.php");
    exit();
  } 
  // check if kyc status is approved
  $sql = "SELECT * FROM kyc_data WHERE kyc_status = 'APPROVED' AND kyc_id = '$loggedInId'";
  $stmt = $conn->query($sql);
  $result = $stmt->fetch_assoc();
  if (!$result) {
    header('Location: kyc-verification.php');
    exist();
  } 

  // Here you will have to send an email to user to let them know that their kyc has been approved;
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
<body style="background-image: url('../../image/deposit_bg.PNG'); background-size: 100% 100%;">
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
            <li><a href="request-loan.php?a=request-loan" class="active text-success"><i class="fa-brand fa fa-hand-holding-dollar"></i> Request Loan</a></li>
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
        <div class="col-md-8 mt-5">
          <form action="request-loan.inc.php?id=<?= htmlentities($loggedInId); ?>" method="POST">
            <!-- error and success message -->
            <div class="pt-2">
              <?php
                echo errorMessage();
                echo successMessage();
              ?>
            </div>
            <div>
              <label for="typeOfLoan">Type of loan<span class="text-warning">*</span></label><br>
              <select name="typeOfLoan" autocomplete="off" id="typeOfLoan" class="pl-3 w-100 p-2 bg-light">
                <option disabled selected>Choose one</option>
                <option value="Short term">Short term</option>
                <option value="Long term">Long term</option>
              </select>
            </div>
            <div>
              <label for="duration">Duration<span class="text-warning">*</span></label><br>
              <select name="duration" autocomplete="off" id="duration" class="pl-3 w-100 p-2 bg-light">
                <option disabled selected>Choose one</option>
                <option value="Two months">2 Months</option>
                <option value="Four months">4 Months</option>
                <option value="Six months">6 Months</option>
              </select>
            </div>
            <div>
              <label for="crypto">Cryptocurrency<span class="text-warning">*</span></label><br>
              <select name="crypto" autocomplete="off" id="crypto" class="pl-3 w-100 p-2 bg-light">
                <option disabled selected>Choose one</option>
                <option value="Two months">Bitcoin</option>
                <option value="Four months">USDT (ERC 20)</option>
                <option value="Six months">Ethereum (TRC20)</option>
              </select>
            </div>
            <div>
              <label for="amount">Amount in USD<span class="text-warning">*</span></label>
              <input type="text" name="amount" autocomplete="off" class="pl-3 w-100 p-2 bg-light">
            </div>
            <div>
              <label for="purpose">Purpose<span class="text-warning">*</span></label><br>
              <textarea name="purpose" autocomplete="on" id="purpose" placeholder="Purpose for loan"  class="pl-3 w-100 p-2 bg-light"></textarea>
            </div> 
            <div class="d-flex justify-content-center flex-column w-100 pt-4"> 
              <button type="submit" name="submit" class="p-2 text-white font-weight-bold border-0" id="process">Submit</button>
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