<?php

if (!defined('ROOT_URL')) {
  define("ROOT_URL", "http://localhost/phpdocs/xlwerkkleding/");
}


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "xlwerkkleding";

$db = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$salt = "8Err6pl5sI";
