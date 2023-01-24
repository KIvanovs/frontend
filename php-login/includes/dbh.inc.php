<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "php-login";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


if (!$conn){
    die("connection failed: " . mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT) . mysqli_connect_error());
}