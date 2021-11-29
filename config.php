<?php


define("ROOT_URL", "http://localhost/phpdocs/xlwerkkleding/");

session_start();


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "xlwerkkleding";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$salt = "#fE15@q!";
