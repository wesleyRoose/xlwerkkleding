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
$sQuery = "DELETE FROM `product` WHERE `p_id` = " . $_GET["product"];

//Execute query and catch results in array
if ($db->query($sQuery)) {
  header('Location: ' . ROOT_URL . 'modules/admin/product-overview/index.php?msg=del');
  exit;
}
