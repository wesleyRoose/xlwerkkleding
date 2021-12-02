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

//Check on session token and honeypot
if ($_SESSION["token"] == $_POST["token"] && $_POST["email1"] == "") {

  //Recover input values
  $passwordInput = sha256($_POST["password"]);
  $usernameInput = $_POST["username"];

  //Prepare SQL Statement
  $preparedSql = 'SELECT * FROM gebruikers WHERE gebruikersnaam=?';

  //Catch error
  if ($conn->prepare($preparedSql) == true) {
    //Bind and excecute Statement
    $stmt = $conn->prepare($preparedSql);
    $stmt->bind_param("s", $usernameInput);
    $stmt->execute();
    $result = $stmt->get_result();


    //Catch result in a array
    $data = mysqli_fetch_array($result);
    //Check if password is correct
    if ($data["wachtwoord"] == $passwordInput) {
      //Give the right rights for the account
      if ($data["rechten"] == 1) {
        $_SESSION["sessionStatus"] = 1;
      } else if ($data["rechten"] == 2) {
        $_SESSION["sessionStatus"] = 2;
      }
    }
  }
}
