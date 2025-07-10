<?php
  require_once('session.inc.php');
  if (!isset($_SESSION['admin_user'])) {
    $_SESSION['succMessage'] = 'Login to continue';
    header('Location: index.php');
    exit();
  } 
  if (isset($_GET['id'])) {
    $searchParam = $_GET['id'];
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
  <link rel="stylesheet" href="dist/output.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/regular.css">
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="src/image/logo.jpg">
  <script src="jquery-3.6.0.js"></script>
  <title> Whiteskyventures Admin</title>
</head>
<body>
  <!-- main -->
  <main>
    <div class="bg-white relative mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:w-[65%]">
      <div class="flex flex-col text-center py-5">
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">Edit Transaction Information</h3>
      </div>
      <!-- fetch credit transactions for edit -->
      <?php
        $sql = "SELECT * FROM plan_in_take WHERE id = '$searchParam'";
          $query = $conn->query($sql);
          while ($row = $query->fetch_assoc()) {
            $id = $row['id'];
            $plan = $row['plan_name'];
            $crypto = $row['plan_payment_method'];
            $amount = $row['plan_amount'];
            $interest = $row['interest_earn'];
            $slip = $row['plan_image'];
            $status = $row['status'];
            $date = $row['date_time'];
            $paid_id = $row['paid_id'];
            
        }
      ?>
      <!-- input field -->
      <form action="edit-transaction.inc.php?id=<?= $searchParam;?>" method="POST">
        <div class="mx-5 space-y-4 grid grid-cols-1 md:grid-cols-2 md:space-y-0">
          <!-- plan input field -->
          <div class="relative md:mr-2">
            <label for="plan">Plan</label>
            <input disabled type="text" id="plan" name="plan" value="<?= htmlentities($plan); ?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- crypto input field -->
          <div class="relative md:ml-2">
            <label for="crypto">Crypto</label>
            <input disabled type="text" id="crypto" name="crypto" value="<?= htmlentities($crypto);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- amount input field -->
          <div class="relative md:mr-2">
            <label for="amount">Amount</label>
            <input disabled type="text" id="amount" name="amount" value="<?= "$" . htmlentities($amount);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- total interest input field -->
          <div class="relative md:ml-2">
            <label for="interest">Interest</label>
            <input disabled type="text" id="interest" name="interest" value="<?= "$" . htmlentities($interest);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- slip -->
          <div class="relative md:ml-2">
            <label for="slip">Slip</label>
            <a href="../app-dashboard/user/upload/<?= htmlentities($slip);?>" target="_blank" id="slip">
              <img src="../app-dashboard/user/upload/<?= htmlentities($slip); ?>" style="max-width: 200px;  max-height:100px">
            </a>
          </div>
          <!-- status -->
          <div class="relative md:ml-2">
            <label for="status">Status</label>
            <input type="text" id="status" name="status" value="<?= htmlentities($status);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- date -->
          <div class="relative md:mr-2">
            <label for="date_time">Date</label>
            <input disabled type="date" id="date_time" name="date_time" value="<?= htmlentities($date);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
        </div>
        <div class="flex mx-5 mt-5 lg:mx-auto lg:w-1/2">
          <button type="submit" name="submit" class="w-[100%] p-2 bg-green-500 text-white font-bold text-lg hover:bg-green-600 rounded-md"><i class="fa fa-check"></i> Update</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>