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


if (file_exists('db.loadProductData.php')) {
  include('db.loadProductData.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: db.loadProductData.php does not exist.";
  echo $errorMessage;
  exit;
}

if (file_exists('db.loadSizeColorInputHtml.php')) {
  include('db.loadSizeColorInputHtml.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: db.loadSizeColorInputHtml.php does not exist.";
  echo $errorMessage;
  exit;
}

if ($_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
  header('Location: ' . ROOT_URL . 'index.php');
  exit;
} else {

?>

  <main class="add-products">
    <section class="add-products-s">
      <div class="input-form">
        <form action="db.editProduct.php?product=<?php echo $_GET["product"] ?>" method="post" class="product-form" id="product-form" autocomplete="off" enctype="multipart/form-data">
          <h3 class="form-header">Hier kun je '<?php echo $aRow["p_name"] ?>' bijwerken</h3>
          <label>Product Naam</label><br>
          <input value="<?php echo $aRow['p_name'] ?>" type="text" name="p_name" id="p_name" class="p-input"><br>
          <label>Prijs</label><br>
          <input value="<?php echo $aRow['p_price'] ?>" type="text" name="p_price" id="p_price" class="p-input"><br><br>
          <label>Aantal Maten</label>
          <?php echo $sSizeHtml; ?>
          <div class="sizeSelecterWrapper" id="sizesWrapper">
          </div>
          <br>
          <input type="number" name="numberOfSizes" id="numberOfSizes" value="1">
          <div style="display: flex;">
            <div style="margin-right: 5px;" class="button" style="width: 40%!important;" onclick="numberOfSizesConfirm('add')">Meer Maten</div>
            <div style="margin-left: 5px;" class="button" style="width: 40%!important;" onclick="numberOfSizesConfirm('reset')">Reset</div>
          </div>
          <br>
          <label>Aantal Kleuren</label>
          <?php echo $sColorHtml; ?>
          <div class="colorSelecterWrapper" id="colorWrapper">

          </div>
          <br>
          <input type="number" name="numberOfColors" id="numberOfColors" value="1">
          <div style="display: flex;">
            <div style="margin-right: 5px;" class="button" style="width: 40%!important;" onclick="numberOfColorsConfirm('add')">Meer Kleuren</div>
            <div style="margin-left: 5px;" class="button" style="width: 40%!important;" onclick="numberOfColorsConfirm('reset')">Reset</div>
          </div>
          <label>Categorie</label><br>
          <select name="p_category" class="add-product-select webshop-filter-select">
            <option value="<?php echo $aRow["p_category"] ?>"><?php echo $aRow["p_category"] ?></option> <!-- Default value from db -->
            <?php echo $sCatagoryHtml ?>
          </select><br>
          <label>Sectorgroep</label><br>
          <select name="p_sector" class="add-product-select webshop-filter-select">
            <option value="<?php echo $aRow["p_sector"] ?>"><?php echo $aRow["p_sector"] ?></option> <!-- Default value from db -->
            <?php echo $sSectorHtml ?>
          </select><br>
          <label>Merk</label>
          <select name="p_brand" class="add-product-select webshop-filter-select">
            <option value="<?php echo $aRow["p_brand"] ?>"> <?php echo $aRow["p_brand"] ?></option>
            <!-- Default value from db -->
            <?php echo $sMerkHtml ?>
          </select><br>
          <label>Foto</label><br>
          <input type="file" name="p_file"><br>
          <label>Beschrijving</label><br>
          <textarea name="p_description" id="p_description" rows="8"><?php echo $aRow['p_description'] ?></textarea><br>
          <input name="editProductButton" type="submit" value="Bijwerken" button">
        </form>
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
}
?>