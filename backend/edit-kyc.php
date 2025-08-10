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
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="src/images/logo.PNG">
  <script src="jquery-3.6.0.js"></script>
  <title> Whiteskyventures Admin</title>
</head>
<body>
  <!-- main -->
  <main>
    <div class="bg-white relative mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:w-[65%]">
      <div class="flex flex-col text-center py-5">
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">Edit Kyc Information</h3>
      </div>
      <!-- fetch user kyc for edit -->
      <?php
        $sql = "SELECT * FROM kyc_data WHERE id = '$searchParam'";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    $id = $row['id'];
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $motherName = $row['mother_name'];
    $email = $row['email'];
    $bankStatement = $row['bank_statement'];
    $proof_of_identity = $row['proof_identity'];
    $status = $row['kyc_status'];
    $dateTime = $row['date_time'];
    $kyc_id = $row['kyc_id'];
}
?>
      <!-- input field -->
      <form action="edit-kyc.inc.php?id=<?= $searchParam;?>" method="POST">
        <div class="mx-5 space-y-4 grid grid-cols-1 md:grid-cols-2 md:space-y-0">
          <!-- firstname input field -->
          <div class="relative md:mr-2">
            <label for="firstname">Firstname</label>
            <input disabled type="text" id="firstname" name="firstname" value="<?= htmlentities($firstName); ?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- lastname input field -->
          <div class="relative md:ml-2">
            <label for="lastname">Lastname</label>
            <input disabled type="text" id="lastname" name="lastname" value="<?= htmlentities($lastName);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- mother name input field -->
          <div class="relative md:mr-2">
            <label for="motherName">Mother Name</label>
            <input disabled type="text" id="motherName" name="motherName" value="<?= htmlentities($motherName);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- total email input field -->
          <div class="relative md:ml-2">
            <label for="email">Email</label>
            <input disabled type="text" id="email" name="email" value="<?= htmlentities($email);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- bank statement -->
          <div class="relative md:ml-2">
            <label for="bank_statement">Bank Statement</label>
            <a href="../app-dashboard/user/bankStatement/<?= htmlentities($bankStatement); ?>" target="__blank">
              <img style="max-width: 100px; max-height: 50px;" src="../app-dashboard/user/bankStatement/<?= htmlentities($bankStatement); ?>">
              </a>
          </div>
          <!-- proof of identity -->
          <div class="relative md:ml-2">
            <label for="proof_identity">Proof of Identity</label>
              <a href="../app-dashboard/user/identityFile/<?= htmlentities($proof_of_identity); ?>" target="__blank">
                <img  style="max-width: 100px; max-height: 50px;" src="../app-dashboard/user/identityFile/<?= htmlentities($proof_of_identity); ?>">
              </a>
            </td>
          </div>
          <!-- kyc status -->
          <div class="relative md:mr-2">
            <label for="kyc_status">Kyc Status</label>
            <input type="text" id="kyc_status" name="status" value="<?= htmlentities($status);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- date -->
          <div class="relative md:mr-2">
            <label for="kyc_status">Date</label>
            <input disabled type="text" id="kyc_status" name="kyc_status" value="<?= htmlentities($dateTime);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
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