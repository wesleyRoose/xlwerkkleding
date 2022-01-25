<?php

if (file_exists('../../controller.php')) {
  include('../../controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: controller.php does not exist.";
  echo $errorMessage;
  exit;
}
?>

<!--MAIN-->

<?php

if ($_SESSION["sessionStatus"] == 1) {
  include "../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
  include "../../templates/footer-admin.php";
} else {
  include "../../templates/footer.php";
}

?>