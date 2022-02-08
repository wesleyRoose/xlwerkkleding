<?php

//load controller
if (file_exists('../../../admin-controller.php')) {
  include('../../../admin-controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: admin-controller.php does not exist.";
  echo $errorMessage;
  exit;
}

$title = $_POST["title_change"];

$ssql = "INSERT INTO titles (text) VALUES ('$title')";

//Execute query and catch results in array
$db->query('TRUNCATE TABLE titles');
if ($db->query($ssql)) {
    header('Location: ' . ROOT_URL . 'modules/admin/dashboard/index.php');
    exit;
    }


?>