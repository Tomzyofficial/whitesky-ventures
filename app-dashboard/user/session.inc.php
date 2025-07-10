<?php
session_start();
require_once("connection.inc.php");
// display error message if error is present
function errorMessage() {
  if (isset($_SESSION["errorMessage"])) {
    $outPut = "<div class=\"alert alert-danger\">";
    $outPut .= htmlentities($_SESSION["errorMessage"]);
    $outPut .= "</div>";
    $_SESSION["errorMessage"] = null;
    return $outPut;
  }
}
// display success message if no error is found
function successMessage() {
  if (isset($_SESSION["successMessage"])) {
    $outPut = "<div class=\"alert alert-success\">";
    $outPut .= htmlentities($_SESSION["successMessage"]);
    $outPut .= "</div>";
    $_SESSION["successMessage"] = null;
    return $outPut;
  }
}




