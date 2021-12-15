<?php


session_start();

if (!isset($_SESSION["sessionStatus"])) {
  $_SESSION["sessionStatus"] = 6;
}



if (file_exists('config.php')) {
  include('config.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: config.php does not exist.";
  echo $errorMessage;
  exit;
}




if (file_exists('functions.php')) {
  include('functions.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: functions.php does not exist.";
  echo $errorMessage;
  exit;
}



fileExistsInclude('./modules/home/main.php');
