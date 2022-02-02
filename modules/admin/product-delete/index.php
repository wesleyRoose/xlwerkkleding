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

//Removes the product

if(isset($_POST["del_user_btn"])) {
  $sQuery = "DELETE FROM `users` WHERE `users`.`id` = " . $_SESSION["sessionAccountId"];

  //Execute query and catch results in array
  if ($db->query($sQuery)) {
  session_destroy();
  header('Location: ' . ROOT_URL . 'modules/login/index.php?msg=del');
  exit;
  }

}

if ($_SESSION["sessionStatus"] == 1) {
  include "../../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
  include "../../../templates/footer-admin.php";
} else {
  include "../../../templates/footer.php";
}
