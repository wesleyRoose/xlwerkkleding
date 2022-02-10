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

// Load user data
if (file_exists('db.loadUserData.php')) {
  include('db.loadUserData.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: db.loadUserData.php does not exist.";
  echo $errorMessage;
  exit;
}

// Check if button was pressed
if (isset($_POST["editUserButton"])) {
  // Create sql string
  $sSql = "";
  $sSql .= "UPDATE `users` SET `username`='" . $_POST["username"] . "',`email`='" . $_POST["email"] . "',`firstName`='" . $_POST["firstName"] . "',`lastName`='" . $_POST["lastName"] . "',`phoneNumber`='" . $_POST["phoneNumber"] . "',`firm`='" . $_POST["firm"] . "',`rights`='" . $_POST["firm"] . "' WHERE id='" . $_GET["user"] . "'";

  // Execute query
  if ($db->query($sSql)) {
    header('Location: ' . ROOT_URL . 'modules/admin/users-overview/index.php?msg=edit');
    exit;
  }
} else { // If button was not pressed
  header('Location: ' . ROOT_URL . 'index.php');
}
