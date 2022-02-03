<?php

// Set session var to keep track of how many items are displayed
if (!isset($_SESSION["iUserDisplayItems"])) {
  $_SESSION["iUserDisplayItems"] = 0;
}

// Check if button is pressed
if (isset($_POST["formSubmit"])) {
  // Unset session vars
  if (isset($_SESSION["aUserQueryResult"])) {
    unset($_SESSION["aUserQueryResult"]);
  }

  if (isset($_SESSION["iUserDisplayItems"])) {
    $_SESSION["iUserDisplayItems"] = 0;
  }
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
      $sUserTableQuery = "SELECT * FROM `users` WHERE `" . $sRadioValue . "` = '" . $sTextInput . "'";
    } else {
      // If there is a text input, add it to the query
      $sUserTableQuery = "SELECT * FROM `users` WHERE `" . $sRadioValue . "` LIKE '%" . $sTextInput . "%'";
    }
  }
  // if reset is pressed
} else if (isset($_POST["formReset"])) {
  // Unset session vars
  if (isset($_SESSION["aUserQueryResult"])) {
    unset($_SESSION["aUserQueryResult"]);
  }

  if (isset($_SESSION["iUserDisplayItems"])) {
    $_SESSION["iUserDisplayItems"] = 0;
  }
  // Create query
  $sUserTableQuery = "";
  $sUserTableQuery .= "SELECT * FROM `users`;";
} else if (isset($_POST["prev"])) { // Check if previous button is pressed
  // Remove 10 from the product display counter
  $_SESSION["iUserDisplayItems"] -= 2;
} else if (isset($_POST["next"])) { // Check if next button is pressed
  // Remove 10 from the product display counter
  $_SESSION["iUserDisplayItems"] += 2;
}

// If it is a return header from delete, generate a * select
if (isset($_GET["msg"])) {
  if ($_GET["msg"] == "del") {
    // Unset session vars
    if (isset($_SESSION["aUserQueryResult"])) {
      unset($_SESSION["aUserQueryResult"]);
    }

    if (isset($_SESSION["iUserDisplayItems"])) {
      $_SESSION["iUserDisplayItems"] = 0;
    }

    // Create query
    $sUserTableQuery = "";
    $sUserTableQuery .= "SELECT * FROM `users`;";
  }
}


// Check if there is a query, execute it and fetch result
if (isset($sUserTableQuery)) {
  if ($oResult = $conn->query($sUserTableQuery)) {
    while ($aRowResult = $oResult->fetch_assoc()) {
      // Put result in array
      $aResult[] = $aRowResult;
    }
  }
  // If there is a result, put it in a session var
  if (isset($aResult)) {
    $_SESSION["aUserQueryResult"] = $aResult;
  }
}


// Check if there is a result, else create sProductTableHtml to return
if (isset($_SESSION["aUserQueryResult"])) {
  // Start table html
  $sProductTableHtml = "";
  // Loop through the first ten items after the counter
  for ($x = $_SESSION["iUserDisplayItems"] + 2, $y = $_SESSION["iUserDisplayItems"]; $y < $x && $y < count($_SESSION["aUserQueryResult"]) && $y >= 0; $y++) {
    // Create table html
    $sProductTableHtml .= '
<tr class="product-data-row">
  <td class="product-data">' . $_SESSION["aUserQueryResult"][$y]["id"] . '</td>
  <td class="product-data">' . $_SESSION["aUserQueryResult"][$y]["username"] . '</td>
  <td class="product-data">' . $_SESSION["aUserQueryResult"][$y]["email"] . '</td>
  <td class="product-data">' . $_SESSION["aUserQueryResult"][$y]["firstName"] . '</td>
  <td class="product-data">' . $_SESSION["aUserQueryResult"][$y]["lastName"] . '</td>
  <td class="product-data">' . $_SESSION["aUserQueryResult"][$y]["firm"] . '</td>
  <td class="product-records-btns-cell">
    <div class="product-record-btns">
      <a href=' . ROOT_URL . 'modules/admin/users-view/index.php?user=' . $_SESSION["aUserQueryResult"][$y]["id"] . ' class="product-data button small small-icon">
        <i class="fas fa-eye"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/users-edit/index.php?user=' . $_SESSION["aUserQueryResult"][$y]["id"] . ' class="product-data button small small-icon">
        <i class="fas fa-pencil"></i>
      </a>
      <a href=' . ROOT_URL . 'modules/admin/users-overview/db.deleteUser.php?user=' . $_SESSION["aUserQueryResult"][$y]["id"] . ' class="product-data button small small-icon">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </td>
</tr>';
  }
} else {
  $sProductTableHtml = "<p>Geen Gebruiker(s) Gevonden</p>";
}
// Echo table to screen
echo $sProductTableHtml;
