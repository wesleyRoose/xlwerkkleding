<?php

//load controller
if (file_exists('../../controller.php')) {
    include('../../controller.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: controller.php does not exist.";
    echo $errorMessage;
    exit;
}

if ($_SESSION["sessionStatus"] != 1 && $_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
    header('Location: ' . ROOT_URL . 'index.php');
}

?>

<main class="checkout">
    <section class="checkout">
        <div class="checkout-wrapper">
            <div class="checkout-content">
                <h1>Checkout</h1>
                <div class="checkout-flex">
                    <div class="group">
                        <h3>Overzicht</h3>
                        <div class="checkout-summary">
                            <?php

                                for($i = 0; $i < 10; $i++) {
                                    echo '<div class="checkout-item">
                                        <div class="item-number item">1</div>
                                        <div class="item-name item">Blauwe overall</div>
                                        <div class="item-amount item">3x</div>
                                        <div class="item-price item">€100</div>
                                    </div>';
                                }

                            ?>
                            <div class="total">Totaal: €1000</div>
                        </div>
                    </div>
                    <div class="group">
                        <form action="" class="form f-width" method="post" autocomplete="off">
                            <h3>Verzendgegevens</h3>
                            <label>Adres</label><br>
                            <input type="text" name="u_adres" id="u_adres" class="checkout-input"><br>
                            <label>Postcode</label><br>
                            <input type="text" name="u_zipcode" id="u_zipcode" class="checkout-input"><br>
                            <label>Woonplaats</label><br>
                            <input type="text" name="u_residence" id="u_residence" class="checkout-input"><br>
                            <label>Land</label><br>
                            <input type="text" name="u_country" id="u_country" class="checkout-input"><br>
                            <br>
                            <h3>Betaalingsopties</h3>
                            <input type="radio" name="idl_option" id="idl_option">
                            <label class="label-left">iDeal</label><br>
                            <input type="radio" name="mscard_option" id="mscard_option">
                            <label class="label-left">Mastercard</label><br>
                            <input type="radio" name="bct_option" id="bct_option">
                            <label class="label-left">Bancontact</label><br>
                            <input type="radio" name="kln_option" id="kln_option">
                            <label class="label-left">Klarna</label><br>
                            <input type="submit" value="Volgende">
                        </form>
                    </div>
                </div>
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