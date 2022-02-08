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

//UPDATE `product` SET `p_name`='[value-1]',`p_price`='[value-2]',`p_category`='[value-3]',`p_sector`='[value-4]',`p_brand`='[value-5]',`p_size`='[value-6]',`p_color`='[value-7]',`p_description`='[value-8]',`p_foto`='[value-9]',`p_id`='[value-10]' WHERE 1
