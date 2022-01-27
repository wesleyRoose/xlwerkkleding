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


?>

<main class="webshop">
  <section class="webshop">
    <div class="page-wrapper">
      <h1 class="title">Webshop</h1>
      <form action="index.php" method="post" class="f-width">
        <div class="filter-bar">
          <div class="select-container">
            <div class="label-check">
              <label>Categorie</label>
              <div class="check-box">
                <input type="checkbox" name="filterCheckBox[]" value="categories" checked>
              </div>
            </div>
            <select name="categories" class="webshop-filter-select">
              <?php echo $sCatagoryHtml ?>
            </select>
          </div>
          <div class="select-container">
            <div class="label-check">
              <label>Sector</label>
              <div class="check-box">
                <input type="checkbox" name="filterCheckBox[]" value="sector" checked>
              </div>
            </div>
            <select name="sector" class="webshop-filter-select">
              <?php echo $sSectorHtml ?>
            </select>
          </div>
          <div class="select-container">
            <div class="label-check">
              <label>Merk</label>
              <div class="check-box">
                <input type="checkbox" name="filterCheckBox[]" value="brand" checked>
              </div>
            </div>
            <select name="brand" class="webshop-filter-select">
              <?php echo $sMerkHtml ?>
            </select>
          </div>
          <div class="select-container">
            <input type="submit" name="formSubmit" class="button sub" value="Filter">
          </div>
          <div class="select-container">
            <input type="submit" name="formReset" class="button sub" value="Reset">
          </div>
        </div>
      </form>
    </div>
  </section>

  <section class="webshop-cards">
    <div class="cards">


      <?php

      if (file_exists('db.defaultHtml.php')) {
        include('db.defaultHtml.php');
      } else {
        $errorMessage = "";
        $errorMessage .= "PHP ERROR: db.defaultHtml.php does not exist.";
        echo $errorMessage;
        exit;
      }

      ?>



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