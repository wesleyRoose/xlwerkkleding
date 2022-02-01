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

?>

<main class="users-overview">
  <section class="users-overview">
    <div class="users-overview-wrapper">
      <h3>Overzicht van alle gebruikers</h3>
      <div class="filter-search-bar">
        <form action="#" method="post" class="filter-form">
          <input type="text" name="search" id="search" class="search-input" placeholder="Zoek user...">
          <div class="radio-wrapper">
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="ID">
              <label>PLACEHOLDER</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="productName">
              <label>PLACEHOLDER</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="brand">
              <label>PLACEHOLDER</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="price">
              <label>PLACEHOLDER</label><br>
            </div>
            <div class="flex-new radio">
              <select name="sector" class="filter-select">
                <option value="empty">PLACEHOLDER</option>
              </select>
            </div>
            <div class="flex-new radio">
              <select name="catagory" class="filter-select">
                <option value="empty">PLACEHOLDER</option>
                <?php //echo $sCatagoryHtml 
                ?>
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

      <div class="user-overview">
        <h3>Gebruikers</h3>
        <table class="product-records-table" style="background-color: var(--sub-color);" border="0">
          <thead>
            <tr style="background-color: var(--main-color);">
              <th>PLACEHOLDER</th>
              <th>PLACEHOLDER</th>
              <th>PLACEHOLDER</th>
              <th>PLACEHOLDER</th>
              <th>PLACEHOLDER</th>
              <th>PLACEHOLDER</th>
              <th>Bekijk, Bewerk, Verwijder</th>
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
          ?>

        </table>
      </div>
    </div>
    </div>
  </section>
</main>

<?php if ($_SESSION["sessionStatus"] == 1) {
  include "../../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
  include "../../../templates/footer-admin.php";
} else {
  include "../../../templates/footer.php";
}
?>