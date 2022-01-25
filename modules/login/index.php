<?php

//load controller
if (file_exists('../../controller.php')) {
  include('../../controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: controller.php does not exist.";
  echo $errorMessage;
  exit;
}

if (!empty($_SESSION["sessionStatus"]) && $_SESSION["sessionStatus"] != 6) {
  header('Location: ' . ROOT_URL . 'index.php');
} else {


  include('login.php');
}
