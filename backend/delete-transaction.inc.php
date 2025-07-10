<?php
  require_once('session.inc.php');
  $searchParam = $_GET['id'];
  if (isset($_POST['submit'])) { 
   $sql = "DELETE FROM plan_in_take WHERE id = '$searchParam'";
    $conn->query($sql);
    header('Location: admin-transactions.php');
    exit();
  } else {
    header('Location: index.php');
    exit();
  }