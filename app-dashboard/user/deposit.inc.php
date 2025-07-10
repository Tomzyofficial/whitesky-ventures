<?php
  // nodemailer
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require "PHPMailer/src/Exception.php";
  require "PHPMailer/src/PHPMailer.php";
  require "PHPMailer/src/SMTP.php";



  require_once 'session.inc.php';
  require_once 'connection.inc.php';
  if (isset($_POST['deposit'])) {
    $loggedIn = $_SESSION['u_id'];
    $plan_name = filter_input(INPUT_POST, 'plan_selection', FILTER_SANITIZE_STRING);
    $payment_method = filter_input(INPUT_POST, 'payment_method', FILTER_SANITIZE_STRING);
    $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
    $fileUpload = mysqli_real_escape_string ($conn, $_FILES["file"]["name"]);
    $target = "upload/".basename($_FILES["file"]['name']);
    date_default_timezone_set('UTC');
    $time = time();
    $dateTime = date('Y-m-d H:i:s', $time);
  
    if (empty($_FILES["file"]["name"])) {
      $_SESSION["errorMessage"] = "Please upload your transaction screenshot";
      header("Location: deposit.php");
      exit();
    } elseif (($plan_name === "Regular trade") && ($amount < 2000)) {
      $_SESSION["errorMessage"] = "Minimum investment for this plan is $2000";
      header("Location: deposit.php");
      exit();
    } elseif (($plan_name === "Gold trade") && ($amount < 5000)) {
      $_SESSION["errorMessage"] = "Minimum investment for this plan is $5000";
      header("Location: deposit.php");
      exit();
    } elseif (($plan_name === "Premium trade") && ($amount < 10000)) {
      $_SESSION["errorMessage"] = "Minimum investment for this plan is $10000";
      header("Location: deposit.php");
      exit();
    } elseif (($plan_name === "Master trade") && ($amount < 50000)) {
      $_SESSION["errorMessage"] = "Minimum investment for this plan is $50000";
      header("Location: deposit.php");
      exit();
    } elseif (!is_numeric($amount)) {
      $_SESSION["errorMessage"] = "You have entered a wrong amount value";
      header("Location: deposit.php");
      exit();
    } else {
      try {
      
        // send email to user to notify them of their deposit
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'mail.privateemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alert@blueseedfinance.com';
        $mail->Password = 'blueseedfinance1@';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        // fetch user login details
        $sql = "SELECT * FROM user_records WHERE id = '$loggedIn'";
        $query = $conn->query($sql);
        while ($rows = $query->FETCH_ASSOC()) {
          $first_name = $rows['user_firstName'];
          $last_name = $rows['user_lastName'];
          $email = $rows['user_email'];
        }
        
        $mail->setFrom('alert@blueseedfinance.com', 'No reply');
        $mail->addAddress($email, $first_name);
        $mail->isHTML(true);
        $mail->Subject = "Account Investment Initiated";
        $mail->Body = "<p class='leading-8'>
        Hello $first_name $last_name, a deposit of $$amount was made into your $payment_method on $dateTime. Your account will be credited within a few minutes.<br><br> This is to inform you that you have initiated a $plan_name investment. <br><br>Your funds are in a safe hands, relax while our trading professinals do the work. <br><br>
        <a href='http://localhost/whiteskyventures/app-dashboard/user/login.php'>http://localhost/whiteskyventures/app-dashboard/user/login.php</a> <br><br><br>
        Your account information is private. Please do not disclose your login credentials to anyone. Avoid clicking on suspicious links in email. If in doubt, kindly contact our contact support at <a href='mailto:contact@blueseedfinance.com'>contact@blueseedfinance.com</a>
        </p>";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; 
        $headers .= "From: $mail->setFrom<$mail->setFrom>\r\n";
        $deliver_email = $mail->send();
        
        if ($deliver_email) {
          // if email sending is true, insert into the table
          $sql = "INSERT INTO plan_in_take (plan_name, plan_payment_method, plan_amount, plan_image, plan_status, date_time, paid_id) VALUES ('$plan_name', '$payment_method', '$amount', '$fileUpload', 'Pending', '$dateTime', '$loggedIn')";
          mysqli_query($conn, $sql);
          move_uploaded_file($_FILES["file"]["tmp_name"], $target);
          $_SESSION['successMessage'] = "Your investment of $".$amount." was successful, account gets credited within a few minutes.";
          header("Location: deposit.php");
          exit();
        } else {
          // log an error message
          $_SESSION['errorMessage'] = "An error occurred.";
          header("Location: deposit.php");
          exit();
        }
      } catch (Exception $error) {
        $_SESSION['errorMessage'] = $error->getMessage();
        header('Location: deposit.php');
      }
    }
  } else {
    header("Location: ../../index.php" );
    exit();
  }
