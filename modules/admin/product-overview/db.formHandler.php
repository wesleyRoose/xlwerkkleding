<?php

// Set session var to keep track of how many items are displayed
if (!isset($_SESSION["iDisplayItems"])) {
  $_SESSION["iDisplayItems"] = 0;
}



// Check if button is pressed
if (isset($_POST["formSubmit"])) {
  // Unset session vars
  if (isset($_SESSION["aQueryResult"])) {
    unset($_SESSION["aQueryResult"]);
  }

  if (isset($_SESSION["iDisplayItems"])) {
    $_SESSION["iDisplayItems"] = 0;
  }

  // If there is a input text, filter unwanted characters
  if (!empty($_POST["search"]) && !empty($_POST["selectValue"])) {
    $sTextInput = cleaninput($_POST['search'], 50);
  }

  // Check if there are values selected in the dropdowns, if so create array for the data
  if (!empty($_POST["sector"]) && $_POST["sector"] != 'empty' || !empty($_POST["catagory"]) && $_POST["catagory"] != 'empty' || !empty($_POST["brand"]) && $_POST["brand"] != 'empty') {
    $aSelectValues = array();

    // // Check which dropdown is selected and add their data
    // If sector is selected create array with data
    if (!empty($_POST["sector"]) && $_POST["sector"] != "empty") {
      $aSelectValues[] = $aSectorValues = array("p_sector", $_POST["sector"]);
    }

    // If catagory is selected create array with data
    if (!empty($_POST["catagory"]) && $_POST["catagory"] != "empty") {
      $aSelectValues[] = $aCatagoryValues = array("p_category", $_POST["catagory"]);
    }

    // If brand is selected create array with data
    if (!empty($_POST["brand"]) && $_POST["brand"] != "empty") {
      $aSelectValues[] = $aCatagoryValues = array("p_brand", $_POST["brand"]);
    }
  }

  // Set var for later use
  $bTextInput = NULL;

  // // Check which radio button is selected
  if (!empty($_POST["selectValue"])) {
    // Bind it to a var
    $sRadioValue = $_POST["selectValue"];
  } else {
    $bTextInput = false;
  }

  // //Check which data is created to generate a query
  // Check if the the user has a text input
  if (isset($sTextInput) && isset($sRadioValue)) {
    $bTextInput = true;
    if ($sRadioValue == 'p_id') { // Check if the id is selected, if so dont use LIKE
      // If there is a text input, add it to the query
      $sTableQuery = "SELECT * FROM `product` WHERE `" . $sRadioValue . "` = '" . $sTextInput . "'";
    } else {
      // If there is a text input, add it to the query
      $sTableQuery = "SELECT * FROM `product` WHERE `" . $sRadioValue . "` LIKE '%" . $sTextInput . "%'";
    }
  } else {
    $bTextInput = false;
  }

  // If there is no user input
  if ($bTextInput != true && !isset($aSelectValues)) {
    $sTableQuery = "";
    $sTableQuery .= "SELECT * FROM `product`";
  }

  // Check if there are dropdown values, if so add it to the sTableQuery if it exists
  if ($bTextInput == true && isset($aSelectValues)) {
    // Check how many items where selected
    $iArrayLength = count($aSelectValues);

    // Complete the query
    if ($iArrayLength == 1) {
      $sTableQuery .= " AND `" . $aSelectValues[0][0] . "` = '" . $aSelectValues[0][1] . "'";
    } else if ($iArrayLength == 2) {
      $sTableQuery .= " AND `" . $aSelectValues[0][0] . "` = '" . $aSelectValues[0][1] . "' AND `" . $aSelectValues[1][0] . "` = '" . $aSelectValues[1][1] . "'";
    } else if ($iArrayLength == 3) {
      $sTableQuery .= " AND `" . $aSelectValues[0][0] . "` = '" . $aSelectValues[0][1] . "' AND `" . $aSelectValues[1][0] . "` = '" . $aSelectValues[1][1] . "' AND `" . $aSelectValues[2][0] . "` = '" . $aSelectValues[2][1] . "'";
    }
    // If there is not a textinput but there are selected value(s)
  } else if ($bTextInput != true && isset($aSelectValues)) {
    // Check how many items where selected
    $iArrayLength = count($aSelectValues);
    $sTableQuery = "";

    // Complete the query
    if ($iArrayLength == 1) {
      $sTableQuery .= "SELECT * FROM `product` WHERE `" . $aSelectValues[0][0] . "` = '" . $aSelectValues[0][1] . "'";
    } else if ($iArrayLength == 2) {
      $sTableQuery .= "SELECT * FROM `product` WHERE `" . $aSelectValues[0][0] . "` = '" . $aSelectValues[0][1] . "' AND `" . $aSelectValues[1][0] . "` = '" . $aSelectValues[1][1] . "'";
    } else if ($iArrayLength == 3) {
      $sTableQuery .= "SELECT * FROM `product` WHERE `" . $aSelectValues[0][0] . "` = '" . $aSelectValues[0][1] . "' AND `" . $aSelectValues[1][0] . "` = '" . $aSelectValues[1][1] . "' AND `" . $aSelectValues[2][0] . "` = '" . $aSelectValues[2][1] . "'";
    }
  }
  // if reset is pressed
} else if (isset($_POST["formReset"])) {
  // Unset session vars
  if (isset($_SESSION["aQueryResult"])) {
    unset($_SESSION["aQueryResult"]);
  }

  if (isset($_SESSION["iDisplayItems"])) {
    $_SESSION["iDisplayItems"] = 0;
  }

  // Create query
  $sTableQuery = "";
  $sTableQuery .= "SELECT * FROM `product`";


  // if nothing is pressed
} else if (isset($_POST["prev"])) {
  $_SESSION["iDisplayItems"] -= 10;
} else if (isset($_POST["next"])) {
  $_SESSION["iDisplayItems"] += 10;
} else {
  // Unset session vars
  if (isset($_SESSION["aQueryResult"])) {
    unset($_SESSION["aQueryResult"]);
  }

  // Create query
  $sTableQuery = "";
  $sTableQuery .= "SELECT * FROM `product`";
}


