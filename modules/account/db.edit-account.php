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

// Check if button is pressed
if (isset($_POST["edit_user_btn"])) {
  $aData = array();
  // Catch and clean input data, put into array
  if (!empty($_POST["firstName"])) {
    $firstName = cleaninput($_POST["firstName"], 15);
    array_push($aData, $firstName);
  }
  if (!empty($_POST["lastName"])) {
    $lastName = cleaninput($_POST["lastName"], 15);
    array_push($aData, $lastName);
  }
  if (!empty($_POST["username"])) {
    $username = cleaninput($_POST["username"], 50);
    array_push($aData, $username);
  }
  if (!empty($_POST["email"])) {
    $email = cleaninput($_POST["email"], 50);
    array_push($aData, $email);
  }
  if (!empty($_POST["phonenumber"])) {
    $phonenumber = cleaninput($_POST["phonenumber"], 15);
    array_push($aData, $phonenumber);
  }
  if (!empty($_POST["firm"])) {
    $firm = cleaninput($_POST["firm"], 15);
    array_push($aData, $firm);
  }

  // UPDATE `users` SET `id`='[value-1]',`username`='[value-2]',`password`='[value-3]',`email`='[value-4]',`firstName`='[value-5]',`lastName`='[value-6]',`phoneNumber`='[value-7]',`firm`='[value-8]',`rights`='[value-9]' WHERE 1

  // Create Sql string if array is not empty
  if (!empty($aData)) {
    $sSql = "";
    $sSql = "UPDATE `users` SET ";

    for($i = 0, $c = count($aData) - 2; $i++){
      echo $i . " " . $c;
    }
  } else { // if array is empty redirect to index
    header('Location: ' . ROOT_URL . 'modules/account/index.php');
  }
} else { // If button was not pressed
  header('Location: ' . ROOT_URL . 'index.php');
}
