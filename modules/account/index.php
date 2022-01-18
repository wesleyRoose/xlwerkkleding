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

<main class="account-page">
    <section class="account-page">
        <div class="account-page-wrapper">
            <div class="account-page-content">
                <div class="account-page-user-info">
                <h4>Accountoverzicht</h4>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <p class="account-page-info-text">Stefan</p>
                        <button class="small orange"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <p class="account-page-info-text">Maring</p>
                        <button class="small orange"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-user-tag"></i>
                        </div>
                        <p class="account-page-info-text">StefanM</p>
                        <button class="small orange"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <p class="account-page-info-text">stefan@xlwerkkleding.nl</p>
                        <button class="small orange"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <p class="account-page-info-text">01234557879</p>
                        <button class="small orange"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <p class="account-page-info-text">XLwerkkleding</p>
                        <button class="small orange"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <button>Verwijder Profiel</button>
                </div>
                <div class="previous-orders">
                <h4>Bestellingen</h4>
                    <div class="previous-order">
                        <div class="prev-order-data">
                            <p class="prev-order-title">Reflecterende Jas</p>
                            <p class="prev-order-date">18-1-2022</p>
                        </div>
                        <div class="prev-order-btn button small orange">
                            <a href="#" class="prev-btn-link-color"><i class="fas fa-link no-margin"></i></a>
                        </div>
                    </div>
                    <div class="previous-order">
                        <div class="prev-order-data">
                            <p class="prev-order-title">Reflecterende Jas</p>
                            <p class="prev-order-date">18-1-2022</p>
                        </div>
                        <div class="prev-order-btn button small orange">
                            <a href="#" class="prev-btn-link-color"><i class="fas fa-link no-margin"></i></a>
                        </div>
                    </div>
                    <div class="previous-order">
                        <div class="prev-order-data">
                            <p class="prev-order-title">Reflecterende Jas</p>
                            <p class="prev-order-date">18-1-2022</p>
                        </div>
                        <div class="prev-order-btn button small orange">
                            <a href="#" class="prev-btn-link-color"><i class="fas fa-link no-margin"></i></a>
                        </div>
                    </div>
                    <div class="previous-order">
                        <div class="prev-order-data">
                            <p class="prev-order-title">Reflecterende Jas</p>
                            <p class="prev-order-date">18-1-2022</p>
                        </div>
                        <div class="prev-order-btn button small orange">
                            <a href="#" class="prev-btn-link-color"><i class="fas fa-link no-margin"></i></a>
                        </div>
                    </div>
                    <div class="previous-order">
                        <div class="prev-order-data">
                            <p class="prev-order-title">Reflecterende Jas</p>
                            <p class="prev-order-date">18-1-2022</p>
                        </div>
                        <div class="prev-order-btn button small orange">
                            <a href="#" class="prev-btn-link-color"><i class="fas fa-link no-margin"></i></a>
                        </div>
                    </div>
                    <button style="margin-top: 24px;">Meer</button>
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
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/footer.php";
}
?>