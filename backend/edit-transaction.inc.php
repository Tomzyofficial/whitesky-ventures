<?php
  require_once('session.inc.php');
  $searchParam = $_GET['id'];
  if (isset($_POST['submit'])) {
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    // update record
  
    $sql = "UPDATE plan_in_take SET status = '$status' WHERE id = '$searchParam'";
    $conn->query($sql);
    header('Location: admin-transactions.php');
    exit();
  } else {
    header('Location: index.php');
    exit();
  }