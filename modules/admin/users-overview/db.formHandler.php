<?php

$sHtml = '';


// Check if button is pressed
if (isset($_POST["formSubmit"])) {
  // If there is a input text, filter unwanted characters
  if (!empty($_POST["search"]) && !empty($_POST["selectValue"])) {
    $sTextInput = cleaninput($_POST['search'], 50);
  }


  // // Check which radio button is selected
  if (!empty($_POST["selectValue"])) {
    // Bind it to a var
    $sRadioValue = $_POST["selectValue"];
  }
  // //Check which data is created to generate a query
  // Check if the the user has a text input
  if (isset($sTextInput) && isset($sRadioValue)) {
    if ($sRadioValue == 'id') { // Check if the id is selected, if so dont use LIKE
      // If there is a text input, add it to the query
      $sQuery = "SELECT * FROM `users` WHERE `" . $sRadioValue . "` = '" . $sTextInput . "'";
    } else {
      // If there is a text input, add it to the query
      $sQuery = "SELECT * FROM `users` WHERE `" . $sRadioValue . "` LIKE '%" . $sTextInput . "%'";
    }
  }

  // Execute Query on database connection and put the data into a Array
  if ($oResult = $conn->query($sQuery)) {
    // Generate Product Table
    while ($aRow = $oResult->fetch_assoc()) {
      $sHtml .= '
<tr class="product-data-row">
  <td class="product-data">' . $aRow["id"] . '</td>
  <td class="product-data">' . $aRow["username"] . '</td>
  <td class="product-data">' . $aRow["email"] . '</td>
  <td class="product-data">' . $aRow["firstName"] . '</td>
  <td class="product-data">' . $aRow["lastName"] . '</td>
  <td class="product-data">' . $aRow["firm"] . '</td>
  <td class="product-records-btns-cell">
    <div class="product-record-btns">
      <a href=' . ROOT_URL . 'modules/webshop/product-page.php?product=' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-eye"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/product-edit/index.php?product=' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-pencil"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/product-delete/index.php?product=' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </td>
</tr>
      ';
    }
  }
  echo $sHtml;
  // if reset is pressed
} else if (isset($_POST["formReset"])) {
  // Create query
  $sQuery = "";
  $sQuery .= "SELECT * FROM `users`;";

  // Execute Query on database connection and put the data into a Array
  if ($oResult = $conn->query($sQuery)) {
    // Generate Product Table
    while ($aRow = $oResult->fetch_assoc()) {
      $sHtml .= '
<tr class="product-data-row">
  <td class="product-data">' . $aRow["id"] . '</td>
  <td class="product-data">' . $aRow["username"] . '</td>
  <td class="product-data">' . $aRow["email"] . '</td>
  <td class="product-data">' . $aRow["firstName"] . '</td>
  <td class="product-data">' . $aRow["lastName"] . '</td>
  <td class="product-data">' . $aRow["firm"] . '</td>
  <td class="product-records-btns-cell">
    <div class="product-record-btns">
      <a href=' . ROOT_URL . 'modules/webshop/product-page.php?product=' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-eye"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/product-edit/index.php?product=' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-pencil"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/product-delete/index.php?product=' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </td>
</tr>';
    }
  }
  echo $sHtml;
  // if nothing is pressed
} else {
  // Create query
  $sQuery = "";
  $sQuery .= "SELECT * FROM `users`;";

  // Execute Query on database connection and put the data into a Array
  if ($oResult = $conn->query($sQuery)) {
    // Generate Product Table
    while ($aRow = $oResult->fetch_assoc()) {
      $sHtml .= '
<tr class="product-data-row">
  <td class="product-data">' . $aRow["id"] . '</td>
  <td class="product-data">' . $aRow["username"] . '</td>
  <td class="product-data">' . $aRow["email"] . '</td>
  <td class="product-data">' . $aRow["firstName"] . '</td>
  <td class="product-data">' . $aRow["lastName"] . '</td>
  <td class="product-data">' . $aRow["firm"] . '</td>
  <td class="product-records-btns-cell">
    <div class="product-record-btns">
      <a href=' . ROOT_URL . 'modules/webshop/product-page.php?product=' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-eye"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/product-edit/index.php?product=' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-pencil"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/product-delete/index.php?product=s' . $aRow["id"] . '" class="product-data button small small-icon">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </td>
</tr>';
    }
  }
  echo $sHtml;
}
