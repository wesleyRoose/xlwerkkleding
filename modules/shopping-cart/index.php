<?php

session_start();

    //config page
    if (file_exists('../../config.php')) {
        include('../../config.php');
    } else {
        $errorMessage = "";
        $errorMessage .= "PHP ERROR: config.php does not exist.";
        echo $errorMessage;
        exit;
    }

        // functions page
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

        //header
        if ($_SESSION["sessionStatus"] == 1) {
            include "../../templates/header-user.php";
        } else if ($_SESSION["sessionStatus"] == 2) {
            include "../../templates/header-admin.php";
        } else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
            include "../../templates/header.php";
        }
    }
?>

<main class="shopping-cart">
    <section class="shopping-cart">
        <div class="shopping-cart-wrapper">
            <h3>Uw Winkelmandje</h3>
            <div class="shopping-cart-items">
                <div class="shopping-cart-item">
                    <div class="shopping-cart-info">
                        <div class="product-image small-image item-margin">

                        </div>
                        <div class="shopping-cart-product-number item-margin">
                            1
                        </div>
                        <div class="shopping-cart-product-title item-margin">
                            Leren Werkschoenen
                        </div>
                        <div class="shopping-cart-product-price item-margin">
                            $25
                        </div>
                        <div class="shopping-cart-product-quantity item-margin">
                            2x
                        </div>
                    </div>
                    <div class="shopping-cart-buttons">
                        <div class="product-data button small small-icon black">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-button">
                <button>Afrekenen</button>
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