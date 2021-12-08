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

$location .= 'Location: ' . ROOT_URL . 'modules/other/succes.php';

$p_id = "";
$p_name = cleaninput($_POST["p_name"]);
$p_price = cleaninput($_POST["p_price"]);
$p_category = cleaninput($_POST["p_gategory"]);
$p_sector = cleaninput($_POST["p_sector"]);
$p_brand = cleaninput($_POST["[p_brand"]);
$p_size = cleaninput($_POST["p_size"]);
$p_color = cleaninput($_POST["p_color"]);
$p_description = cleaninput($_POST["p_description"]);


// sql insert into `product`

$sql1 = "INSERT INTO `product` (`p_name`, `p_price, `p_category`,`p_sector`,`p_brand`,`p_size`,`p_color`,`p_description`)
                VALUES ('$p_name', '$p_price' , '$p_category', '$p_sector', '$p_brand', '$p_size', '$p_color', '$p_description');";
header($location);

print_r($sql1);
exit();
?>