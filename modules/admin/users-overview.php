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

if ($_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
  header('Location: ' . ROOT_URL . 'index.php');
} else {


  if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/header-user.php";
  } else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/header-admin.php";
  } else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/header.php";
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
  } else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/footer.php";
  }
}
?>