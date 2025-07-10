<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 
// use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php'; 

require_once("session.inc.php");
require_once("connection.inc.php");
if (isset($_POST["submit"])) {
  $firstName = ucfirst(mysqli_real_escape_string($conn, $_POST["firstName"]));
  $lastName = ucfirst(mysqli_real_escape_string($conn, $_POST["lastName"]));
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);
  $confirmPwd = mysqli_real_escape_string($conn, $_POST["confirmPwd"]);
  date_default_timezone_set("UTC");
  $time = time();
  $dateTime = date("Y-m-d H-i-s", $time);

  // error handlers
  if (empty($firstName) || empty($lastName) || empty($email) || empty($pwd) || empty($confirmPwd)) {
    $_SESSION["errorMessage"] = "All input field must be filled.";
    header("Location: register.php");
    exit(); 
  } elseif (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
    $_SESSION["errorMessage"] = "First name, and last name must contain only alphabets.";
    header("Location: register.php");
    exit();
  } elseif (strlen($firstName) > 100 || strlen($lastName) > 100)  {
    $_SESSION["errorMessage"] = "First name, and last name shouldn't exceed 100 characters.";
    header("Location: register.php");
    exit();
  } elseif ($confirmPwd !== $pwd) {
    $_SESSION["errorMessage"] = "Password does not match, try again.";
    header("Location: register.php");
    exit();
  } elseif (strlen($pwd) < 6) {
    $_SESSION["errorMessage"] = "Passwod must exceed 5 characters";
    header("Location: register.php");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["errorMessage"] = "Invalid Email address";
    header("Location: register.php");
    exit();
  } else {
    $sql = "SELECT * FROM user_records WHERE user_email = '$email'";
    $resultCheck = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($resultCheck);
    if ($result > 0) {
      $_SESSION["errorMessage"] = "Email address already in use.";
      header("Location: register.php");
      exit();
    } else {
      try {

        // send user congratulatory email
        $mail = new PHPMailer(true);
        // Server settings
        $mail->SMTPDebug = 2; // Enable verbose debugging
        $mail->isSMTP();
        $mail->Host = 'mail.privateemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alert@blueseedfinance.com';
        $mail->Password = 'blueseedfinance1@';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; 
  
        $mail->setFrom('alert@blueseedfinance.com', 'No reply');
        $mail->addAddress($email, $firstName);
  
        $mail->isHTML(true);
        $mail->Subject = 'Account creation successful!';
        $mail->Body = "<p class='leading-8'>
          Dear $firstName $lastName, <br><br> We at Whitesky with our hearts filled with happiness say a warm welcome to you. <br> At Whitesky, we prioritize our user's safesty and data protection. We are a highly success-driven firm and our services are top notch. With our automated secured encryption, your data and funds are well looked out for. <br>We scan our system daily in order to fight and detect any malicious threats. Welcome to the world of possibility and have a nice journey with us. <br><br><br> Start investing today by logging into your account.
          <a href='http://localhost/whiteskyventures/'>http://localhost/whiteskyventures/</a> <br><br><br>
          Your account information is private. Please do not disclose your login credentials to anyone. Avoid clicking on suspicious links in email. If in doubt, kindly contact our contact support at <a href='mailto:contact@blueseedfinance.com'>contact@blueseedfinance.com</a>
        </p>";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: $mail->setFrom <$mail->setFrom>\r\n";
        $deliver_email = $mail->send();
        if ($deliver_email) {
          // insert into the user_records table
          $sql = "INSERT INTO user_records(user_firstName, user_lastName, user_email, user_pwd, date_time) VALUES('$firstName', '$lastName', '$email', '$pwd', '$dateTime')";
          mysqli_query($conn, $sql);
          header("Location: dashboard.php");
          exit();
        } else {
          $_SESSION['errorMessage'] = "An error occurred.";
          header("Location: register.php");
          exit();
        }
      } catch (Exception $error) {
        $_SESSION['errorMessage'] = $error->getMessage();
        header('Location: register.php');
      }
    }
  }
} else {
    header("Location: ../../index.php");
    exit();
}
$conn->close();