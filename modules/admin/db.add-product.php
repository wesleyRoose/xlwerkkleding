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

if ($_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
  header('Location: ' . ROOT_URL . 'index.php');
} else {

  // Check if button is pressed
  if (isset($_POST["addProductButton"])) {
    // Check if nothing is empty
    if (!empty($_POST["p_name"]) && !empty($_POST["p_price"]) && !empty($_POST["p_category"]) && !empty($_POST["p_sector"]) && !empty($_POST["p_brand"]) && !empty($_POST["p_size"]) && !empty($_POST["p_color"]) && !empty($_POST["p_description"])) {


      // Clean inputs for not wanted characters
      $p_name = cleaninput($_POST['p_name'], 100);
      $p_price = cleaninput($_POST['p_price'], 5);
      $p_category = cleaninput($_POST['p_category'], 75);
      $p_sector = cleaninput($_POST['p_sector'], 100);
      $p_brand = cleaninput($_POST['p_brand'], 100);
      $p_size = cleaninput($_POST['p_size'], 4);
      $p_color = cleaninput($_POST['p_color'], 50);
      $p_description = cleaninput($_POST['p_description'], 150);

      //file upload

      //create one variable
      $m = "img_product/" . $_FILES['p_file']['name'];
      //use move uploaded file function to move your files
      move_uploaded_file($_FILES['p_file']['tmp_name'], $m);
      // tmp_name is call temporary directory to store file and permanently its transter to m variable path

      // Create header location url for a succesfull insert
      $sLocationSucces = "";
      $sLocationSucces .= 'Location: ' . ROOT_URL . 'modules/other/succes.php';


      // Create header location url for a not succesfull insert
      $sLocationFailure = "";
      $sLocationFailure = 'Location: ' . ROOT_URL . 'modules/other/failure.php';

      // Create Arrays for function parameters
      $aColumnName = array("p_name", "p_price", "p_category", "p_sector", "p_brand", "p_size", "p_color", "p_description", "p_foto");

      $aValues = array($p_name, $p_price, $p_category, $p_sector, $p_brand, $p_size, $p_color, $p_description, $m);


      if (db::insert('product', $aColumnName, $aValues, "sisssssss") != true) {
        header($sLocationSucces);
      } else {
      }
    }
  }
}
