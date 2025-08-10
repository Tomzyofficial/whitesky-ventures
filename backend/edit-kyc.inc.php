<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../app-dashboard/user/PHPMailer/src/Exception.php';
require '../app-dashboard/user/PHPMailer/src/PHPMailer.php';
require '../app-dashboard/user/PHPMailer/src/SMTP.php';

require_once('session.inc.php');
if (isset($_POST['submit'])) {
    $searchParam = $_GET['id'];
    $status = mysqli_real_escape_string($conn, $_POST['status']);
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

    // fetch user login details for sending email
    $sql = "SELECT * FROM kyc_data WHERE id = '$searchParam'";
    $query = $conn->query($sql);
    while ($rows = $query->FETCH_ASSOC()) {
        $firstName = $rows['first_name'];
        $lastName = $rows['last_name'];
        $email = $rows['email'];
    }

    $mail->setFrom('alert@blueseedfinance.com', 'No reply');
    $mail->addAddress($email, $firstName);
    $mail->isHTML(true);
    $mail->Subject = "KYC Approval";
    $mail->Body = "<p class='leading-8'>
      Hello $firstName $lastName, your kyc document has been fully examined and approved. <br>Please log back into your account and continue your loan application. We are dedicated to serving you better. <br><br>
      <a href='http://localhost/whiteskyventures/app-dashboard/user/login.php'>http://localhost/whiteskyventures/app-dashboard/user/login.php</a> <br><br><br>
      Your account information is private. Please do not disclose your login credentials to anyone. Avoid clicking on suspicious links in email. If in doubt, kindly contact our contact support at <a href='mailto:contact@blueseedfinance.com'>contact@blueseedfinance.com</a>
      </p>";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $mail->setFrom <$mail->setFrom>\r\n";
    $deliver_email = $mail->send();

    if ($deliver_email) {
        // if email sending is true, update the table
        $sql = "UPDATE kyc_data SET kyc_status = '$status' WHERE id = '$searchParam'";
        $conn->query($sql);
        header('Location: admin-kyc.php');
        exit();
    } else {
        header('Location: admin-kyc.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
