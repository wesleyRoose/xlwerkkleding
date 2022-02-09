<?php

// Put db data into vars
$sSize = $aRow["p_size"];
$sColor = $aRow["p_color"];

// Explode strings into array
$aSize = explode(", ", $sSize);

$aColor = explode(", ", $sColor);

// Count arrays
$iSizeCount = count($aSize);
$iColorCount = count($aColor);

// Create html String
$sSizeHtml = '';
foreach ($aSize as $value) {
  $sSizeHtml .= '
  <br>
  <input value="' . $value . '" type="text" name="aSizes[]" class="p-input"<br>
  ';
}

$sColorHtml = '';
foreach ($aColor as $value1) {
  $sColorHtml .= '<br>
  <input value="' . $value1 . '" type="text" name="aColors[]" class="p-input"<br>
  ';
}
