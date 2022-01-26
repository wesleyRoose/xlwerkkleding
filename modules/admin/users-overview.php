<?php

//load controller
if (file_exists('../../controller.php')) {
    include('../../controller.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: controller.php does not exist.";
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
              <div class="select-container radio">
                <input type="radio" name="selectValue" class="input_filter" value="ID">
                <label for="ID">ID</label><br>
              </div>
              <div class="select-container radio">
                <input type="radio" name="selectValue" class="input_filter" value="Product Naam">
                <label for="name">Product Naam</label><br>
              </div>
              <div class="select-container radio">
                <input type="radio" name="selectValue" class="input_filter" value="Merk">
                <label for="e-mail">Merk</label><br>
              </div>
              <div class="select-container radio">
                <input type="radio" name="selectValue" class="input_filter" value="Prijs">
                <label for="firma">Prijs</label><br>
              </div>
              <div class="select-container radio">
                <select name="brand" class="webshop-filter-select filter-select">
                  <?php echo $sSectorHtml ?>
                </select>
              </div>
              <div class="select-container radio">
                <select name="brand" class="webshop-filter-select filter-select">
                  <?php echo $sSectorHtml ?>
                </select>
              </div>
            </div>
            <!-- <div class="select-container radio">
              <input type="submit" name="formSubmit" class="button sub padding-no-margin" value="Filter">
            </div>
            <div class="select-container radio">
              <input type="submit" name="formReset" class="button sub padding-no-margin" value="Reset">
            </div> -->
          </form>
        </div>

        <div class="user-overview">
          <h3>Gebruikers</h3>
          <div class="user-record">
            <div class="user-data-fields">
              <div class="user-data">1</div>
              <div class="user-data">Stefan</div>
              <div class="user-data">hello@world.nl</div>
              <div class="user-data">XLwerkkleding BV</div>
            </div>
            <div class="user-record-btns">
              <div class="user-data button small small-icon">
                <i class="fas fa-eye"></i>
              </div>
              <div class="user-data button small small-icon">
                <i class="fas fa-pencil"></i>
              </div>
              <div class="user-data button small small-icon">
                <i class="fas fa-trash"></i>
              </div>
            </div>
          </div>
          <div class="user-record">
            <div class="user-data-fields">
              <div class="user-data">1</div>
              <div class="user-data">Stefan</div>
              <div class="user-data">hello@world.nl</div>
              <div class="user-data">XLwerkkleding BV</div>
            </div>
            <div class="user-record-btns">
              <div class="user-data button small small-icon">
                <i class="fas fa-eye"></i>
              </div>
              <div class="user-data button small small-icon">
                <i class="fas fa-pencil"></i>
              </div>
              <div class="user-data button small small-icon">
                <i class="fas fa-trash"></i>
              </div>
            </div>
          </div>
          <div class="user-record">
            <div class="user-data-fields">
              <div class="user-data">1</div>
              <div class="user-data">Stefan</div>
              <div class="user-data">hello@world.nl</div>
              <div class="user-data">XLwerkkleding BV</div>
            </div>
            <div class="user-record-btns">
              <div class="user-data button small small-icon">
                <i class="fas fa-eye"></i>
              </div>
              <div class="user-data button small small-icon">
                <i class="fas fa-pencil"></i>
              </div>
              <div class="user-data button small small-icon">
                <i class="fas fa-trash"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
  } else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
  } else {
    include "../../templates/footer.php";
  }
?>