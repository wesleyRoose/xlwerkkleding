<?php

session_start();

if(!isset($_SESSION["sessionStatus"])){
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
            <div class="filter-bar">
              <div class="select-container">
                  <label>Types</label><br>
                  <select name="types" class="webshop-filter-select">
                      <option value="Jassen">Jassen</option>
                      <option value="Overallen">Overallen</option>
                      <option value="Broeken">Broeken</option>
                    <option value="Overige">Overige</option>
                  </select>
              </div>
              <div class="select-container">
                  <label>Sector</label><br>
                  <select name="types" class="webshop-filter-select">
                      <option value="Bouw">Bouw</option>
                      <option value="Zorg">Zorg</option>
                      <option value="Schoonmaak">Schoonmaak</option>
                      <option value="Kantoor">Kantoor</option>
                      <option value="Fabriek">Fabriek</option>
                  </select>
              </div>
              <div class="select-container">
                  <label>Merk</label><br>
                  <select name="types" class="webshop-filter-select">
                      <option value="Merk1">Merk1</option>
                      <option value="Merk2">Merk2</option>
                      <option value="Merk3">Merk3</option>
                      <option value="Merk4">Merk4</option>
                      <option value="Merk5">Merk5</option>
                  </select>
              </div>
              <div class="select-container">
                  <label>Geslacht</label><br>
                  <select name="types" class="webshop-filter-select">
                      <option value="Merk1">Man</option>
                      <option value="Merk2">Vrouw</option>
                  </select>
              </div>
              <div class="select-container">
                <input type="submit" class="button sub" value="Filter">
              </div>
            </div>
        </div>
    </section>

    <section class="webshop-cards">
    <div class="cards">
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/placeholder.png" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
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

?>