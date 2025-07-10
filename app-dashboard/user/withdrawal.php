<?php require_once("../../components/component.inc.php"); 
  require_once "session.inc.php";
  require_once "connection.inc.php";
  $loggedIn = $_SESSION['u_id'];
  // check whether there is a user logged in before opening
  if (!isset($loggedIn)) {
    $_SESSION["successMessage"] = "Login to contine";
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
  <link rel="icon" type="image/x-icon" href="../../image/logo.png">
  <link rel="stylesheet" href="../../css/withdrawal.css">
  <link rel="stylesheet" href="../../css/dashboard.css"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- fontawesome -->
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/regular.css">
  <!-- <script src="https://use.fontawesome.com/104bd42fc3.js"></script> -->
  <title>Whiteskyventures | User withdrawal</title>     
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
            <li><a href="withdrawal.php?a=withdrawal" class="active text-success"><i class="fa fa-wallet"></i> withdraw</a></li>
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
      <div class="right_side">
        <div class="row">
          <div class="col-md-6 mt-3">
            <div class="statistics shadow-lg">
              <h6>statistics</h6>
              <!-- fetch available balance -->
              <p class="pt-3"><small>Total balance</small><br><span id="active_bal">
                <?php
                  $sql = "SELECT * FROM plan_in_take WHERE plan_status = 'APPROVED' AND paid_id = '$loggedIn'";
                  $stmt = mysqli_query($conn, $sql);
                  $sum = 0;
                  while ($row = mysqli_fetch_array($stmt)) {
                    $sum += $row['plan_amount'];
                  }   
                  if ($sum != NULL) {
                    echo "$" . htmlentities(number_format($sum, 2));
                  } else {
                    echo "$" . number_format($sum, 2);
                  }
                ?>
              </span></p>
            </div>
          </div>
          <!-- bitcoin balance -->
          <div class="col-md-6 mt-3">
            <div class="statistics shadow-lg" id="bitcoin_balance">
              <h6>BTC Balance</h6>
              <!-- fetch bitcoin balance -->
              <p class="pt-3">
                <small>Available bal</small><br>
                <small> 
                  <?php
                    $sql = "SELECT * FROM plan_in_take WHERE paid_id = '$loggedIn' AND plan_payment_method = 'Bitcoin' AND plan_status = 'APPROVED'";
                    $stmt = $conn->query($sql);
                    $sum = 0;
                    while ($row = $stmt->FETCH_ASSOC()) {
                      $sum += $row['plan_amount'];
                    }
                    if ($row !== NULL) {
                      echo "$" . htmlentities(number_format($sum, 2));
                    } else {
                      echo "$" . number_format($sum, 2);
                    }
                  ?>
                </small>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mt-3">
            <div class="statistics shadow-lg">
              <h6>USDT(TRC20) Bal</h6>
              <!-- fetch usdt balance -->
               <p class="pt-3">
                <small>Available bal</small><br>
                <small> 
                  <?php
                    $sql = "SELECT * FROM plan_in_take WHERE paid_id = '$loggedIn' AND plan_payment_method = 'USDT(TRC20)' AND plan_status = 'APPROVED'";
                    $stmt = $conn->query($sql);
                    $sum = 0;
                    while ($row = $stmt->FETCH_ASSOC()) {
                      $sum += $row['plan_amount'];
                    }
                    if ($row !== NULL) {
                      echo "$" . htmlentities(number_format($sum, 2));
                    } else {
                      echo "$" . number_format($sum, 2);
                    }
                  ?>
                </small>
              </p>
            </div>
          </div>
          <div class="col-md-6 mt-3">
            <div class="statistics shadow-lg" id="bitcoin_balance">
              <h6>Eth Balance</h6>
              <!-- fetch ethereum balance -->
              <p class="pt-3">
                <small>Available bal</small><br>
                <small> 
                  <?php
                    $sql = "SELECT * FROM plan_in_take WHERE paid_id = '$loggedIn' AND plan_payment_method = 'Ethereum(ERC20)' AND plan_status = 'APPROVED'";
                    $stmt = $conn->query($sql);
                    $sum = 0;
                    while ($row = $stmt->FETCH_ASSOC()) {
                      $sum += $row['plan_amount'];
                    }
                    if ($row !== NULL) {
                      echo "$" . htmlentities(number_format($sum, 2));
                    } else {
                      echo "$" . number_format($sum, 2);
                    }
                  ?>
                </small>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 mt-5">
            <?php
              echo errorMessage();
              echo successMessage();
            ?>
            <div class="selections">
              <form action="withdrawal.inc.php?id=<?= htmlentities($loggedIn); ?>" method="POST" autocomplete="off">
                <label for="plan">Select plan</label>
                <select name="plan_selection" id="plan">
                  <option value="Regular trade" >Regular trade</option>
                  <option value="Gold trade">Gold trade</option>
                  <option value="Premium trade">Premium trade</option>
                  <!-- <option value="Master trade">Master trade </option> -->
                </select>
                <label id="crypto">Select crypto</label>
                <select name="withdrawal_crypto" id="crypto">
                  <option value="Bitcoin">Bitcoin</option>
                  <option value="Ethereum">Ethereum</option>
                  <option value="USDT(ERC20)">USDT(ERC20)</option>
                </select>
                <label id="amount">Amount</label>
                <input type="text" name="withdrawal_amount" id="amount">
                <label>Input wallet address</label>
                <input type="text" name="wallet_address">
                <button name="submit" id="process">Submit</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../../page.js"></script>
  <script src="processBtn.js"></script>
</body>
</html>