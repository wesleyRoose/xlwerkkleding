<?php
include("../../config.php");
include("../../functions.php");

include("../../templates/header-admin.php");?>

<main class="add-products">
    <section class="add-products-s">
        <div class="input-form">
            <form action="db.add-product.php" method="post" class="product-form" id="product-form" autocomplete="off">
                <h3>Hier kun je producten toevoegen</h3>
                <label>Product Naam</label><br>
                <input type="text" name="p-name" id="p-name" class="p-input"><br>
                <label>Categorie</label><br>
                <input type="text" name="p-category" id="p-category" class="p-input"><br>
                <label>Sectorgroep</label><br>
                <input type="text" name="p-sector" id="p-sector" class="p-input"><br>
                <label>Merk</label><br>
                <input type="text" name="p-brand" id="p-brand" class="p-input"><br>
                <label>Prijs</label><br>
                <input type="text" name="p-price" id="p-price" class="p-input"><br>
                <label>Maat</label><br>
                <input type="text" name="p-size" id="p-size" class="p-input"><br>
                <label>Kleur</label><br>
                <input type="text" name="p-color" id="p-color" class="p-input"><br>
                <label>Beschrijving</label><br>
                <textarea name="p-description" id="p-description" rows="8" placeholder="Type Here"></textarea><br>
                <input type="submit" value="Voeg Toe" class="button">
            </form>
        </div>
    </section>
</main>

<?php include("../../templates/footer-admin.php");?>