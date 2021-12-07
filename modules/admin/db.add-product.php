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

$p_name = "[p_name]";
$p_price = "[p_price]";
$p_category = "[p_gategory]";
$p_sector = "[p_sector]";
$p_brand = "[p_brand]";
$p_size = "[p_size]";
$p_color = "[p_color]";
$p_description = "[p_description]";
$p_id = "[p_id]";

// sql insert into `product`

$sql = "INSERT INTO product(p_name, p_price, p_category, p_sector, p_brand, p_size, p_color, p_description, p_id);
VALUES ("'{$p_name}', '{$p_price}', '{$p_category}', '{$p_sector}', '{$p_brand}', '{$p_size}', '{$p_color}', '{$p_description}', '{$p_id}'");

header("location:<?php echo ROOT_URL ?>modules/other/succes.php");
exit();

?>