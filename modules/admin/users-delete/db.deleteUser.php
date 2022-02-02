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

//Query to delete the selected user from database
$sQuery = "DELETE FROM `users` WHERE `users` `id` = " . $_SESSION["sessionAccountId"];

//Execute query and catch results in array
if ($db->query($sQuery)) {
  header('Location: ' . ROOT_URL . 'modules/admin/users-overview/index.php?msg=del');
  exit;
}

?>