<?php

session_start();

if (file_exists('../../config.php')) {
  include('../../config.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ../../config.php does not exist.";
  echo $errorMessage;
  exit;
}

if (file_exists('../../functions.php')) {
  include('../../functions.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ../../functions.php does not exist.";
  echo $errorMessage;
  exit;
}

var_dump($_SESSION["sessionStatus"]);

if (!empty($_SESSION["sessionStatus"]) && $_SESSION["sessionStatus"] != 6) {
  header('Location: ' . ROOT_URL . 'index.php');
} else {


  include('login.php');
}
