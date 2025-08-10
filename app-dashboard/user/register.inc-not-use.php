<?php

include_once("session.inc.php");
include_once("connection.inc.php");
if (isset($_POST["submit"])) {
    $firstName = ucfirst(htmlentities($_POST["firstName"]));
    $lastName = ucfirst(htmlentities($_POST["lastName"]));
    $email =  htmlentities($_POST["email"]);
    $pwd = htmlentities($_POST["pwd"]);
    $confirmPwd = htmlentities($_POST["confirmPwd"]);
    date_default_timezone_set("America/Los_Angeles");
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
    } elseif (strlen($firstName) > 100 || strlen($lastName) > 100) {
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
            // hashing the password
            $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
            // inserting into the database
            //  $sql = "INSERT INTO user_records(user_firstName, user_lastName, user_email, user_pwd, dateTime) VALUES('$firstName', '$lastName', '$email', '$hashPwd', '$dateTime')";
            $sql = "INSERT INTO user_records (user_firstName, user_lastName, user_email, user_pwd, dateTime) VALUES (:firstName, :lastNamE, :emaiL, :hashpwD, :datetimE)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":firstName", $firstName);
            $stmt->bindValue(":lastNamE", $lastName);
            $stmt->bindValue(":emaiL", $email);
            $stmt->bindValue(":hashpwD", $hashPwd);
            $stmt->bindValue(":datetimE", $dateTime);
            $execute = $stmt->execute();
            if ($execute) {
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: resgister.php");
                exit();
            }
        }
    }
} else {
    header("Location: ../../index.php");
    exit();
}
