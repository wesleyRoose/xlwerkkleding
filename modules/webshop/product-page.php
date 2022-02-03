<?php


if (file_exists('../../controller.php')) {
    include('../../controller.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: controller.php does not exist.";
    echo $errorMessage;
    exit;
}




// Create Query String
$sQuery = "SELECT * FROM `product` WHERE `p_id` = '" . $_GET["product"] . "'";
// Execute Query on database connection and put the data into a Array
if ($oResult = $conn->query($sQuery)) {
    // Put data into array
    $aRow = $oResult->fetch_assoc();
}

// Create Array from string
$aSizes = explode(", ", $aRow["p_size"]);
$sSizeDropHtml = "";
// Generate Select Html
foreach ($aSizes as $value) {
    $sSizeDropHtml .= '<option value="' . $value . '">' . $value . '</option>';
}

// Create Array from string
$aColors = explode(", ", $aRow["p_color"]);
$sColorDropHtml = "";
// Generate Select Html
foreach ($aColors as $value) {
    $sColorDropHtml .= '<option value="' . $value . '">' . $value . '</option>';
}

?>

<main class="product-page">
    <section class="product-page">
        <div class="page-wrapper">
            <div class="flex">
                <div class="product-image-wrapper">
                    <img src="<?php echo ROOT_URL . 'modules/admin/add/' . $aRow["p_foto"] ?>" alt="Placeholder Image" class="product-image">
                </div>
                <div class="product-info">
                    <ul class="info-list">
                        <li class="product-list-item">
                            <h3><?php echo $aRow["p_name"] ?></h3>
                        </li>
                        <li class="product-list-item smaller"><?php echo $aRow["p_category"] ?></li>
                        <li class="product-list-item smaller"><?php echo $aRow["p_sector"] ?></li>
                        <li class="product-list-item smaller"><?php echo $aRow["p_brand"] ?></li>
                        <li class="product-list-item smaller"> &#8364;<?php echo $aRow["p_price"] ?></li>
                        <div class="selects">
                            <select name="sizes" class="sorter">
                                <?php
                                echo $sSizeDropHtml;
                                ?>
                            </select>
                            <select name="Kleuren" class="sorter">
                                <?php echo $sColorDropHtml ?>
                            </select>
                        </div>
                        <button><a href="#" class="product-order-link">Bestel</a></button>
                        <div class="description">
                            <h3 class="desc-title">Beschrijving</h3>
                            <li class="product-list-item smaller">
                                <?php echo $aRow["p_description"] ?>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
} else {
    include "../../templates/footer.php";
} ?>