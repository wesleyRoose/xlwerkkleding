<?php


if (file_exists('../../controller.php')) {
  include('../../controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: controller.php does not exist.";
  echo $errorMessage;
  exit;
}


if (file_exists('../../library/db.filterTerms.php')) {
  include('../../library/db.filterTerms.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: db.filterTerms.php does not exist.";
  echo $errorMessage;
  exit;
}

// Check if the button was pressed
if (isset($_POST["submit"])) {
  // Catch vars
  $sSize = $_POST["sizes"];
  $sColors = $_POST["colors"];
  $sQuantity = $_POST["quantity"];

  // Check if shopping cart session varriable is not set
  if (!isset($_SESSION["shoppingCart"])) {
    // Set session varriable
    $_SESSION["shoppingCart"] = array();
  }
  // Create order array
  $aOrder = array($_GET["product"], $sSize, $sColors, $sQuantity);
  // Add order array to shoppingcart
  array_push($_SESSION["shoppingCart"], $aOrder);
  // Return to product page
  header('Location: ' . ROOT_URL . 'modules/webshop/product-page.php?state=pressed&product=' . $_GET["product"]);
} else {  // If the button was not pressed, return do index
  header('Location: ' . ROOT_URL . 'modules/webshop/product-page.php?product=' . $_GET["product"]);
  exit;
}