if (!isset($sTableHtml)) {
  // Create query
  $sTableQuery = "";
  $sTableQuery .= "SELECT * FROM `product`";
}

// Execute Query on database connection and put the data into a Array
if (isset($sTableQuery)) {
  if ($oResult = $conn->query($sTableQuery)) {
    // Generate Product Table
    while ($aRowResult = $oResult->fetch_assoc()) {
      $aResult[] = $aRowResult;
    }
  }
  if (isset($aResult)) {
    $_SESSION["aQueryResult"] = $aResult;
  }
}
// Check if there is a result, else create sTableHtml to return
if (isset($_SESSION["aQueryResult"])) {
  print_r($_SESSION["aQueryResult"]);
  $sTableHtml = "";
  for ($x = $_SESSION["iDisplayItems"] + 10, $y = $_SESSION["iDisplayItems"]; $y < $x && $y < count($_SESSION["aQueryResult"]) && $y >= 0; $y++) {
    $sTableHtml .= '
<tr class="product-data-row">
  <td class="product-data">' . $_SESSION["aQueryResult"][$y]["p_id"] . '</td>
  <td class="product-data">' . $_SESSION["aQueryResult"][$y]["p_name"] . '</td>
  <td class="product-data">' . $_SESSION["aQueryResult"][$y]["p_sector"] . '</td>
  <td class="product-data">' . $_SESSION["aQueryResult"][$y]["p_brand"] . '</td>
  <td class="product-data">' . $_SESSION["aQueryResult"][$y]["p_category"] . '</td>
  <td class="product-data">&#8364 ' . $_SESSION["aQueryResult"][$y]["p_price"] . '</td>
  <td class="product-records-btns-cell">
    <div class="product-record-btns">
      <a href=' . ROOT_URL . 'modules/webshop/product-page.php?product=' . $_SESSION["aQueryResult"][$y]["p_id"] . ' class="product-data button small small-icon">
        <i class="fas fa-eye"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/product-edit/index.php?product=' . $_SESSION["aQueryResult"][$y]["p_id"] . ' class="product-data button small small-icon">
        <i class="fas fa-pencil"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/product-overview/db.deleteProduct.php?product=' . $_SESSION["aQueryResult"][$y]["p_id"] . ' class="product-data button small small-icon">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </td>
</tr>';
  }
} else {
  $sTableHtml = "<p>Geen Producten Gevonden</p>";
}

echo $sTableHtml;
