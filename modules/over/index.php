<?php

if (file_exists('../../controller.php')) {
  include('../../controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: controller.php does not exist.";
  echo $errorMessage;
  exit;
}

if (file_exists('loadAboutData.php')) {
  include('loadAboutData.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: loadAboutData.php does not exist.";
  echo $errorMessage;
  exit;
}


?>

<main class="about">
  <section class="about">
    <h3>Over XLwerkkleding</h3>
    <div class="about-wrapper">
      <div class="about-block about-text">
        <h4><?php
            echo $sHtmlTopContent['title']; ?>
        </h4>
        <?php echo $sHtmlTopContent['content']; ?>
      </div>
      <div class="about-block">
        <img src="<?php echo ROOT_URL ?>img/placeholder.png" alt="Placeholder Image" class="about-image">
      </div>
    </div>
    <div class="about-wrapper">
      <div class="about-block">
        <img src="<?php echo ROOT_URL ?>img/placeholder.png" alt="Placeholder Image" class="about-image">
      </div>
      <div class="about-block about-text">
        <h4><?php
            echo $sHtmlLowerContent['title']; ?>
        </h4>
        <?php echo $sHtmlLowerContent['content']; ?>
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