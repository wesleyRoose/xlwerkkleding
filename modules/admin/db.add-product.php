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


// Check if button is pressed
if (isset($_POST["addProductButton"])) {
  // Check if nothing is empty
  if (!empty($_POST["p_name"]) && !empty($_POST["p_price"]) && !empty($_POST["p_category"]) && !empty($_POST["p_sector"]) && !empty($_POST["p_brand"]) && !empty($_POST["p_size"]) && !empty($_POST["p_color"]) && !empty($_POST["p_description"])/* && !empty($_POST["foto"])*/) {



    // PLACEHOLDER MUST REPLACE
    //$p_foto = $_POST["p_file"];
    $p_foto = "test";

    // Clean inputs for not wanted characters
    $p_name = cleaninput($_POST['p_name'], 20);
    $p_price = cleaninput($_POST['p_price'], 10);
    $p_category = cleaninput($_POST['p_category'], 20);
    $p_sector = cleaninput($_POST['p_sector'], 20);
    $p_brand = cleaninput($_POST['p_brand'], 20);
    $p_size = cleaninput($_POST['p_size'], 20);
    $p_color = cleaninput($_POST['p_color'], 20);
    $p_description = cleaninput($_POST['p_description'], 60);

    // Create header location url for a succesfull insert
    $sLocationSucces = "";
    $sLocationSucces .= 'Location: ' . ROOT_URL . 'modules/other/succes.php';


    // Create header location url for a not succesfull insert
    $sLocationFailure = "";
    $sLocationFailure = 'Location: ' . ROOT_URL . 'modules/other/failure.php';

    // Create Arrays for function parameters
    $aRowNames = array("p_name", "p_price", "p_category", "p_sector", "p_brand", "p_size", "p_color", "p_description", "p_foto");

    $aValues = array($p_name, $p_price, $p_category, $p_sector, $p_brand, $p_size, $p_color, $p_description, $p_foto);

    if (preparedInsertIntoQuery($conn, 9, "product", $aRowNames, "sisssssss", $aValues)) {
      header($sLocationSucces);
    } else {
      header($sLocationFailure);
    }
  }
}
