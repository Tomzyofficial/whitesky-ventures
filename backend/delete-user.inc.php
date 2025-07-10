<?php
  require_once('session.inc.php');
  $searchParam = $_GET['id'];
  if (isset($_POST['submit'])) { 
   $sql = "DELETE FROM user_records WHERE id = '$searchParam'";
    $conn->query($sql);
    header('Location: admin-users.php');
    exit();
  } else {
    header('Location: index.php');
    exit();
  }