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

    // Generating results from Search engine
    // Check if formSubmit is pressed
    if (isset($_POST["formSubmit"])) {
      // Check how many and which filters are selected
      if (isset($_POST["filterCheckBox"])) {
        $aFilterCheckBoxes = $_POST["filterCheckBox"];

        // Creating arrays for later use in the query
        $aQueryData = array();

        // Array for brands
        // Check if `brand` is selected
        if (in_array("brand", $aFilterCheckBoxes)) {
          $aBrand = array();
          if (isset($_POST["brand"])) {
            $aBrand = array("p_brand", $_POST["brand"]);
            // Add array to complete array
            array_push($aQueryData, $aBrand);
          }
        }

        // Array for Categories
        // Check if `categories` is selected
        if (in_array("categories", $aFilterCheckBoxes)) {
          $aCategories = array();
          if (isset($_POST["categories"])) {
            $aCategories = array("p_category", $_POST["categories"]);
            // Add array to complete array
            array_push($aQueryData, $aCategories);
          }
        }

        // Array for sector
        // Check if `sector` is selected
        if (in_array("sector", $aFilterCheckBoxes)) {
          $aSector = array();
          if (isset($_POST["sector"])) {
            $aSector = array("p_sector", $_POST["sector"]);
            // Add array to complete array
            array_push($aQueryData, $aSector);
          }
        }

        // print_r($aQueryData);
        // Check if array is not empty, if so skip first query building
        if (!empty($aQueryData)) {
          // Get length of Array for query building
          $iFilterLength = count($aQueryData);


          // $query = "SELECT * FROM `product` WHERE `p_id` = 1 AND `p_name` = 'test'";



          if ($iFilterLength == 1) {
            $sQuery = "SELECT * FROM `product` WHERE `" . $aQueryData[0][0] . "` = '" . $aQueryData[0][1] . "'";
          } else if ($iFilterLength == 2) {
            $sQuery = "SELECT * FROM `product` WHERE `" . $aQueryData[0][0] . "` = '" . $aQueryData[0][1] . "' AND `" . $aQueryData[1][0] . "` = '" . $aQueryData[1][1] . "'";
          } else if ($iFilterLength == 3) {
            $sQuery = "SELECT * FROM `product` WHERE `" . $aQueryData[0][0] . "` = '" . $aQueryData[0][1] . "' AND `" . $aQueryData[1][0] . "` = '" . $aQueryData[1][1] . "' AND `" . $aQueryData[2][0] . "` = '" . $aQueryData[2][1] . "'";
          }
          if ($oResult = $conn->query($sQuery)) {
            while ($aRow = $oResult->fetch_assoc()) {
              $sDefaultHtml .= '<div class="cards">
      <div class="card">
      <div class="image">
        <img src=" ' . ROOT_URL . 'modules/admin/' . $aRow["p_foto"] . '" alt="Placeholder Image" class="card-image">
      </div>
      <div class="text">
        <h3>' . $aRow["p_name"] . '</h3>
        <p>' . $aRow["p_sector"] . '</p>
        <a href="' . ROOT_URL . "modules/webshop/product-page.php?productId=" . $aRow["p_id"] . '" class="card-link">Klik hier</a>
      </div>
      </div>';
            }
          } else {
          }
        }
      }



      echo $sDefaultHtml;

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