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
        <div class="users-overview-searchbar">
          <form action="#" method="post" class="search-form">
            <input type="text" name="search" id="search" class="search-input" placeholder="Zoek user...">
          </form>
          <!---Different Form--->
          <form action="#" method="post" class="user-filter-form">
            <div class="select-container radio">
              <input type="radio" name="selectValue" class="input_filter" value="ID">
              <label for="ID">ID</label><br>
            </div>
            <div class="select-container radio">
              <input type="radio" name="selectValue" class="input_filter" value="Naam">
              <label for="name">Naam</label><br>
            </div>
            <div class="select-container radio">
              <input type="radio" name="selectValue" class="input_filter" value="E-mail">
              <label for="e-mail">E-Mail</label><br>
            </div>
            <div class="select-container radio">
              <input type="radio" name="selectValue" class="input_filter" value="Firma">
              <label for="firma">Firma</label><br>
            </div>
            <div class="select-container radio">
              <input type="submit" name="formSubmit" class="button sub padding-no-margin" value="Filter">
            </div>
            <div class="select-container radio">
              <input type="submit" name="formReset" class="button sub padding-no-margin" value="Reset">
            </div>
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