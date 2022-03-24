<?php

// Create empty string
$sHtml = '';
// Check if there is a shopping cart and if it's not empty
if (isset($_SESSION["shoppingCart"]) && !empty($_SESSION["shoppingCart"])) {
  // Generate html
  // Create counter
  $j = 1;
  // Loop through array
  foreach ($_SESSION["shoppingCart"] as $i) {
    // Create query string
    $sQuery = "SELECT * FROM `product` WHERE `p_id` = " . $i[0];
    // Execute Query on database connection and put the data into a Array
    if ($oResult = $conn->query($sQuery)) {
      // Put data into array
      $aRow = $oResult->fetch_assoc();
    }
    $sHtml .= '<div class="shopping-cart-item">
    <div class="shopping-cart-info">
      <div class="product-image small-image item-margin">
      <img src="' . ROOT_URL . 'modules/admin/add/' . $aRow["p_foto"] . '" alt="Placeholder Image" class="product-image small-image">
      </div>
      <div class="shopping-cart-product-number item-margin">
          ' . $j . '
      </div>
      <div class="shopping-cart-product-title item-margin">
          ' . $aRow["p_name"] . '
      </div>
      <div class="shopping-cart-product-price item-margin">
      &#8364 ' . $aRow["p_price"] . ' per stuk
      </div>
      <div class="shopping-cart-product-quantity item-margin">
          ' . $i[3] . 'x
      </div>
  </div>
  <div class="shopping-cart-buttons">
  <div class="product-data button small small-icon black">
          <a class="fas fa-trash black" href="deleteItem.php?id=' . $i[0] . '">
          </a>
      </div>
      </div>
  </div>';
    $j++;
  }
} else {
  $sHtml .= '<b>Winkelwagen is leeg</b>';
}
