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


if (file_exists('../../../library/db.filterTerms.php')) {
    include('../../../library/db.filterTerms.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: db.filterTerms.php does not exist.";
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

// Unset session vars
if (isset($_SESSION["aProductQueryResult"])) {
    unset($_SESSION["aProductQueryResult"]);
}

if (isset($_SESSION["iProductDisplayItems"])) {
    $_SESSION["iProductDisplayItems"] = 0;
}



if ($_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
    header('Location: ' . ROOT_URL . 'index.php');
} else {

?>

    <main class="add-products">
        <section class="add-products-s">
            <div class="input-form">
                <form action="db.add-filterTerms.php" method="post" class="term-form" id="term-form" autocomplete="off" enctype="multipart/form-data">
                    <h3 class="form-header">Hier kun je nieuwe termen toevoegen</h3>
                    <label>Term</label><br>
                    <select name="term" class="add-product-select webshop-filter-select">
                        <option value="category">Categorie</option>
                        <option value="sector">Sector</option>
                        <option value="brand">Merk</option>
                    </select>
                    <label>Waarde</label><br>
                    <input type="text" name="new_value" id="new_value"><br>
                    <input type="submit" name="filterSubmit" value="Voeg toe">
                    <p class="error-message">
                        <?php
                        // Display result of submit
                        if (isset($_GET["msg"])) {
                            $sResult = $_GET["msg"]; // Fetching result from url
                            $sMessage = ""; // Starting error string to display

                            // Create message based on result
                            if ($sResult == "error") {
                                $sMessage .= "Deze waarde bestaat al!";
                            } else if ($sResult == "query") {
                                $sMessage .= "ERROR, contacteer een beheerder!";
                            } else if ($sResult == "succes") {
                                $sMessage .= "De waarde is succesvol toegevoegd!";
                            }

                            // Display result message
                            echo $sMessage;
                        }
                        ?>
                    </p>
                </form>
            </div>
            <div class="input-form">
                <form action="db.add-product.php" method="post" class="product-form" id="product-form" autocomplete="off" enctype="multipart/form-data">
                    <h3 class="form-header">Hier kun je producten toevoegen</h3>
                    <label>Product Naam</label><br>
                    <input type="text" name="p_name" id="p_name" class="p-input"><br>
                    <label>Prijs</label><br>
                    <input type="text" name="p_price" id="p_price" class="p-input"><br>
                    <label>Aantal Maten</label><br>

                    <input type="number" name="numberOfSizes" id="numberOfSizes" value="1">
                    <div style="display: flex;">
                        <div style="margin-right: 5px;" class="button" style="width: 40%!important;" onclick="numberOfSizesConfirm('add')">Meer Maten</div>
                        <div style="margin-left: 5px;" class="button" style="width: 40%!important;" onclick="numberOfSizesConfirm('reset')">Reset</div>
                    </div>
                    <div class="sizeSelecterWrapper" id="sizesWrapper">
                    </div>
                    <label>Aantal Kleuren</label><br>
                    <input type="number" name="numberOfColors" id="numberOfColors" value="1">
                    <div style="display: flex;">
                        <div style="margin-right: 5px;" class="button" style="width: 40%!important;" onclick="numberOfColorsConfirm('add')">Meer Kleuren</div>
                        <div style="margin-left: 5px;" class="button" style="width: 40%!important;" onclick="numberOfColorsConfirm('reset')">Reset</div>
                    </div>
                    <div class="colorSelecterWrapper" id="colorWrapper">

                    </div>
                    <label>Categorie</label><br>
                    <select name="p_category" class="add-product-select webshop-filter-select">
                        <option value="nvt">Niet van Toepassing</option>
                        <?php echo $sCatagoryHtml ?>
                    </select><br>
                    <label>Sectorgroep</label><br>
                    <select name="p_sector" class="add-product-select webshop-filter-select">
                        <option value="nvt">Niet van Toepassing</option>
                        <?php echo $sSectorHtml ?>
                    </select><br>
                    <label>Merk</label>
                    <select name="p_brand" class="add-product-select webshop-filter-select">
                        <option value="nvt">Niet van Toepassing</option>
                        <?php echo $sMerkHtml ?>
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
        include "../../../templates/footer-user.php";
    } else if ($_SESSION["sessionStatus"] == 2) {
        include "../../../templates/footer-admin.php";
    } else {
        include "../../../templates/footer.php";
    }
}
?>