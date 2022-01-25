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

if ($_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
  header('Location: ' . ROOT_URL . 'index.php');
} else {

  // Check if submit button is pressed
  if (isset($_POST["filterSubmit"])) {
    // Check if the input is not empty
    if (!empty($_POST["new_value"])) {
      // Clean input for unwanted characters
      $filterValue = cleaninput($_POST['new_value'], 20);

      // Create Arrays for function parameters
      $aColumnName = array("term", "value");

      $aValues = array($_POST["term"], $filterValue);

      $aResult = db::insert('filterterms', $aColumnName, $aValues, "ss");

      print_r($aResult);
      // if (db::insert('filterterms', $aColumnName, $aValues, "ss") == "true") {
      //   header('Location: ' . ROOT_URL . 'modules/admin/add-product.php?msg=succes');
      // }
    }
  }
}
