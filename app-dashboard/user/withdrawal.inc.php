<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once "session.inc.php";
require_once "connection.inc.php";
if (isset($_POST['submit'])) {
    $loggedIn = $_SESSION['u_id'];
    $withdraw_plan = filter_input(INPUT_POST, "plan_selection", FILTER_SANITIZE_STRING);
    $withdrawal_crypto = mysqli_real_escape_string($conn, $_POST['withdrawal_crypto']);
    $withdrawal_amount = mysqli_real_escape_string($conn, $_POST['withdrawal_amount']);
    $wallet = mysqli_real_escape_string($conn, $_POST['wallet_address']);
    date_default_timezone_set("America/Los_Angeles");
    $time = time();
    $dateTime = date("Y-m-d H-i-s", $time);
    // error handlers
    if (empty($withdraw_plan) || empty($withdrawal_crypto) || empty($withdrawal_amount) || empty($wallet)) {
        $_SESSION["errorMessage"] = "All input field must be filled.";
        header("Location: withdrawal.php");
        exit();
    } elseif (!is_numeric($withdrawal_amount)) {
        $_SESSION['errorMessage'] = 'You have entered a wrong value.';
        header('Location: withdrawal.php');
        exit();
    } else {
        // fetch user investment details from plan_in_take table. I want to check if user has earned interest up to what they're withdrawing
        $sql = "SELECT * FROM plan_in_take WHERE status = 'APPROVED' AND paid_id = '$loggedIn'";
        $stmt = $conn->query($sql);
        $num_rows = $stmt->num_rows;
        if ($num_rows > 0) {
            while ($rows == $stmt->FETCH_ASSOC()) {
                $interest = $rows['interest_earn'];
            }
            if (($withdraw_plan == 'Regular trade') && ($interest < 1000)) {
                $_SESSION['errorMessage'] = 'ROI must be $1000 and above';
                header('Location: withdrawal.php');
                exit();
            } elseif (($withdraw_plan == 'Regular trade') && ($withdrawal_amount > $interest)) {
                $_SESSION['errorMessage'] = 'Insufficient ROI';
                header('Location: withdrawal.php');
                exit();
            } elseif (($withdraw_plan == 'Gold trade') && ($interest < 5000)) {
                $_SESSION['errorMessage'] = 'ROI must be $5000 and above';
                header('Location: withdrawal.php');
                exit();
            } elseif (($withdraw_plan == 'Gold trade') && ($withdrawal_amount > $interest)) {
                $_SESSION['errorMessage'] = 'Insufficient ROI';
                header('Location: withdrawal.php');
                exit();
            } elseif (($withdraw_plan == 'Premium trade') && ($interest < 20000)) {
                $_SESSION['errorMessage'] = 'ROI must be $20000 and above';
                header('Location: withdrawal.php');
                exit();
            } elseif (($withdraw_plan == 'Premium trade') && ($withdrawal_amount > $interest)) {
                $_SESSION['errorMessage'] = 'Insufficient ROI';
                header('Location: withdrawal.php');
                exit();
            } else {
                try {
                    // send user an email to inform them of the withdrawal
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
                    $sql = "SELECT * FROM user_records WHERE id = '$loggedIn'";
                    $query = $conn->query($sql);
                    while ($rows = $query->FETCH_ASSOC()) {
                        $firstName = $rows['user_firstName'];
                        $lastName = $rows['user_lastName'];
                        $email = $rows['user_email'];
                    }

                    $mail->setFrom('alert@blueseedfinance.com', 'No reply');
                    $mail->addAddress($email, $firstName);
                    $mail->isHTML(true);
                    $mail->Subject = "Withdrawal Request";
                    $mail->Body = "<p class='leading-8'>
            Hello $firstName $lastName, this is to notify you of the withdrawal request of $$withdrawal_amount from your account. If you did not initiate this transaction, message our contact support immediately.<br><br>
            <a href='http://localhost/whiteskyventures/app-dashboard/user/login.php'>http://localhost/whiteskyventures/app-dashboard/user/login.php</a> <br><br><br>
            Your account information is private. Please do not disclose your login credentials to anyone. Avoid clicking on suspicious links in email. If in doubt, kindly contact our contact support at <a href='mailto:contact@blueseedfinance.com'>contact@blueseedfinance.com</a>
            </p>";
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    $headers .= "From: $mail->setFrom <$mail->setFrom>\r\n";
                    $deliver_email = $mail->send();

                    if ($deliver_email) {
                        // insert into the withdrawal table
                        $sql = "INSERT INTO withdrawals (plan, crypto, amount, wallet, date_time, paid_id) VALUES ('$withdraw_plan', '$withdrawal_crypto', '$withdrawal_amount', '$wallet', '$dateTime', '$loggedIn')";
                        $conn->query();
                        $_SESSION['successMessage'] = 'Your withdrawal request was successful and under review.';
                        header('Location: withdrawal.php');
                        exit();
                    } else {
                        $_SESSION['errorMessage'] = "An internal error occurred";
                        header('Location: withdrawal.php');
                        exit();
                    }
                } catch (Exception $error) {
                    $_SESSION['errorMessage'] = $error->getMessage();
                    header('Location: withdrawal.php');
                    exit();
                }
            }
        } else {
            $_SESSION['errorMessage'] = 'You have not earned any interest.';
            header('Location: withdrawal.php');
            exit();
        }
    }
} else {
    header("Location: ../../index.php");
    exit();
}
$conn->close();
