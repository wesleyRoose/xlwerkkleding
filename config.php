<?php

if (!defined('ROOT_URL')) {
  define("ROOT_URL", "http://localhost/phpdocs/xlwerkkleding/");
}


if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "xlwerkkleding";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$salt = "#fE15@q!";
