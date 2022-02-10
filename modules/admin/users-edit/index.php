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

// Unset session vars
if (isset($_SESSION["aUserQueryResult"])) {
  unset($_SESSION["aUserQueryResult"]);
}

if (isset($_SESSION["iUserDisplayItems"])) {
  $_SESSION["iUserDisplayItems"] = 0;
}

if (file_exists('db.loadUserData.php')) {
  include('db.loadUserData.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: db.loadUserData.php does not exist.";
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
        <form action="db.editUser.php?user=<?php echo $_GET["user"] ?>" method="post" class="product-form" id="product-form" autocomplete="off" enctype="multipart/form-data">
          <h3 class="form-header">Hier kun je '<?php echo $aRow["firstName"] . " " . $aRow["lastName"] ?>' bijwerken</h3>
          <label>Gebruikersnaam:</label><br>
          <input value="<?php echo $aRow['username'] ?>" type="text" name="username" id="username" class="p-input"><br>
          <label>Voornaam:</label><br>
          <input value="<?php echo $aRow['firstName'] ?>" type="text" name="firstName" id="firstName" class="p-input"><br>
          <label>Achternaam:</label><br>
          <input value="<?php echo $aRow['lastName'] ?>" type="text" name="lastName" id="lastName" class="p-input"><br>
          <label>Email:</label><br>
          <input value="<?php echo $aRow['email'] ?>" type="text" name="email" id="email" class="p-input"><br>
          <label>Telefoon Nummer:</label><br>
          <input value="<?php echo $aRow['phoneNumber'] ?>" type="text" name="phoneNumber" id="phoneNumber" class="p-input"><br>
          <label>Firma:</label><br>
          <input value="<?php echo $aRow['firm'] ?>" type="text" name="firm" id="firm" class="p-input"><br>
          <label>Rechten:</label><br>
          <select class="add-product-select webshop-filter-select" name="rights" id="rights">
            <?php echo $sDefaultRights ?>
          </select>
          <input name="editUserButton" type="submit" value="Bijwerken" button">
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