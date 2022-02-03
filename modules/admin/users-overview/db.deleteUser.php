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


// Unset session vars
if (isset($_SESSION["aUserQueryResult"])) {
  unset($_SESSION["aUserQueryResult"]);
}

if (isset($_SESSION["iUserDisplayItems"])) {
  $_SESSION["iUserDisplayItems"] = 0;
}

//Query to delete the selected product from database
$sQuery = "DELETE FROM `users` WHERE `id` = '" . $_GET["user"] . "'";

//Execute query and catch results in array
if ($db->query($sQuery)) {
  header('Location: ' . ROOT_URL . 'modules/admin/users-overview/index.php?msg=del');
  exit;
}
