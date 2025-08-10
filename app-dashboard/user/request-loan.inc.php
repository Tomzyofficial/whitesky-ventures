<?php

require_once('session.inc.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loggedInId = $_SESSION['u_id'];
    $typeOfLoan = mysqli_real_escape_string($conn, $_POST['typeOfLoan']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);

    date_default_timezone_set("UTC");
    $time = time();
    $dateTime = date("Y-m-d H:i:s", $time);

    // error handlers
    if (empty($typeOfLoan) || empty($duration) || empty($amount) || empty($purpose)) {
        $_SESSION['errorMessage'] = 'All inputs must be filled, try again.';
        header('Location: request-loan.php');
        exit();
    } elseif (!is_numeric($amount)) {
        $_SESSION['errorMessage'] = 'Amount must be a number';
        header('Location: request-loan.php');
        exit();
    } elseif (strlen($purpose) > 100) {
        $_SESSION['errorMessage'] = 'Purpose shouldn\'t exceed 100 characters';
        header('Location: request-loan.php');
        exit();
    } else {
        // insert loan form into the loan table
        $sql = "INSERT INTO loan (type_of_loan, duration, amount, purpose, date_time, loan_id) VALUES ('$typeOfLoan', '$duration', '$amount', '$purpose', '$dateTime', '$loggedInId')";
        $conn->query($sql);
        $_SESSION['successMessage'] = 'Your loan application has been submitted and undergoing some review. You will be communicated within 48 hours.';
        header('Location: request-loan.php');
        exit();
    }
} else {
    header('Location: ../../index.php');
    exit();
}
$conn->close();
