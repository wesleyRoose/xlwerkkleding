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

if (file_exists('../../../library/db.filterTerms.php')) {
  include('../../../library/db.filterTerms.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: db.filterTerms.php does not exist.";
  echo $errorMessage;
  exit;
}

// Unset session vars
if (isset($_SESSION["aUserQueryResult"])) {
  unset($_SESSION["aUserQueryResult"]);
}

if (isset($_SESSION["iUserDisplayItems"])) {
  $_SESSION["iUserDisplayItems"] = 0;
}

// Unset session vars
if (isset($_SESSION["aProductQueryResult"])) {
  unset($_SESSION["aProductQueryResult"]);
}

if (isset($_SESSION["iProductDisplayItems"])) {
  $_SESSION["iProductDisplayItems"] = 0;
}



if ($_SESSION["sessionStatus"] == 1) {
  include "../../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
  include "../../../templates/footer-admin.php";
} else {
  include "../../../templates/footer.php";
}
