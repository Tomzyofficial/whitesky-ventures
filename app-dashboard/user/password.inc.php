<?php
  require_once "session.inc.php";
  require_once "connection.inc.php";
  $loggedIn = $_SESSION['u_id'];
  if (isset($_POST['update'])) {
    $old = mysqli_real_escape_string($conn, $_POST['pwd']);
    $new = mysqli_real_escape_string($conn, $_POST['new_pwd']);
    $confirmPwd = mysqli_real_escape_string($conn, $_POST['confirmPwd']);
    if (empty($old) || empty($new) || empty($confirmPwd)) {
      $_SESSION["errorMessage"] = "All input field must be field.";
      header("Location: passwordchange.php");
      exit();
    } elseif ($confirmPwd !== $new) {
      $_SESSION['errorMessage'] = "Password mismatched, try again.";
      header("Location: passwordchange.php");
      exit();
    } elseif (strlen($new) < 6) {
      $_SESSION["errorMessage"] = "Passwod should exceed 5 characters";
      header("Location: passwordchange.php");
      exit();
    } else {
      $sql = "SELECT * FROM user_records WHERE id = '$loggedIn'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($row = mysqli_fetch_assoc($result)) {
        //verify password
        if ($old !== $row['user_pwd']) {
          $_SESSION["errorMessage"] = "Incorrect password, provide the correct password.";
          header("Location: passwordchange.php");
          exit(); 
        } else {
          $sql = "UPDATE user_records SET user_pwd = '$new' WHERE id = '$loggedIn'";
          mysqli_query($conn, $sql);
          header("Location: dashboard.php?a=passwordupdated");
          exit(); 
        }
      }
    }
  } else {
    header("Location: ../../index.php");
    exit();
  }
  $conn->close();