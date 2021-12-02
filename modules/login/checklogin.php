<?php

session_start();


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


if ($_SESSION["token"] == $_POST["token"] && $_POST["email1"] == "") {

  $passwordInput = sha256($_POST["password"]);
  $usernameInput = $_POST["username"];


  $preparedSql = 'SELECT * FROM gebruikers WHERE gebruikersnaam=?';

  if ($conn->prepare($preparedSql) == true) {

    $stmt = $conn->prepare($preparedSql);
    $stmt->bind_param("s", $usernameInput);
    $stmt->execute();
    $result = $stmt->get_result();



    $data = mysqli_fetch_array($result);

    if ($data["wachtwoord"] == $passwordInput) {
      if ($data["rechten"] == 1) {
        $_SESSION["sessionStatus"] = 1;
      } else if ($data["rechten"] == 2) {
        $_SESSION["sessionStatus"] = 2;
      }
    }
  }
}
