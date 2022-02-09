<?php

//Start Session
if (!isset($_SESSION)) {
    session_start();
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
            <p><?php echo PAGE_TITLE ?></p>
        </div>

        <!-- Slideshow container -->
        <div class="slideshowBoxContainer">
            <div class="slideshow-container">

                <div class="mySlides">
                    <div class="numbertext">1 / 3</div>
                    <img class="sliderImg" src="./img/placeholder.png">
                    <div class="sliderText">Caption Text</div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 3</div>
                    <img class="sliderImg" src="./img/placeholder.png">
                    <div class="sliderText">Caption Two</div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 3</div>
                    <img class="sliderImg" src="./img/placeholder.png">
                    <div class="sliderText">Caption Three</div>
                </div>

                <!-- Volgende en Vorige knoppen -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
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

            for($i = 0; $i < 50; $i++) {
                echo 
                '<div class="card">
                    <div class="image">
                        <img src=" ' . ROOT_URL . '/img/placeholder.png" alt="Placeholder Image" class="card-image">
                    </div>
                    <div class="text f-width card-text-margin">
                        <h3>Product 1</h3>
                        <a href="#" class="card-link">Klik hier</a>
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