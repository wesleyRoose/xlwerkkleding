<?php

session_start();

if (file_exists('../../config.php')) {
  include('../../config.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: config.php does not exist.";
  echo $errorMessage;
  exit;
}

if (file_exists('../../functions.php')) {
  include('../../functions.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: functions.php does not exist.";
  echo $errorMessage;
  exit;
}

if (file_exists('./loadAboutData.php')) {
  include('./loadAboutData.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: loadAboutData.php does not exist.";
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
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
  include "../../templates/footer.php";
}

?>