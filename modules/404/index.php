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

<main class="s-404">
  <section class="s-404">
    <div class="s-404-wrapper">
        <div class="s-404-titles">
            <h1 class="s-404-large-font">404 Page Not Found :(</h1>
            <h3 class="s-404-small-font">Ga terug of naar een andere pagina</h3>
        </div>
    </div>
  </section>
</main>

<?php

if ($_SESSION["sessionStatus"] == 1) {
  include "../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
  include "../../templates/footer-admin.php";
} else {
  include "../../templates/footer.php";
}

?>