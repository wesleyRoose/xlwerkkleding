<?php

if (!defined('ROOT_URL')) {
  define("ROOT_URL", "http://localhost/phpdocs/xlwerkkleding/");
}


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "xlwerkkleding";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$salt = "8Err6pl5sI";
