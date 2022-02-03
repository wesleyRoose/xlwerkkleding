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

?>

<main class="product-overview">
  <section class="product-overview">
    <div class="product-overview-wrapper">
      <h3>Overzicht van alle producten</h3>
      <div class="filter-search-bar">
        <form action="index.php" method="post" class="filter-form">
          <input type="text" name="search" id="search" class="search-input" placeholder="Zoek product...">
          <div class="radio-wrapper">
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="p_id">
              <label>ID</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="p_name">
              <label>Product Naam</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="p_price">
              <label>Prijs</label><br>
            </div>
            <div class="flex-new radio">
              <select name="sector" class="filter-select">
                <option value="empty">Sector</option>
                <?php echo $sSectorHtml ?>
              </select>
            </div>
            <div class="flex-new radio">
              <select name="brand" class="filter-select">
                <option value="empty">Merk</option>
                <?php echo $sMerkHtml ?>
              </select>
            </div>
            <div class="flex-new radio">
              <select name="catagory" class="filter-select">
                <option value="empty">Categorie</option>
                <?php echo $sCatagoryHtml ?>
              </select>
            </div>
          </div>
          <div class="flex-new radio">
            <input type="submit" name="formSubmit" class="button no-margin filter-btn" value="Filter">
          </div>
          <div class="flex-new radio">
            <input type="submit" name="formReset" class="button no-margin filter-btn" value="Reset">
          </div>
        </form>
      </div>

      <div class="products-overview">
        <h3>Producten</h3>
        <table class="product-records-table" style="background-color: var(--sub-color);" border="0">
          <thead>
            <tr style="background-color: var(--main-color);">
              <th>ID</th>
              <th>Naam</th>
              <th>Sector</th>
              <th>Merk</th>
              <th>Categorie</th>
              <th>Prijs</th>
              <th class="product-records-btns-cell">Bekijk, Bewerk, Verwijder</th>
            </tr>
          </thead>
          <?php if (file_exists('db.formHandler.php')) {
            include('db.formHandler.php');
          } else {
            $errorMessage = "";
            $errorMessage .= "PHP ERROR: db.formHandler.php does not exist.";
            echo $errorMessage;
            exit;
          }

          if (file_exists('db.prevNextHandler.php')) {
            include('db.prevNextHandler.php');
          } else {
            $errorMessage = "";
            $errorMessage .= "PHP ERROR: db.prevNextHandler.php does not exist.";
            echo $errorMessage;
            exit;
          }
          ?>
        </table>
        <form action="index.php" method="post">
          <div class="filter-search-bar">

            <?php
            if (isset($_SESSION["iDisplayItems"])) {
              if ($_SESSION["iDisplayItems"] > 0) {
                $sPrevHtml = '<div class="flex-new radio">
                <input type="submit" name="prev" class="button no-margin filter-btn" value="Vorige">
              </div>';
                echo $sPrevHtml;
              }
            }
            if (isset($_SESSION["iDisplayItems"]) && isset($_SESSION["aQueryResult"])) {
              if ($_SESSION["iDisplayItems"] + 20 <= count($_SESSION["aQueryResult"])) {
                $sNextHtml = '<div class="flex-new radio">
                <input type="submit" name="next" class="button no-margin filter-btn" value="Volgende">
              </div>';
                echo $sNextHtml;
              }
            }
            ?>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>

<?php

if ($_SESSION["sessionStatus"] == 1) {
  include "../../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
  include "../../../templates/footer-admin.php";
} else {
  include "../../../templates/footer.php";
}

?>