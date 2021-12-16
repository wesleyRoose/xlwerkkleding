<?php

if (file_exists('../../library/db.class.php')) {
  include('../../library/db.class.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: db.class.php does not exist." . __FILE__ . " - " . __LINE__;
  echo $errorMessage;
  exit;
}

$aWhereValue = array('status', 'location');

// Getting top content from database
$aColumnValue = array(1, 'TopContent');
$sHtmlTopContent = db::select("aboutHtml", $aWhereValue, $aColumnValue, 'is');

// Getting lower content from database
$aColumnValue = array(1, 'LowerContent');
$sHtmlLowerContent = db::select("aboutHtml", $aWhereValue, $aColumnValue, 'is');
