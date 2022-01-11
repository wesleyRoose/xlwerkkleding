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

<!-- begin pagina -->
<main class="shopping-cart">
    <div class="shopping-field">
        <div class="cart-name">
            <p> Winkelwagen :</p>
        </div>
            <div class="shopping-bestellen">
                <button value="bestellen" placeholder="bestellen">bestellen</button>
            </div>  
    </div>
</main>



<!-- footer -->
<?php

if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/footer.php";
}
?>