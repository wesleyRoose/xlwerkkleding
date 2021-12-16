<?php
//Start Session
session_start();

$_SESSION["aCart"] = array(1, 2, 4);

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

if (file_exists('../../library/db.class.php')) {
  include('../../library/db.class.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ../../library/db.class.php does not exist.";
  echo $errorMessage;
  exit;
}

if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/header-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/header-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/header.php";
}

$aWhereValue = array('p_id');

// Getting top content from database
$aColumnValue = array(1);
$sHtmlTopContent = db::select("product", $aWhereValue, 'i', $aColumnValue);

var_dump($sHtmlTopContent);


    if ($_SESSION["sessionStatus"] == 1) {
        include "../../templates/footer-user.php";
    } else if ($_SESSION["sessionStatus"] == 2) {
        include "../../templates/footer-admin.php";
    } else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
        include "../../templates/footer.php";
    }

?>