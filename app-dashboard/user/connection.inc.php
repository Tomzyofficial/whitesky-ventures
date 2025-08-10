<?php

require_once("session.inc.php");
$serverName = "localhost";
$serverUser = "root";
$serverPass = "";
$dbname = "whitesky";
$conn = mysqli_connect($serverName, $serverUser, $serverPass, $dbname);
/* $serverName = "localhost";
$serverUser = "whiteskyventures_ameliarosario";
$serverPass = "chukwuebuka86";
$dbname = "whiteskyventures_database";
$conn = mysqli_connect($serverName, $serverUser, $serverPass, $dbname); */
/* $pdo ="mysql:host=localhost; dbname=whiteskyventures_database";
$conn = new PDO($pdo, "whiteskyventures_ameliarosario", "chukwuebuka86"); */
