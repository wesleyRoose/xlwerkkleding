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

// Create Query String
$sQuery = "SELECT * FROM `product` WHERE `p_id` = '" . $_GET["productId"] . "'";
// Execute Query on database connection and put the data into a Array
if ($oResult = $conn->query($sQuery)) {
    // Put data into array
    $aRow = $oResult->fetch_assoc();
}

?>

<main class="product-page">
    <section class="product-page">
        <div class="page-wrapper">
            <div class="flex">
                <div class="product-image">
                    <img src="<?php echo ROOT_URL . 'modules/admin/' . $aRow["p_foto"] ?>" alt="Placeholder Image" class="card-image">
                </div>
                <div class="product-info">
                    <ul class="info-list">
                        <li class="product-list-item">
                            <h3><?php echo $aRow["p_name"] ?></h3>
                        </li>
                        <li class="product-list-item smaller"><?php echo $aRow["p_category"] ?></li>
                        <li class="product-list-item smaller"><?php echo $aRow["p_sector"] ?></li>
                        <li class="product-list-item smaller"><?php echo $aRow["p_brand"] ?></li>
                        <li class="product-list-item smaller"><?php echo $aRow["p_price"] ?></li>
                        <div class="selects">
                            <select name="sizes">
                                <option value="<?php echo $aRow["p_size"] ?>"><?php echo $aRow["p_size"] ?></option>
                            </select>
                            <select name="Kleuren">
                                <option value="<?php echo $aRow["p_color"] ?>"><?php echo $aRow["p_color"] ?></option>
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
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/footer.php";
} ?>