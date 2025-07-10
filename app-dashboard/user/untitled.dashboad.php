<?php 
  include "../../components/component.inc.php"; 
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
  <!-- <link rel="stylesheet" href="../../css/style.css"> --> 
  <link rel="stylesheet" href="../../css/dashboard.css"> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://use.fontawesome.com/104bd42fc3.js"></script> -->
  <!-- fontawesome -->
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/regular.css">
  <!-- counter timer -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/jquery.countdown.css"> 
  <script type="text/javascript" src="../../js/jquery.plugin.js"></script> 
  <script type="text/javascript" src="../../js/jquery.countdown.js"></script>
  <title>Whiteskyventures | User dashboard</title>     
</head>
<body class="bg">
  <!-- cyrpto price widget -->
  <script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
  <coingecko-coin-price-marquee-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" background-color="#ffffff" locale="en"></coingecko-coin-price-marquee-widget>
  
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
            <li><a href="dashboard.php" class="active text-success"><i class="fa fa-dashboard"></i> dashboard</a></li>
            <li><a href="withdrawal.php?a=withdrawal"><i class="fa fa-wallet"></i> withdraw</a></li>
            <li><a href="history.php?a=transactionhistory"><i class="fa fa-calendar-days"></i> transaction history</a></li>
            <li><a href="request-loan.php?a=request-loan"><i class="fa-brand fa fa-hand-holding-dollar"></i> Request Loan</a></li>
            <li><a href="passwordchange.php?a=changepassword"><i class="fa fa-lock"></i> change password</a></li>
            <!-- logout button -->
            <li>
              <form action="logout.inc.php" method="POST">
                <button name="logout" id="logout" name="logout" class="text-danger"><i class="fa fa-sign-out"></i>Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      <!-- right side contents -->  
      <div class="right_side">
        <div class="row">
          <div class="col-lg-4 mt-3">
            <div class="statistics">
              <h6>statistics</h6>
              <p class="pt-3"><small>Active deposit</small><br><span id="active_deposit">
                <?php 
                  // fetch active deposit
                  $sql = "SELECT * FROM plan_in_take WHERE paid_id = '$loggedIn' AND status = 'pending'";
                  $stmt = mysqli_query($conn, $sql);
                  $sum = 0;
                  while($row = $stmt->FETCH_ASSOC()) {
                    $sum += $row['plan_amount'];
                  }
                  if ($sum != NULL) {
                    echo "$" . htmlentities(number_format($sum, 2));
                  } else {
                    echo "$" . number_format($sum, 2);
                  }
                ?>
              </span></p>
              <p class="pt-3"><small>Total balance</small><br>
                <span id="active_bal">
                  <?php
                    // fetch available balance
                    $sql = "SELECT * FROM plan_in_take WHERE status = 'APPROVED' AND paid_id = '$loggedIn'";
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
                </span>
              </p>
            </div>
          </div>
          <!-- fetch user logged in data -->
          <?php
            $sql = "SELECT * FROM user_records WHERE id = '$loggedIn'";
            $stmt = mysqli_query($conn, $sql);
            while ($row = $stmt->FETCH_ASSOC()) {
              $id = htmlentities($row["id"]);
              $firstName = htmlentities($row["user_firstName"]);
              $lastName = htmlentities($row["user_lastName"]);
              $email = htmlentities($row["user_email"]);
            }
          ?>
          <!-- deposit buttons side -->
          <div class="col-lg-4 mt-3">
            <div class="deposit_buttons">
              <h6 class="total_deposit">
                <?php
                  // fetch total deposit
                  $sql = "SELECT * FROM plan_in_take WHERE paid_id = '$loggedIn'";
                  $stmt = mysqli_query($conn, $sql);
                  $sum = 0;
                  while($row = $stmt->FETCH_ASSOC()) {
                    $sum += $row['plan_amount'];
                  }
                  if ($sum != NULL) {
                    echo "$" . htmlentities(number_format($sum, 2));
                  } else {
                    echo "$" . number_format($sum, 2);
                  }
                ?>
              </h6>
              <h6>total deposit</h6>
              <p class="pt-3"><i class="fa fa-plus fa-xs"></i></p>
              <p class="pt-3"><i class="fa fa-briefcase fa-xs"></i></p><br>
              <a href="deposit.php?a=<?= htmlentities($firstName); ?>" id="deposit">deposit</a>
            </div>
          </div>
          <!-- total interest earned -->
          <div class="col-lg-4 mt-3">
            <div class="total_earned">
              <h6 id="defaultCountdown">
                <!-- fetch total interest earned -->
                <P>
                  <?php
                    $sql = "SELECT * FROM plan_in_take WHERE status = 'APPROVED' AND paid_id = '$loggedIn'";
                    $stmt = $conn->query($sql);
                    $result = $stmt->num_rows;
                    $plan_name = "";
                    $deposit_total = 0;
                    $interestEarned = 0;
                    $percentage = 100;
                    $percent = 0;
                    if ($result > 0) {
                      while ($row = $stmt->FETCH_ASSOC()) {
                        $plan_name = $row['plan_name'];
                        $payment_method = $row['plan_payment_method'];
                        $deposit_total += $row['plan_amount'];
                        $interestEarned = $row['interest_earn'];
                        $deposit_time = $row['date_time'];
                        $current_time = date('Y-m-d H:i:s'); 
                        
                        // calculate the time difference
                        $dateTime1 = new DateTime($deposit_time);
                        $dateTime2 = new DateTime($current_time);
                        $interval = $dateTime1->diff($dateTime2);
                        $minutes =  $interval->i;
                        echo "minutes $minutes";
                        
                        // check if plan name is = regular trade and it has been at least 5 days
                        if ($plan_name == 'Regula trade') {
                          if ($minutes == 1) {
                            $percent = 20;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn'";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2));
                          } elseif ($minutes == 2) {
                            $percent = 20 * 2;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn'";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2));
                          } elseif ($minutes == 3) {
                            $percent = 20 * 3;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn'";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($minutes == 4) { // in 20 days user earns 80%
                            $percent = 20 * 4;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn'";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 25) { // in 25 days user earns 100%
                            $percent = 20 * 5;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 30) { // in 30 days user earns 120%
                            $percent = 20 * 6;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 35) { // in 35 days user earns 140%
                            $percent = 20 * 7;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          }  elseif ($interval->days == 40) { // in 40 days user earns 160%
                            $percent = 20 * 8;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 45) { // in 45 days user earns 180%
                            $percent = 20 * 9;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 50) { // in 50 days user earns 200%
                            $percent = 20 * 10;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 55) { // in 55 days user earns 220%
                            $percent = 20 * 11;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 60) { // in 60 days user earns 240%
                            $percent = 20 * 12;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 65) { // in 65 days user earns 260%
                            $percent = 20 * 13;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 70) { // in 70 days user earns 280%
                            $percent = 20 * 14;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 75) { // in 75 days user earns 300%
                            $percent = 20 * 15;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } elseif ($interval->days == 80) { // in 80 days user earns 320%
                            $percent = 20 * 16;
                            $interestRate = ($percent / $percentage) * $deposit_total;
                            $sql_interest = "UPDATE plan_in_take SET interest_earn = '$interestRate' WHERE paid_id = '$loggedIn' ORDER BY id ASC LIMIT 1";
                            $conn->query($sql_interest);
                            echo "$" . htmlentities(number_format($interestRate, 2)); 
                          } else {
                            echo "$" . number_format($interestEarned, 2) . "<br>";
                            echo "<code>Interest is calculated and returned every 5 days</code>";
                          }
                        } else {
                          if (substr($payment_method, 0, 1) == 'E') {
                            echo "<small style=\"font-size: 10px; \"\>this is $interestEarned</small>";
                          
                          }
                        }
                      }
                    } else {
                      echo 'The columns are empty';
                    } 
                  ?> 
                </P>
              </h6>
              <h6 class="text-capitalize">earned total</h6>
              <!-- <i class="fa fa-home fa-lg"></i> -->
            </div>
          </div>
        </div>
        <!-- crypto statistics pluggin -->
        <div class="row">
          <div class="col-md-8 mt-3">
            <div class="crypto_widget">
              <h5>unique trade count</h5>
              <?php crypto();?>
            </div>
          </div>
          <!-- user account logged in -->
          <div class="col-md-4 mt-3">
            <div class="profile_side">
              <img src="../../image/41.png">
              <p id="user_name"><?= htmlentities($firstName) . " " . htmlentities($lastName);?><br>
                <small style="color: #009688;">Investor</small>
              </p>
              <div class="bots text-center">
                <hr>
                <h5>trading bots running</h5>
                <div class="img_group">
                  <img src="../../image/33.png">
                  <img src="../../image/34.jpg">
                  <img src="../../image/35.jpg">
                  <img src="../../image/36.jpg">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../../page.js"></script>
</body>
</html>