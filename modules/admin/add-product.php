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

    <main class="add-products">
        <section class="add-products-s">
            <div class="input-form">
                <form action="db.add-terms" method="post" class="term-form" id="term-form" autocomplete="off" enctype="multipart/form-data">
                    <h3 class="form-header">Hier kun je nieuwe termen toevoegen</h3>
                    <label>Term</label><br>
                    <input type="text" name="new_term" id="new_term"><br>
                    <label>Waarde</label><br>
                    <input type="text" name="new_value" id="new_value"><br>
                    <input type="submit" value="Voeg toe">
                    <p class="error-message">DE PLEK VOOR AL UW ERRORS</p>
                </form>
            </div>
            <div class="input-form">
                <form action="db.add-product.php" method="post" class="product-form" id="product-form" autocomplete="off" enctype="multipart/form-data">
                    <h3 class="form-header">Hier kun je producten toevoegen</h3>
                    <label>Product Naam</label><br>
                    <input type="text" name="p_name" id="p_name" class="p-input"><br>
                    <label>Prijs</label><br>
                    <input type="text" name="p_price" id="p_price" class="p-input"><br>
                    <label>Maat</label><br>
                    <input type="text" name="p_size" id="p_size" class="p-input"><br>
                    <label>Kleur</label><br>
                    <input type="text" name="p_color" id="p_color" class="p-input"><br>
                    <label>Categorie</label><br>
                    <select name="categories" class="add-product-select webshop-filter-select">
                        <option value="jassen">Jassen</option>
                    </select><br>
                    <label>Sectorgroep</label><br>
                    <select name="sectors" class="add-product-select webshop-filter-select">
                        <option value="bouw">Bouw</option>
                    </select><br>
                    <label>Merk</label><br>
                    <select name="brand" class="add-product-select webshop-filter-select">
                        <option value="merk1">Merk1</option>
                    </select><br>
                    <label>Foto</label><br>
                    <input type="file" name="p_file"><br>
                    <label>Beschrijving</label><br>
                    <textarea name="p_description" id="p_description" rows="8" placeholder="Type Here"></textarea><br>
                    <input name="addProductButton" type="submit" value="Voeg Toe" class="button">
                </form>


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