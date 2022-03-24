<?php


if (file_exists('../../controller.php')) {
  include('../../controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: controller.php does not exist.";
  echo $errorMessage;
  exit;
}


if (file_exists('../../library/db.filterTerms.php')) {
  include('../../library/db.filterTerms.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: db.filterTerms.php does not exist.";
  echo $errorMessage;
  exit;
}


unset($_SESSION["shoppingCart"]);

header('Location: ' . ROOT_URL . 'modules/shopping-cart/index.php?deleteAll=succes');
