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

<main class="product-overview">
    <section class="product-overview">
      <div class="product-overview-wrapper">
        <h3>Overzicht van alle producten</h3>
        <div class="product-overview-searchbar">
          <form action="#" method="post" class="search-form">
            <input type="text" name="search" id="search" class="search-input" placeholder="Zoek product...">
          </form>
          <!---Different Form--->
          <form action="#" method="post" class="product-filter-form">
            <div class="select-container radio">
              <input type="radio" name="SelectValue" class="input_filter" value="ID">
              <label for="SelectValue">ID</label><br>
            </div>
            <div class="select-container radio">
              <input type="radio" name="SelectValue" class="input_filter" value="Naam">
              <label for="SelectValue">Product Naam</label><br>
            </div>
            <div class="select-container radio">
              <input type="radio" name="SelectValue" class="input_filter" value="E-mail">
              <label for="SelectValue">Sector</label><br>
            </div>
            <div class="select-container radio">
              <input type="radio" name="SelectValue" class="input_filter" value="Firma">
              <label for="SelectValue">Merk</label><br>
            </div>
            <div class="select-container radio">
              <input type="radio" name="SelectValue" class="input_filter" value="Firma">
              <label for="SelectValue">Prijs</label><br>
            </div>
            <div class="select-container radio">
              <input type="submit" name="formSubmit" class="button sub padding-no-margin" value="Filter">
            </div>
            <div class="select-container radio">
              <input type="submit" name="formReset" class="button sub padding-no-margin" value="Reset">
            </div>
          </form>
        </div>

        <div class="products-overview">
          <h3>Producten</h3>
          <div class="product-record">
            <div class="product-data-fields">
              <div class="product-data">1</div>
              <div class="product-data">Geel Hesje</div>
              <div class="product-data">Bouw</div>
              <div class="product-data">Merk1</div>
              <div class="product-data">$15</div>
            </div>
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
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php
  
  if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
  } else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
  } else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/footer.php";
  }
}

?>
