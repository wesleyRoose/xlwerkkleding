<?php

if (file_exists('../../../admin-controller.php')) {
  include('../../../admin-controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: admin-controller.php does not exist.";
  echo $errorMessage;
  exit;
}

$sHtml = '';
/*
<tr class="product-data-row">
  <td class="product-data">1</td>
  <td class="product-data">Geel Hesje</td>
  <td class="product-data">Bouw</td>
  <td class="product-data">Merk1</td>
  <td class="product-data">Hesje</td>
  <td class="product-data">$15</td>
  <td>
    <div class="product-record-btns">
      <div class="product-data button small small-icon">
        <i class="fas fa-eye"></i>
      </div>
      <div class="product-data button small small-icon">
        <i class="fas fa-pencil"></i>
      </div>
      <div class="product-data button small small-icon">
        <i class="fas fa-trash"></i>
      </div>
    </div>
  </td>
</tr>
*/

// Check if button is pressed
if (isset($_POST["formSubmit"])) {
  // If there is a input text, filter unwanted characters
  if (!empty($_POST["search"]) && !empty($_POST["selectValue"])) {
    $sTextInput = cleaninput($_POST['search'], 50);
  }

  // Check if there are values selected in the dropdowns, if so create array for the data
  if (!empty($_POST["sector"]) && $_POST["sector"] != 'empty' || !empty($_POST["catagory"]) && $_POST["catagory"] != 'empty') {
    $aSelectValues = array();
  }

  // // Check which dropdown is selected and add their data
  // If sector is selected create array with data
  if (!empty($_POST["sector"]) && $_POST["sector"] != "empty") {
    $aSelectValues[] = $aSectorValues = array("p_sector", $_POST["sector"]);
  }

  // If catagory is selected create array with data
  if (!empty($_POST["catagory"]) && $_POST["catagory"] != "empty") {
    $aSelectValues[] = $aCatagoryValues = array("p_catagory", $_POST["catagory"]);
  }

  // // Check which radio button is selected
  if (!empty($_POST["selectValue"])) {
    // Bind it to a var
    $sRadioValue = $_POST["selectValue"];
  }

  // //Check which data is created to generate a query
  // Check if the the user has a text input
  if (isset($sTextInput) && isset($sRadioValue)) {
    // SELECT * FROM `product` WHERE `p_name` LIKE % %
    $sQuery = "SELECT * FROM `product` WHERE " . $sRadioValue . "";
    print_r($sQuery);
  }
}
