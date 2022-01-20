<?php

$sDefaultHtml = '';

// Generating results from Search engine
// Check if formSubmit is pressed
if (isset($_POST["formSubmit"])) {


  // Creating arrays for later use in the query
  $aQueryData = array();

  // Check how many and which filters are selected
  if (isset($_POST["filterCheckBox"])) {
    $aFilterCheckBoxes = $_POST["filterCheckBox"];

    // Array for brands
    // Check if `brand` is selected
    if (in_array("brand", $aFilterCheckBoxes)) {
      $aBrand = array();
      if (isset($_POST["brand"])) {
        $aBrand = array("p_brand", $_POST["brand"]);
        // Add array to complete array
        array_push($aQueryData, $aBrand);
      }
    }

    // Array for Categories
    // Check if `categories` is selected
    if (in_array("categories", $aFilterCheckBoxes)) {
      $aCategories = array();
      if (isset($_POST["categories"])) {
        $aCategories = array("p_category", $_POST["categories"]);
        // Add array to complete array
        array_push($aQueryData, $aCategories);
      }
    }

    // Array for sector
    // Check if `sector` is selected
    if (in_array("sector", $aFilterCheckBoxes)) {
      $aSector = array();
      if (isset($_POST["sector"])) {
        $aSector = array("p_sector", $_POST["sector"]);
        // Add array to complete array
        array_push($aQueryData, $aSector);
      }
    }

    // Check if array is not empty, if so skip first query building
    // Get length of Array for query building
    $iFilterLength = count($aQueryData);

    // Check how long the Filter is
    if ($iFilterLength == 1) {
      // Create Query based on the length of filter
      $sQuery = "SELECT * FROM `product` WHERE `" . $aQueryData[0][0] . "` = '" . $aQueryData[0][1] . "'";
      // Create Query based on the length of filter
    } else if ($iFilterLength == 2) {
      // Create Query based on the length of filter
      $sQuery = "SELECT * FROM `product` WHERE `" . $aQueryData[0][0] . "` = '" . $aQueryData[0][1] . "' AND `" . $aQueryData[1][0] . "` = '" . $aQueryData[1][1] . "'";
    } else if ($iFilterLength == 3) {
      // Create Query based on the length of filter
      $sQuery = "SELECT * FROM `product` WHERE `" . $aQueryData[0][0] . "` = '" . $aQueryData[0][1] . "' AND `" . $aQueryData[1][0] . "` = '" . $aQueryData[1][1] . "' AND `" . $aQueryData[2][0] . "` = '" . $aQueryData[2][1] . "'";
    }

    // Execute Query on database connection and put the data into a Array
    if ($oResult = $conn->query($sQuery)) {
      // Generate Product Cards
      while ($aRow = $oResult->fetch_assoc()) {
        $sDefaultHtml .= '
    <div class="card">
      <div class="image">
        <img src=" ' . ROOT_URL . 'modules/admin/' . $aRow["p_foto"] . '" alt="Placeholder Image" class="card-image">
      </div>
      <div class="text">
        <h3>' . $aRow["p_name"] . '</h3>
        <p>' . $aRow["p_sector"] . '</p>
        <a href="' . ROOT_URL . "modules/webshop/product-page.php?productId=" . $aRow["p_id"] . '" class="card-link">Klik hier</a>
      </div>
    </div>';
      }
    }
  } else { // If no boxes are selected for the filter, select all
    // Create Query String
    $sQuery = "SELECT * FROM `product`";
    // Execute Query on database connection and put the data into a Array
    if ($oResult = $conn->query($sQuery)) {
      // Generate Product Cards
      while ($aRow = $oResult->fetch_assoc()) {
        $sDefaultHtml .= '
<div class="card">
  <div class="image">
    <img src=" ' . ROOT_URL . 'modules/admin/' . $aRow["p_foto"] . '" alt="Placeholder Image" class="card-image">
  </div>
  <div class="text">
    <h3>' . $aRow["p_name"] . '</h3>
    <p>' . $aRow["p_sector"] . '</p>
    <a href="' . ROOT_URL . "modules/webshop/product-page.php?productId=" . $aRow["p_id"] . '" class="card-link">Klik hier</a>
  </div>
</div>';
      }
    }
  }

  // Check if formReset is pressed
} else if (isset($_POST["formReset"])) {
  // Create Query String
  $sQuery = "SELECT * FROM `product`";
  // Execute Query on database connection and put the data into a Array
  if ($oResult = $conn->query($sQuery)) {
    // Generate Product Cards
    while ($aRow = $oResult->fetch_assoc()) {
      $sDefaultHtml .= '
<div class="card">
  <div class="image">
    <img src=" ' . ROOT_URL . 'modules/admin/' . $aRow["p_foto"] . '" alt="Placeholder Image" class="card-image">
  </div>
  <div class="text">
    <h3>' . $aRow["p_name"] . '</h3>
    <p>' . $aRow["p_sector"] . '</p>
    <a href="' . ROOT_URL . "modules/webshop/product-page.php?productId=" . $aRow["p_id"] . '" class="card-link">Klik hier</a>
  </div>
</div>';
    }
  }
  // Check if nothing is pressed
} else {
  // Create Query String
  $sQuery = "SELECT * FROM `product`";
  // Execute Query on database connection and put the data into a Array
  if ($oResult = $conn->query($sQuery)) {
    // Generate Products Cards
    while ($aRow = $oResult->fetch_assoc()) {
      $sDefaultHtml .= '
<div class="card">
  <div class="image">
    <img src=" ' . ROOT_URL . 'modules/admin/' . $aRow["p_foto"] . '" alt="Placeholder Image" class="card-image">
  </div>
  <div class="text">
    <h3>' . $aRow["p_name"] . '</h3>
    <p>' . $aRow["p_sector"] . '</p>
    <a href="' . ROOT_URL . "modules/webshop/product-page.php?productId=" . $aRow["p_id"] . '" class="card-link">Klik hier</a>
  </div>
</div>';
    }
  }
}
// Finish Html <div>
$sDefaultHtml .= "</div>";
// Print Html on screen
echo $sDefaultHtml;
