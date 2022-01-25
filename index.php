<?php

session_start();


if (!isset($_SESSION["sessionStatus"])) {
  $_SESSION["sessionStatus"] = null;
}



if (file_exists('./modules/home/main.php')) {
  include('./modules/home/main.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: main.php does not exist.";
  echo $errorMessage;
  exit;
}
