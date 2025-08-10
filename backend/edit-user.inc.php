<?php

require_once('session.inc.php');
$searchParam = $_GET['id'];
if (isset($_POST['submit'])) {
    $firstname = ucwords(mysqli_real_escape_string($conn, $_POST['first_name']));
    $lastname = ucwords(mysqli_real_escape_string($conn, $_POST['last_name']));
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $sql = "UPDATE user_records SET user_firstName = '$firstname', user_lastName = '$lastname', user_email = '$email', user_pwd = '$password', date_time = '$date' WHERE id = '$searchParam'";
    $conn->query($sql);
    header('Location: admin-users.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
