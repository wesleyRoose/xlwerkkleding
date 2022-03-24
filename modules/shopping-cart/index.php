<?php


if (file_exists('../../controller.php')) {
    include('../../controller.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: controller.php does not exist.";
    echo $errorMessage;
    exit;
}


if (file_exists('../../library/db.filterTerms.php')) {
    include('../../library/db.filterTerms.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: db.filterTerms.php does not exist.";
    echo $errorMessage;
    exit;
}

include('defaultHtml.php');

?>

<main class="shopping-cart">
    <section class="shopping-cart">
        <div class="shopping-cart-wrapper">
            <h3>Uw Winkelmandje</h3>
            <div class="message">
                <?php
                if (isset($_GET["msg"])) {
                    if ($_GET["msg"] == "all") {
                        echo "Uw winkelmandje is leeg gehaald.";
                    } else if ($_GET["msg"] == "item") {
                        echo "Het product is uit uw winkelmandje verwijderd";
                    }
                }
                ?>
            </div>
            <?php
            if ((!empty($_SESSION["shoppingCart"]))) {
                echo '
            <div class="del-button">
                <a href="clearCart.php"><button>
                    Verwijder Alle
                </button></a>
            </div>';
            }
            ?>
            <div class="shopping-cart-items">
                <?php echo $sHtml ?>
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