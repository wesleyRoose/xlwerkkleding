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

// Check if submit is pressed
if (isset($_POST["submit"])) {
  if (isset($_POST["titleChange"])) {
    // Update content in database
    updateHtmlContent($conn, "main", "slogan", $_POST["titleChange"]);

    // Return
    header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
  } else { // If not everything is filled in return to dashboard
    header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
  }
} else { // If submit is not pressed return to dashboard
  header('Location: ' . ROOT_URL . 'modules' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dashboard');
}
