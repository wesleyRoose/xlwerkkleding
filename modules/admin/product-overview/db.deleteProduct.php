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

// Unset session vars
if (isset($_SESSION["aUserQueryResult"])) {
  unset($_SESSION["aUserQueryResult"]);
}

if (isset($_SESSION["iUserDisplayItems"])) {
  $_SESSION["iUserDisplayItems"] = 0;
}

// Create query using url parameters
$sQuery = "SELECT * FROM `product` WHERE `p_id` = " . $_GET["product"];
// Execute Query on database connection and put the data into a Array
if ($oResult = $conn->query($sQuery)) {
  $aRow = $oResult->fetch_assoc();
}

// Delete file using path from database
unlink('../add/' . $aRow["p_foto"]);

//Query to delete the selected product from database
$sQuery = "DELETE FROM `product` WHERE `p_id` = " . $_GET["product"];

//Execute query and return to overview with a url parameter
if ($db->query($sQuery)) {
  header('Location: ' . ROOT_URL . 'modules/admin/product-overview/index.php?msg=del');
  exit;
}
