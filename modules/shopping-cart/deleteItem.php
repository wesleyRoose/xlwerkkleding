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
// Start counter
$j = 0;
// Sort shoppingcart array to remove gaps
sort($_SESSION["shoppingCart"]);
// Loop through array to search for ID
foreach ($_SESSION["shoppingCart"] as $i) {
  // If the first index of array == get ID
  if ($i[0] == $_GET["id"]) {
    // Delete item from array
    unset($_SESSION["shoppingCart"][$j]);
    // Return do shoppingcart index
    header('Location: ' . ROOT_URL . 'modules/shopping-cart/index.php?delete=succes');
    exit;
  }
  // Add to counter
  $j++;
}
