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

      if ($aResult[1] == "execute") {
        header('Location: ' . ROOT_URL . 'modules/admin/add-product.php?msg=error');
      } else if ($aResult[1] == "lengths") {
        header('Location: ' . ROOT_URL . 'modules/admin/add-product.php?msg=query');
      } else {
        header('Location: ' . ROOT_URL . 'modules/admin/add-product.php?msg=succes');
      }
    }
  }
}
