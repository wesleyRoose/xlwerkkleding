<?php

session_start();

if (file_exists('../../config.php')) {
  include('../../config.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: config.php does not exist.";
  echo $errorMessage;
  exit;
}

if (file_exists('../../functions.php')) {
  include('../../functions.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: functions.php does not exist.";
  echo $errorMessage;
  exit;
}


if ($_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
  header('Location: ' . ROOT_URL . 'index.php');
} else {

  if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/header-user.php";
  } else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/header-admin.php";
  } else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/header.php";
  }

  // Main
  if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
  } else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
  } else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/footer.php";
  }
}
