<?php
  require_once('session.inc.php');
  if (isset($_POST['submit'])) {
    $loggedInId = $_SESSION['u_id'];
    $firstname = ucwords(mysqli_real_escape_string($conn, $_POST['firstname']));
    $lastname = ucwords(mysqli_real_escape_string($conn, $_POST['lastname']));
    $motherName = ucwords(mysqli_real_escape_string($conn, $_POST['mother_name']));
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $statement_file = mysqli_real_escape_string($conn, $_FILES['bank_statement']['name']);
    $identity_file = mysqli_real_escape_string($conn, $_FILES['identity']['name']);
    $statementTarget = "bankStatement/" . basename($_FILES['bank_statement']['name']);
    $identityTarget = "identityFile/" . basename($_FILES['identity']['name']);

    date_default_timezone_set("UTC");
    $time = time();
    $dateTime = date("Y-m-d H:i:s", $time);

   // error handlers
    if (empty($firstname) || empty($lastname) || empty($motherName) || empty($email) || empty($statement_file) || empty($identity_file)) {
      $_SESSION['errorMessage'] = 'All inputs must be filled, try again.'; 
      header('Location: kyc-verification.php');
      exit();
    } elseif (!preg_match('/^[a-zA-Z]*$/', $firstname) || !preg_match('/^[a-zA-Z]*$/', $lastname) || !preg_match('/^[a-zA-Z]*$/', $motherName)) {
      $_SESSION['errorMessage'] = 'Invalid name format';
      header('Location: kyc-verification.php');
      exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['errorMessage'] = 'Invalid email format';
      header('Location: kyc-verification.php');
      exit();
    } else { 
      // insert kyc form into the kyc_data table and set the status to pending and await for approval 
      $sql = "INSERT INTO kyc_data (first_name, last_name, mother_name, email, bank_statement, proof_identity, kyc_status, date_time, kyc_id) VALUES ('$firstname', '$lastname', '$motherName', '$email', '$statement_file', '$identity_file', 'pending', '$dateTime', '$loggedInId')";
      move_uploaded_file($_FILES["bank_statement"]["tmp_name"], $statementTarget);
      move_uploaded_file($_FILES["identity"]["tmp_name"], $identityTarget);
      $_SESSION['kyc_verify'] = true;
      $conn->query($sql);
      $_SESSION['successMessage'] = 'Hello ' . $firstname . ' your kyc form is under review. The result will be communicated within 1 working day.';
      header('Location: request-loan.php');
      exit();
    }
  } else {
    header('Location: ../../index.php');
    exit();
  }
  $conn->close();
?>