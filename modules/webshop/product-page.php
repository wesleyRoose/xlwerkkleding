<?php

$_SESSION = [];

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

if(isset ($_GET["pressed"])){
    var_dump($_GET);
    var_dump($_POSt);
    exit;
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

<div class="overlay" id="overlay" <?php
                                    if (isset($_GET["state"])) {
                                        if ($_GET["state"] == "pressed") {
                                            echo 'style="display:block;';
                                        }
                                    }
                                    ?>></div>
<main class="product-page">
    <section class="product-page">
        <div class="page-wrapper">
            <form action="?state=pressed&product=<?php echo $_GET["product"] ?>" method="post">
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
                            <input type="submit" value="BESTEL">
                            <?php
                            if (isset($_GET["state"])) {
                                if ($_GET["state"] == "pressed") {
                                    echo '<div id="orderBox" class="order-box" style="display:block;">
                                    <div class="order-box-content">
                                        <h3>Product is toegevoegd aan uw winkelmandje</h3>
                                        <div class="dialog-buttons">
                                            <button class="no-margin"><a href="' . ROOT_URL . 'modules/shopping-cart/index.php">Naar Cart</a></button>
                                            <button class="no-margin" style="margin-left: 5px !important;"><a href="' . ROOT_URL . 'modules/webshop/product-page.php?product=' . $_GET["product"] . '">Shop Verder</a></button>
                                        </div>
                                    </div>
                                </div>';
                                }
                            }
                            ?>

                            <div class="description">
                                <h4 class="desc-title">Beschrijving</h4>
                                <li class="product-list-item smaller">
                                    <?php echo $aRow["p_description"] ?>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </form>
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