<?php

//Start Session
session_start();

//Include Files
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

if (file_exists('../../library/db.class.php')) {
  include('../../library/db.class.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ../../library/db.class.php does not exist.";
  echo $errorMessage;
  exit;
}


// Create a Header location string to return user to login if input is incorrect
$sHeaderLocationOnFail = "";
$sHeaderLocationOnFail .= 'Location: ' . ROOT_URL . 'modules/login/index.php?login=fail';

// Create a Header location string to return user to login if input is correct
$sHeaderLocationOnSucces = "";
$sHeaderLocationOnSucces .= 'Location: ' . ROOT_URL . 'index.php?login=succes';

//Check on session token and honeypot
if ($_SESSION["token"] == $_POST["token"] && $_POST["email1"] == "") {

  //Recover input values
  $passwordInput = sha256($_POST["password"]);
  $usernameInput = $_POST["username"];

  $aWhereValue = array('username');
  $aColumnValue = array($usernameInput);;

  //Catch result in a array
  $data = db::select('users', $aWhereValue, $aColumnValue, 's');
  //Check if password is correct
  if ($data["password"] == $passwordInput) {
    //Give the right rights for the account
    if ($data["rights"] == 1) {
      $_SESSION["sessionStatus"] = 1;
    } else if ($data["rights"] == 2) {
      $_SESSION["sessionStatus"] = 2;
    }
    sleep(2);
    header($sHeaderLocationOnSucces);
  } else {
    $_SESSION["sessionStatus"] = null;
    sleep(2);
    header($sHeaderLocationOnFail);
  }
} else {
  $_SESSION["sessionStatus"] = null;
}
