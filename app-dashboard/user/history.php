<?php  
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
  <!-- fontawesome -->
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/regular.css">
  <!-- <script src="https://use.fontawesome.com/104bd42fc3.js"></script> -->
  <title>Whiteskyventures | User transaction history</title>  
  <style>
    .statistics {
      background-image: url(' https://accounts.choicehorizone.com/assets/templates/basic/images/elements/card-bg.png ');
      width: 100%;
      height: 100%;
    }
    select{
      border: 1 px solid #1b2e4b; color: #009688; font-size: 15px; padding: 8px 10px;
      letter-spacing: 1px; height: calc(1.4em + 1.4rem + 2px); width: 100%;
      border-radius: 6px; background-color: #1b2e4b;
    }
    #btn_search{
      background-color: #1b2e4b;
      padding: 10px 10px;
      color: #009688;
      margin-top: 10px;
      border: 1px solid #1b2e4b;
      width: 30%;
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
            <li><a href="history.php?a=transactionhistory" class="active text-success"><i class="fa fa-calendar-days"></i> transaction history</a></li>
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
          <div class="col-md-6 mt-3">
            <div class="statistics">
              <h6>statistics</h6>
              <!-- fetch total balance -->
              <p class="pt-3"><small>Total balance</small><br><span id="active_bal">
                <?php
                  $sql = "SELECT * FROM plan_in_take WHERE plan_status = 'APPROVED' AND paid_id = '$loggedIn'";
                  $stmt = mysqli_query($conn, $sql);
                  $sum = 0;
                  while ($row = mysqli_fetch_array($stmt)) {
                    $planName = $row['plan_name'];
                    $planPayment = $row['plan_payment_method'];
                    $sum += $row['plan_amount'];
                  }   
                  if ($sum != NULL) {
                    echo "$" . htmlentities($sum);
                  } else {
                    echo "$0.00";
                  }
                ?>
              </span></p>
            </div>
          </div>
        </div>
        <!-- searches -->
        <div class="end-wrapper mt-5 text-light" >
          <form action="history.php?id=<?= htmlentities($loggedIn); ?>" method="GET">
            <div class="row text-wrap">
              <h5>history</h5>
              <div class="col-sm-6 mt-3">
                <select name="search">
                  <option value="All transaction">All transaction</option>
                  <option value="Deposit">Deposit</option>
                  <option value="Withdrawal">Withdrawal</option>
                  <!-- <option value="Earnings">Earnings</option> -->
                </select>
              </div>
              <div class="col-sm-6 mt-3">
                <select name="search">
                  <option value="All currencies">All currencies</option>
                  <option value="USDT(ERC20)">USDT(ERC20)</option>
                  <option value="Bitcoin">Bitcoin</option>
                  <option value="Ethereum">Ethereum</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button type="submit" name="searchresult" id="btn_search">Go</button>
              </div>
            </div>
          </form>
          <!-- display search result -->
          <div class="row mt-5 table-responsive">
            <div class="col">
              <table class="table table-striped table-sm text-white">
                <caption>Transaction record</caption>
                <thead>
                  <tr>
                    <th>Plan</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Slip</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if (isset($_GET['searchresult'])) {
                      $get = $_GET['search'];
                      $sql = "SELECT * FROM plan_in_take WHERE paid_id = '$loggedIn'";
                      $stmt = $conn->query($sql);
                      while ($row = $stmt->FETCH_ASSOC()) {
                        $planName = $row['plan_name'];
                        $planPayment = $row['plan_payment_method'];
                        $planAmount = $row['plan_amount'];
                        $planImage = $row['plan_image'];
                        $status = $row['plan_status'];
                        $dateTime = $row['date_time'];
                  ?>
                  <tr>
                    <td class="text-white"><?= htmlentities($planName);?></td>
                    <td class="text-white"><?= htmlentities($planPayment);?></td>
                    <td class="text-white"><?= "$" . htmlentities($planAmount);?></td>
                    <td class="text-white"><img src="upload/<?= htmlentities($planImage);?>" class="img-fluid" style="max-height: 180px; width: 50px"></td>
                    <td class="text-white"><?= htmlentities($status);?></td>
                    <td class="text-white"><?=  htmlentities($dateTime);?></td>
                  </tr>
                </tbody>
                <?php } }  ?> 

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../../page.js"></script>
</body>
</html>