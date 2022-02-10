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

// Unset session vars
if (isset($_SESSION["aUserQueryResult"])) {
    unset($_SESSION["aUserQueryResult"]);
}

if (isset($_SESSION["iUserDisplayItems"])) {
    $_SESSION["iUserDisplayItems"] = 0;
}

// Unset session vars
if (isset($_SESSION["aProductQueryResult"])) {
    unset($_SESSION["aProductQueryResult"]);
}

if (isset($_SESSION["iProductDisplayItems"])) {
    $_SESSION["iProductDisplayItems"] = 0;
}

if ($_SESSION["sessionStatus"] != 1 && $_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
    header('Location: ' . ROOT_URL . 'index.php');
}

// Create query string
$sQuery = "SELECT * FROM `users` WHERE `id` = " . $_SESSION["sessionAccountId"];

// Execute query and catch results in array
if ($oResult = $conn->query($sQuery)) {
    $aRow = $oResult->fetch_assoc();
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
                        <p class="account-page-info-text" id="acc_item_1"><?php echo $aRow["firstName"]; ?></p>
                        <button class="small orange" onclick="makeEditable('acc_item_1');"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <p class="account-page-info-text" id="acc_item_2"><?php echo $aRow["lastName"]; ?></p>
                        <button class="small orange" onclick="makeEditable('acc_item_2');"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-user-tag"></i>
                        </div>
                        <p class="account-page-info-text" id="acc_item_3"><?php echo $aRow["username"]; ?></p>
                        <button class="small orange" onclick="makeEditable('acc_item_3');"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <p class="account-page-info-text" id="acc_item_4"><?php echo $aRow["email"]; ?></p>
                        <button class="small orange" onclick="makeEditable('acc_item_4');"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <p class="account-page-info-text" id="acc_item_5"><?php echo $aRow["phoneNumber"]; ?></p>
                        <button class="small orange" onclick="makeEditable('acc_item_5');"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <div class="account-page-info-box">
                        <div class="account-page-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <p class="account-page-info-text" id="acc_item_6"><?php echo $aRow["firm"]; ?></p>
                        <button class="small orange" onclick="makeEditable('acc_item_6');"><i class="fas fa-pencil no-margin"></i></button>
                    </div>
                    <form action="db.edit-account.php" method="post" class="f-width">
                        <input id="acc_item_11" name="firstName" style="display: none;" type="text">
                        <input id="acc_item_21" name="lastName" style="display: none;" type="text">
                        <input id="acc_item_31" name="username" style="display: none;" type="text">
                        <input id="acc_item_41" name="email" style="display: none;" type="text">
                        <input id="acc_item_51" name="phonenumber" style="display: none;" type="text">
                        <input id="acc_item_61" name="firm" style="display: none;" type="text">
                        <input onclick="collectData()" name="edit_user_btn" type="submit" value="Bewerk Profiel">
                    </form>
                    <form action="db.delete-user.php" method="post" class="f-width">
                        <input name="del_user_btn" type="submit" value="Verwijder Profiel">
                    </form>
                </div>
                <div class="previous-orders">
                    <h4>Bestellingen</h4>
                    <?php

                    for ($i = 0; $i < 5; $i++) {
                        echo
                        '<div class="previous-order">
                            <div class="prev-order-data">
                                <p class="prev-order-title">Reflecterende Jas</p>
                                <p class="prev-order-date">18-1-2022</p>
                            </div>
                            <div class="prev-order-btn button small orange">
                                <a href="' . ROOT_URL . 'factuur/factuur.php" class="prev-btn-link-color"><i class="fas fa-link no-margin"></i></a>
                            </div>
                        </div>';
                    }

                    ?>
                    <button style="margin-top: 24px;">Meer</button>
                </div>
            </div>
        </div>
    </section>
</main>

<form style="visibility: hidden;" action="" method="post">

</form>
<?php

if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
} else {
    include "../../templates/footer.php";
}
?>