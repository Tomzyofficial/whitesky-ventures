<?php
if (isset($_POST['submit'])) {
  require_once ("session.inc.php");
  require_once ("connection.inc.php");
  $name = ucfirst(mysqli_real_escape_string($conn, $_POST['name']));
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  // error handlers
  if (empty($name) || empty($email) || empty($message)) {
    $_SESSION["errorMessage"] = "All input field must be field.";
    header("Location: ../../contact.php");
    exit(); 
  } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $_SESSION["errorMessage"] = "Name must contain only alphabets.";
    header("Location: ../../contact.php");
    exit();
  } elseif (strlen($message) > 100) {
    $_SESSION["errorMessage"] = "Message input shouldn't exceed 100 characters.";
    header("Location: ../../contact.php");
    exit();
  } else {
    $sql = "INSERT INTO message_input (name, email, message) VALUES ('$name', '$email', '$message')";
    mysqli_query($conn, $sql);
    $_SESSION["successMessage"] = "Your message has been sent successfully.";
    header("Location: ../../contact.php");
    exit();
  }
} else {
  header("Location: ../../index.php");
  exit();
}
$conn->close();