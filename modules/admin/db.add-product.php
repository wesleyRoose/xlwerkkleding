<?php

//Start Session
session_start();

//Include Files
if (file_exists('../../config.php')) {
  include('../../config.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ../../config.php does not exist.";
  echo $errorMessage;
  exit;
}

if (file_exists('../../functions.php')) {
  include('../../functions.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ../../functions.php does not exist.";
  echo $errorMessage;
  exit;
}

// variabels 

$p_name = "[p-name]";
$p_price = "[p-price]";
$p_category = "[p-gategory]";
$p_sector = "[p-sector]";
$p_brand = "[p-brand]";
$p_size = "[p-size]";
$p_color = "[p-color]";
$p_description = "[p-description]";
$p_id = "[p-id]";

// sql insert into `product`

$sql = "INSERT INTO `product`(`p-name`, `p-price`, `p-category`, `p-sector`, `p-brand`, `p-size`, `p-color`, `p-description`, `p-id`)";
VALUES ("'{$p_name}', '{$p_price}', '{$p_category}', '{$p_sector}', '{$p_brand}', '{$p_size}', '{$p_color}', '{$p_description}', '{$p_id}'");

header("location:<?php echo ROOT_URL ?>modules/other/succes.php");
exit();

?>