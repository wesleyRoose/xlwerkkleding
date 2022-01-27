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

if (file_exists('./db.defaultHtml.php')) {
  include('./db.defaultHtml.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: ./db.defaultHtml.php does not exist.";
  echo $errorMessage;
  exit;
}
?>

<main class="product-overview">
  <section class="product-overview">
    <div class="product-overview-wrapper">
      <h3>Overzicht van alle producten</h3>
      <div class="filter-search-bar">
        <form action="#" method="post" class="filter-form">
          <input type="text" name="search" id="search" class="search-input" placeholder="Zoek product...">
          <div class="radio-wrapper">
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="ID">
              <label>ID</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="productName">
              <label>Product Naam</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="brand">
              <label>Merk</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="price">
              <label>Prijs</label><br>
            </div>
            <div class="flex-new radio">
              <select name="sector" class="filter-select">
                <option value="empty">Sector</option>
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
              <th>Bekijk, Bewerk, Verwijder</th>
            </tr>
          </thead>
          <tr class="product-data-row">
            <td class="product-data">1</td>
            <td class="product-data">Geel Hesje</td>
            <td class="product-data">Bouw</td>
            <td class="product-data">Merk1</td>
            <td class="product-data">Hesje</td>
            <td class="product-data">$15</td>
            <td>
              <div class="product-record-btns">
                <div class="product-data button small small-icon">
                  <i class="fas fa-eye"></i>
                </div>
                <div class="product-data button small small-icon">
                  <i class="fas fa-pencil"></i>
                </div>
                <div class="product-data button small small-icon">
                  <i class="fas fa-trash"></i>
                </div>
              </div>
            </td>
          </tr>
          <tr class="product-data-row">
            <td class=" product-data">1</td>
            <td class="product-data">Geel Hesje</td>
            <td class="product-data">Bouw</td>
            <td class="product-data">Merk1</td>
            <td class="product-data">Hesje</td>
            <td class="product-data">$15</td>
            <td class="product-records-btns-cell">
              <div class="product-record-btns">
                <div class="product-data button small small-icon">
                  <i class="fas fa-eye"></i>
                </div>
                <div class="product-data button small small-icon">
                  <i class="fas fa-pencil"></i>
                </div>
                <div class="product-data button small small-icon">
                  <i class="fas fa-trash"></i>
                </div>
              </div>
            </td>
          </tr>

        </table>
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