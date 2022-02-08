<?php

// Create Query string
$sQuery = '';
$sQuery = 'SELECT * FROM `product` WHERE p_id = "' . $_GET["product"] . '"';

// Execute query and catch results in array
if ($oResult = $conn->query($sQuery)) {
  $aRow = $oResult->fetch_assoc();
}
