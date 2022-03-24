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
            <div class="shopping-cart-items">
                <?php echo $sHtml ?>
            </div>
            <div class="del-button">
                <button>
                    Verwijder Alle
                </button>
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