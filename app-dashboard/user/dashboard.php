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
  <link rel="icon" type="image/x-icon" href="../../images/logo.PNG">
  <!-- <link rel="stylesheet" href="../../css/style.css"> --> 
  <link rel="stylesheet" href="../../css/dashboard.css"> 
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <!-- counter timer -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
              <p class="pt-3"><small>Active deposit</small><br>
                <span id="active_deposit">
                <?php
                  // fetch active deposit
                  $sql = "SELECT * FROM plan_in_take WHERE paid_id = '$loggedIn' AND plan_status = 'pending'";
                  $stmt = mysqli_query($conn, $sql);
                  $sum = 0;
                  while ($row = $stmt->FETCH_ASSOC()) {
                      $sum += $row['plan_amount'];
                  }
                  if ($sum != null) {
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
                    $sql = "SELECT * FROM plan_in_take WHERE plan_status = 'APPROVED' AND paid_id = '$loggedIn'";
                    $stmt = mysqli_query($conn, $sql);
                    $sum = 0;
                    while ($row = mysqli_fetch_array($stmt)) {
                        $sum += $row['plan_amount'];
                    }
                    if ($sum != null) {
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
        $result = mysqli_query($conn, $sql);
        $sum = 0;
        while ($row = $result->FETCH_ASSOC()) {
            $sum += $row['plan_amount'];
        }

        if ($sum != null) {
            echo "$" . htmlentities(number_format($sum, 2));
        } else {
            echo "$" . htmlentities(number_format($sum, 2));
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
              <h5 id="defaultCountdown">
                <!-- Handle interest earned  -->
                <?php
                  $sql = "SELECT * FROM plan_in_take WHERE plan_status = 'APPROVED' AND paid_id = '$loggedIn'";
                  $result = $conn->query($sql);

                  $plan_name = "";
                  $deposit_total = 0;
                  $interestEarned = 0;
                  $percentage = 100;
                  $percent = 0;

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
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
                      $days =  $interval->days;

                    }

                    // Perform math calculation for interest earned per investment plan
                    $plans = [
                      'Regular trade' => ['interval' => 2, 'percent_per_interval' => 10, 'max_intervals' => 60],
                      'Gold trade' => ['interval' => 3, 'percent_per_interval' => 15, 'max_intervals' => 90],
                      'Premium trade' => ['interval' => 4, 'percent_per_interval' => 25, 'max_intervals' => 120]
                    ];

                    if (!isset($plans[$plan_name])) {
                      echo "$0.00";
                      return;
                    }

                    $plan = $plans[$plan_name];
                    $intervals_completed = floor($days / $plan['interval']);

                    if ($intervals_completed >= 1 && $intervals_completed <= $plan['max_intervals']) {
                      $percent = $plan['percent_per_interval'] * $intervals_completed;
                      $interestRate = ($percent / $percentage) * $deposit_total;

                      $sql_interest = "UPDATE plan_in_take SET interest_earn = ? WHERE paid_id = ? AND plan_status = 'APPROVED' ORDER BY id ASC LIMIT 1";
                      $stmt = $conn->prepare($sql_interest);
                      $stmt->bind_param("di", $interestRate, $loggedIn);
                      $stmt->execute();
                    
                      if ($stmt->affected_rows > 0) {
                        echo "$" . htmlentities(number_format($interestRate, 2));
                      } else {
                        echo "$" . htmlentities(number_format($interestRate, 2));
                      }

                    } else {
                      // Fetch stored intervals if no days interval yet
                      $sql = "SELECT interest_earn FROM plan_in_take WHERE plan_status = 'APPROVED' and paid_id = ? ORDER BY id ASC LIMIT 1";

                      $stmt = $conn->prepare($sql);
                      $stmt->bind_param("i", $loggedIn);
                      $stmt->execute();
                      $result = $stmt->get_result();

                      if ($result && $row = $result->fetch_assoc()) {
                        echo "$" . htmlentities(number_format($row['interest_earn'], 2)) . "<br>";
                        echo "<code>Interest is calculated and returned every {$plan['interval']} days.</code>";
                       
                      } else {
                        echo "No approved plans found.";
                      }
                    }

                  } else {
                    echo '$0.00';
                  }
                ?> 
              </h5>
              <h6 class="text-capitalize text-white">earned total</h6>
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
              <img src="../../images/41.PNG">
              <p id="user_name"><?= htmlentities($firstName) . " " . htmlentities($lastName);?><br>
                <small style="color: #009688;">Investor</small>
              </p>
              <div class="bots text-center">
                <hr>
                <h5>trading bots running</h5>
                <div class="img_group">
                  <img src="../../images/33.PNG" alt="First trader">
                  <img src="../../images/34.jpg" alt="Second trader">
                  <img src="../../images/35.jpg" alt="Third trader">
                  <img src="../../images/36.jpg" alt="Fourth trader">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../../page.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>