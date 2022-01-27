<?php

// Create Query String
$sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'category'";
// Execute query and catch result in array
if ($oResult = $conn->query($sQuery)) {
  $sHtml = "";
  while ($aRow = $oResult->fetch_assoc()) {
    $sHtml .= "<option value='" . $aRow["value"] . "'>" . $aRow["value"] . "</option>";
  }
}

$sCatagoryHtml = $sHtml;


// Create Query String
$sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'sector'";
// Execute query and catch result in array
if ($oResult = $conn->query($sQuery)) {
  $sHtml = "";
  while ($aRow = $oResult->fetch_assoc()) {
    $sHtml .= "<option value='" . $aRow["value"] . "'>" . $aRow["value"] . "</option>";
  }
}

$sSectorHtml = $sHtml;

// Create Query String
$sQuery = "SELECT * FROM `filterterms` WHERE `term` = 'brand'";
// Execute query and catch result in array
if ($oResult = $conn->query($sQuery)) {
  $sHtml = "";
  while ($aRow = $oResult->fetch_assoc()) {
    $sHtml .= "<option value='" . $aRow["value"] . "'>" . $aRow["value"] . "</option>";
  }
}

$sMerkHtml = $sHtml;
