<?php
require_once("connection.inc.php");
require_once("session.inc.php");
$loggedIn = $_SESSION['u_id'];
// fetch user details
$sql = "SELECT * FROM user_records WHERE id = '$loggedIn'";
$stmt = mysqli_query($conn, $sql);
while ($rows = $stmt->FETCH_ASSOC()) {
    $id = $rows["id"];
    $firstName = $rows["user_firstName"];
    $lastName = $rows["user_lastName"];
    $email = $rows["user_email"];
}
// check if user is logged in before opening
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
  <link rel="stylesheet" href="../../css/deposit.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <title>Whiteskyventures | User deposits</title>  
</head>
<body class="bg">
  <section>
    <!-- start hero section -->
    <div class="container">
      <div class="row">
        <div class="col-md-5" id="col">
          <i class="fa fa-hand-pointer-o" aria-hidden="true" id="hand-pointer"><strong>step 1</strong></i>
          <h6>copy our wallet address</h6>   
          <p id="bitcoin"></p>
          <p id="eth"></p>
          <p id="usdt"></p>
          <button onclick="document.getElementById('bitcoin').innerHTML = 'Bitcoin: XXXXXXXXXX'" class="btn-btc">Show BTC wallet</button>
          <button onclick="document.getElementById('eth').innerHTML = 'ETH: XXXXXXXXXXXX'" class="btn-eth">Show ETH wallet</button>
          <button onclick="document.getElementById('usdt').innerHTML = 'USDT(TRC20): XXXXXXXXXXX'" class="btn-usdt">Show USDT wallet</button>
        </div>
        <div class="col-md-3" id="col">
          <i class="fa fa-hand-pointer-o" aria-hidden="true" id="hand-pointer"><strong>step 2</strong></i>
          <h6>transfer</h6>
          <p><i>transfer the amount you want to invest to any of our wallets.</i></p>
        </div>
        <div class="col-md-4" id="col">
          <i class="fa fa-hand-pointer-o" aria-hidden="true" id="hand-pointer"><strong>step 3</strong></i>
          <h6>input your details</h6>
          <p><i>fill up the form below and upload a screenshot from the confirmation page provided by your wallet.</i></p>
        </div>
      </div>
    </div>
    <!-- end hero section -->
  </section>
  <!-- article -->
  <div class="container">
    <?php
      echo errorMessage();
echo successMessage();
?>
  </div>
  <article>
    <form action="deposit.inc.php?id=<?= htmlentities($loggedIn); ?>" method="POST" enctype="multipart/form-data">
      <!-- plans section -->
      <div class="container plan_section mt-5">
        <h5>Invest to start earning</h5>
        <div class="selections">
          <p><code>Note: Minimum Investment defers from package plan</code>
            Select from the drop-down list and Click on deposit. 
            <code>Note: ALL PLANS ACCRUALS ARE Percentage Varies</code>
          </p>
          <select name="plan_selection" id="plan">
            <option value="Regular trade">Regular trade - 10% in 2 days ($2000.00 - $10,000.00)</option>
            <option value="Gold trade">Gold trade - 15% in 3 days ($5,000.00 - $150,000.00)</option>
            <option value="Premium trade">Premium trade - 25% in 4 days ($10,000.00 - $200,000.00)</option>
            <!-- <option value="Master trade">Master trade - 85% in 6 Weeks ($50,000.00 - $1,000,000.00)</option> -->
          </select>
        </div>
      </div>
      <!-- payment method -->
      <div class="container payment_method">
        <div class="selections">
          <h5>Payment method</h5>
          <select name="payment_method" id="payment">
            <option value="Bitcoin">Bitcoin</option>
            <option value="Ethereum(ERC20)">Ethereum(ERC20)</option>
            <option value="USDT(TRC20)">USDT(TRC20)</option>
          </select>
        </div>
        <div class="container selections">
          <h5>Amount to be paid</h5>
          <input type="text" name="amount" id="amount" style="border: none; outline: none;">
        </div>
        <div class="container selections">
          <label for="exampleFormControlFile1">Upload screenshot</label><br>
          <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
        </div>
        <div class="container selections">
          <button name="deposit" type="submit" id="process">Deposit</button>
        </div>
      </div>
    </form>
  </article>
  <script>
    // wallet display effect
    //btc, eth, bch button handlers
    $(document).ready(function(){
      $(".btn-btc").click(function(){
        $(".btn-btc").hide(500);
      })
      $(".btn-eth").click(function(){
        $(".btn-eth").hide(500);
      })
      $(".btn-usdt").click(function(){
        $(".btn-usdt").hide(500);
      });
    });
  </script>
  <script src="processBtn.js" type="text/javascript"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>