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
            <form action="db.add-product.php" method="post" class="product-form" id="product-form" autocomplete="off">
                <h3>Hier kun je producten toevoegen</h3>
                <label>Product Naam</label><br>
                <input type="text" name="p_name" id="p_name" class="p-input"><br>
                <label>Categorie</label><br>
                <input type="text" name="p_category" id="p_category" class="p-input"><br>
                <label>Sectorgroep</label><br>
                <input type="text" name="p_sector" id="p_sector" class="p-input"><br>
                <label>Merk</label><br>
                <input type="text" name="p_brand" id="p_brand" class="p-input"><br>
                <label>Prijs</label><br>
                <input type="text" name="p_price" id="p_price" class="p-input"><br>
                <label>Maat</label><br>
                <input type="text" name="p_size" id="p_size" class="p-input"><br>
                <label>Kleur</label><br>
                <input type="text" name="p_color" id="p_color" class="p-input"><br>
                <label>Foto</label><br>
                <input type="file" name="p_file" id="p_file" class="p-input"><br>
                <label>Beschrijving</label><br>
                <textarea name="p_description" id="p_description" rows="8" placeholder="Type Here"></textarea><br>
                <input type="submit" value="Voeg Toe" class="button">
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

?>


<?php include("../../templates/footer-admin.php"); ?>