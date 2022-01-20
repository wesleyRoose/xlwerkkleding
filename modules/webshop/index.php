<?php

session_start();

if (!isset($_SESSION["sessionStatus"])) {
  $_SESSION["sessionStatus"] = 0;
}

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



if ($_SESSION["sessionStatus"] == 1) {
  include "../../templates/header-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
  include "../../templates/header-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
  include "../../templates/header.php";
}
?>

<main class="webshop">
  <section class="webshop">
    <div class="page-wrapper">
      <h1 class="title">Webshop</h1>
      <form action="index.php" method="post" class="f-width">
        <div class="filter-bar">
          <div class="select-container">
            <div class="label-check">
              <label>Categorie</label>
              <div class="check-box">
                <input type="checkbox" name="filterCheckBox[]" value="categories" checked>
              </div>
            </div>
            <select name="categories" class="webshop-filter-select">
              <option value="Jassen">Jassen</option>
              <option value="Overallen">Overallen</option>
              <option value="Broeken">Broeken</option>
              <option value="Overige">Overige</option>
            </select>
          </div>
          <div class="select-container">
            <div class="label-check">
              <label>Sector</label>
              <div class="check-box">
                <input type="checkbox" name="filterCheckBox[]" value="sector" checked>
              </div>
            </div>
            <select name="sector" class="webshop-filter-select">
              <option value="Bouw">Bouw</option>
              <option value="Zorg">Zorg</option>
              <option value="Schoonmaak">Schoonmaak</option>
              <option value="Kantoor">Kantoor</option>
              <option value="Fabriek">Fabriek</option>
            </select>
          </div>
          <div class="select-container">
            <div class="label-check">
              <label>Merk</label>
              <div class="check-box">
                <input type="checkbox" name="filterCheckBox[]" value="brand" checked>
              </div>
            </div>
            <select name="brand" class="webshop-filter-select">
              <option value="Merk1">Merk1</option>
              <option value="Merk2">Merk2</option>
              <option value="Merk3">Merk3</option>
              <option value="Merk4">Merk4</option>
              <option value="Merk5">Merk5</option>
            </select>
          </div>
          <div class="select-container">
            <div class="label-check">
              <label>Geslacht</label>
              <div class="check-box">
                <input type="checkbox" name="filterCheckBox[]" value="gender" checked>
              </div>
            </div>
            <select name="gender" class="webshop-filter-select">
              <option value="Man">Man</option>
              <option value="Vrouw">Vrouw</option>
            </select>
          </div>
          <div class="select-container">
            <input type="submit" name="formSubmit" class="button sub" value="Filter">
          </div>
          <div class="select-container">
            <input type="submit" name="formReset" class="button sub" value="Reset">
          </div>
        </div>
      </form>
    </div>
  </section>

  <section class="webshop-cards">

    <?php

    $sDefaultHtml = '';
    $sDefaultHtml = '<div class="cards">
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/placeholder.png" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
<div class="card">
<div class="image">
  <img src=" ' . ROOT_URL . 'img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
</div>
<div class="text">
  <h3>Product 1</h3>
  <a href="#" class="card-link">Klik hier</a>
</div>
</div>
</div>';

    // Generating results from Search engine
    // Check if formSubmit is pressed
    if (isset($_POST["formSubmit"])) {
      // Check how many and which filters are selected
      $aFilterCheckBoxes = $_POST["filterCheckBox"];
      $iFilterLength = count($aFilterCheckBoxes);


      // Creating arrays for later use in the query
      $aQueryData = array();

      // Array for brands
      // Check if `brand` is selected
      if (in_array("brand", $aFilterCheckBoxes)) {
        $aBrand = array();
        if (isset($_POST["brand"])) {
          $aBrand = array("p_brand", $_POST["brand"]);
          array_push()
        }
      }

      // Array for Categories
      // Check if `categories` is selected
      if (in_array("categories", $aFilterCheckBoxes)) {
        $aCategories = array();
        if (isset($_POST["categories"])) {
          $aCategories = array("p_category", $_POST["categories"]);
        }
      }

      // Array for sector
      // Check if `sector` is selected
      if (in_array("sector", $aFilterCheckBoxes)) {
        $aSector = array();
        if (isset($_POST["sector"])) {
          $aSector = array("p_sector", $_POST["sector"]);
        }
      }

      // Creating an complete array for the Query
      $aQueryData = array($aBrand, $aCategories, $aSector);

      print_r($aQueryData[0][1]);

      $iFilterCounter = $iFilterLength--;

      // $query = "SELECT * FROM `product` WHERE `p_id` = 1 AND `p_name` = 'test'";



      // if ($iFilterLength == 1) {

      // } else if ($iFilterLength == 2) {
      // } else if ($iFilterLength == 3) {
      // } else if ($iFilterLength == 4) {
      // } else {
      // }



      // Check if formReset is pressed
    } else if (isset($_POST["formReset"])) {
      echo $sDefaultHtml;
      // Check if nothing is pressed
    } else {
      echo $sDefaultHtml;
    }

    ?>

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

?>