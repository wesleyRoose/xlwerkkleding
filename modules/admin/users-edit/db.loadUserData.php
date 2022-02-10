<?php

// Create Query string
$sQuery = '';
$sQuery = 'SELECT * FROM `users` WHERE id = "' . $_GET["user"] . '"';

// Execute query and catch results in array
if ($oResult = $conn->query($sQuery)) {
  $aRow = $oResult->fetch_assoc();
}

// Check what is the current rights for dropdown default value
if ($aRow["rights"] == "2") {
  $sDefaultRights = '
  <option value="2">Beheerder</option>            
  <option value="1">Gebruiker</option>
  ';
} else if ($aRow["rights"] == "1") {
  $sDefaultRights = '
  <option value="1">Gebruiker</option>
  <option value="2">Beheerder</option>
  ';
} else {
  $sDefaultRights = '
  <option value="1">Gebruiker</option>
  <option value="2">Beheerder</option>
  ';
}
