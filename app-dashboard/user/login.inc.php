<?php
  require_once("session.inc.php");
  require_once("connection.inc.php");
  if (isset($_POST["submit"])) {
    $email_fName = mysqli_real_escape_string($conn, $_POST["email_fName"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);
    // error handlers
    if (empty($email_fName) || empty($pwd)) {
      $_SESSION["errorMessage"] = "All input field must be filled";
      header("Location: login.php");
      exit(); 
    } else {
      $sql = "SELECT * FROM user_records WHERE user_firstName = '$email_fName' OR user_email = '$email_fName'";
      $result = mysqli_query($conn, $sql); 
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck < 1) {
        $_SESSION["errorMessage"] = "User account not found.";
        header("Location: login.php");
        exit();
      } else {
        if ($row = mysqli_fetch_assoc($result)) {
          //dehashing password
          $verifyPassword = $row['user_pwd'];
          if ($pwd !== $verifyPassword) {
            $_SESSION["errorMessage"] = "Incorrect username or password.";
            header("Location: login.php");
            exit(); 
          } else {
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['u_firstName'] = $row['user_firstName'];
            $_SESSION['u_lastName'] = $row['user_lastName'];
            $_SESSION['u_email'] = $row['user_email'];           
            header("Location: dashboard.php");
            exit(); 
          }
        }
      }
    }
  } else {
    header("Location: ../../index.php");
    exit();
  }
  $conn->close();