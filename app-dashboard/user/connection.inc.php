<?php
require_once("session.inc.php");
/* $serverName = "localhost";
$serverUser = "root";
$serverPass = "";
$dbname = "whitesky";
$conn = mysqli_connect($serverName, $serverUser, $serverPass, $dbname); */
/* $serverName = "localhost";
$serverUser = "whiteskyventures_ameliarosario";
$serverPass = "chukwuebuka86";
$dbname = "whiteskyventures_database";
$conn = mysqli_connect($serverName, $serverUser, $serverPass, $dbname); */
/* $pdo ="mysql:host=localhost; dbname=whiteskyventures_database";
$conn = new PDO($pdo, "whiteskyventures_ameliarosario", "chukwuebuka86"); */


try {
  $host =  $_ENV['DB_HOST'] ?? 'localhost';
  $dbname = $_ENV['DB_NAME'] ?? 'whitesky';
  $username = $_ENV['DB_USER'] ?? 'root';
  $password = $_ENV['DB_PASSWORD'] ?? '';

  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Use $pdo for database operations
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}