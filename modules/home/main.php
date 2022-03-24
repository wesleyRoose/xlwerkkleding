<?php

//Start Session
if (!isset($_SESSION)) {
    session_start();
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



//Include Files
if (file_exists('./config.php')) {
    include('./config.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: ./config.php does not exist.";
    echo $errorMessage;
    exit;
}

if (file_exists('./functions.php')) {
    include('./functions.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: ./functions.php does not exist.";
    echo $errorMessage;
    exit;
}

if (file_exists('./library/db.class.php')) {
    include('./library/db.class.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: ./library/db.class.php does not exist.";
    echo $errorMessage;
    exit;
}

if ($_SESSION["sessionStatus"] == 1) {
    include "./templates/header-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "./templates/header-admin.php";
} else {
    include "./templates/header.php";
}

?>

<main class="home-container">
    <section class="mainFlexContainer">
        <div class="home">
            <h1>Welkom</h1>
            <p><?php echo getHtmlContent($conn, "main", "slogan"); ?></p>
        </div>

        <!-- Slideshow container -->
        <div class="slideshowBoxContainer">
            <div class="slideshow-container">

                <div class="mySlides">
                    <div class="numbertext">1 / 3</div>
                    <img class="sliderImg" src="<?php echo ROOT_URL ?>modules/admin/dashboard/<?php echo getHtmlContent($conn, "main", "sliderImg1"); ?>" placeholder="Slider Image">
                    <div class="sliderText"><?php echo getHtmlContent($conn, "main", "caption1"); ?></div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 3</div>
                    <img class="sliderImg" src="<?php echo ROOT_URL ?>modules/admin/dashboard/<?php echo getHtmlContent($conn, "main", "sliderImg2"); ?>" placeholder="Slider Image">
                    <div class="sliderText"><?php echo getHtmlContent($conn, "main", "caption2"); ?></div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 3</div>
                    <img class="sliderImg" src="<?php echo ROOT_URL ?>modules/admin/dashboard/<?php echo getHtmlContent($conn, "main", "sliderImg3"); ?>" placeholder="Slider Image">
                    <div class="sliderText"><?php echo getHtmlContent($conn, "main", "caption3"); ?></div>
                </div>
            </div>
        </div>
        <br>

        <!-- The punten en cirkels -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <h3>Uitgelichte Producten</h3>
        <div class="cards">
            <?php
            // Create Sql string
            $sSql = "SELECT * FROM product ORDER BY RAND() LIMIT 5";
            // Execute sql and put result into array
            if ($oResult = $conn->query($sSql)) {
                while ($aRowResult = $oResult->fetch_assoc()) {
                    $aResult[] = $aRowResult;
                }
            }

            foreach ($aResult as $i) {
                echo '<div class="card">
                <div class="image">
                    <img src=" ' . ROOT_URL . 'modules/admin/add/' . $i["p_foto"] . '" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text f-width card-text-margin">
                    <h3>' . $i["p_name"] . '</h3>
                    <a href="' . ROOT_URL . "modules/webshop/product-page.php?product=" . $i["p_id"] . '" class="card-link">Klik hier <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>';
            }
            ?>
        </div>
    </section>
</main>

<!--Load slides.js for the carrousel-->
<script src="<?php echo ROOT_URL ?>js/slides.js"></script>

<?php

if ($_SESSION["sessionStatus"] == 1) {
    include "./templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "./templates/footer-admin.php";
} else {
    include "./templates/footer.php";
}
?>