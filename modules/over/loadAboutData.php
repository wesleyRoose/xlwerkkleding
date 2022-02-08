<?php

$aWhereValue = array('status', 'location');

// Getting top content from database
$aColumnValue = array(1, 'TopContent');
$sHtmlTopContent = db::select("aboutHtml", $aWhereValue, $aColumnValue, 'is');

// Getting lower content from database
$aColumnValue = array(1, 'LowerContent');
$sHtmlLowerContent = db::select("aboutHtml", $aWhereValue, $aColumnValue, 'is');
