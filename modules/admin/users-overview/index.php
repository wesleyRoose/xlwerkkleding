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
        <form action="index.php" method="post" class="filter-form">
          <input type="text" name="search" id="search" class="search-input" placeholder="Zoek gebruiker...">
          <div class="radio-wrapper">
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="id">
              <label>ID</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="username">
              <label>Gebruikersnaam</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="email">
              <label>E-mail</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="firstName">
              <label>Voornaam</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="lastName">
              <label>Achternaam</label><br>
            </div>
            <div class="flex-new radio">
              <input type="radio" name="selectValue" class="input_filter" value="firm">
              <label>Firma</label><br>
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
              <th>ID</th>
              <th>Gebruikersnaam</th>
              <th>E-mail</th>
              <th>Voornaam</th>
              <th>Achternaam</th>
              <th>Firma</th>
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
        <form action="index.php" method="post">
          <div class="filter-search-bar">

            <?php
            if (isset($_SESSION["iUserDisplayItems"])) {
              if ($_SESSION["iUserDisplayItems"] > 0) {
                $sPrevHtml = '<div class="flex-new radio">
                <input type="submit" name="prev" class="button no-margin filter-btn" value="Vorige">
              </div>';
                echo $sPrevHtml;
              }
            }
            if (isset($_SESSION["iUserDisplayItems"]) && isset($_SESSION["aUserQueryResult"])) {
              if ($_SESSION["iUserDisplayItems"] + 4 <= count($_SESSION["aUserQueryResult"])) {
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