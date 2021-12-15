<?php

$db = new db();

$aWhereValue = array('status');
$aColumnValue = array(1);
$sHtmlContent = ($db->select("aboutHtml", $aWhereValue, 'i', $aColumnValue));
