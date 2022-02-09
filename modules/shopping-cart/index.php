<?php

if (file_exists('../../controller.php')) {
    include('../../controller.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: controller.php does not exist.";
    echo $errorMessage;
    exit;
}


if ($_SESSION["sessionStatus"] != 2 && $_SESSION["sessionStatus"] != 1 || empty($_SESSION["sessionStatus"])) {
    header('Location: ' . ROOT_URL . 'index.php');
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
                <button>
                    <a href="<?php echo ROOT_URL ?>modules/webshop/checkout.php" class="white">Afrekenen</a>
                </button>
            </div>
        </div>
    </section>
</main>

<?php

if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
} else {
    include "../../templates/footer.php";
}
?>