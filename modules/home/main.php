<?php

session_start();

if (file_exists('config.php')) {
    include('config.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: config.php does not exist.";
    echo $errorMessage;
    exit;
}

if (file_exists('functions.php')) {
    include('functions.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: functions.php does not exist.";
    echo $errorMessage;
    exit;
}



if ($_SESSION["sessionStatus"] == 1) {
    include ROOT_URL . "templates/header-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include ROOT_URL . "templates/header-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include ROOT_URL . "templates/header.php";
}



include "./templates/header.php"; ?>
<main>
    <section class="mainFlexContainer">
        <div class="home">
            <h1>Welkom</h1>
            <p>Slogan....</p>
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
        <div class="cards">
            <div class="card">
                <div class="image">
                    <img src="./img/placeholder.png" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="./img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="./img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="./img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="./img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="./img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="./img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="./img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="./img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php

if ($_SESSION["sessionStatus"] == 1) {
    include ROOT_URL . "templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include ROOT_URL . "templates/footer-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include ROOT_URL . "templates/footer.php";
}
?>

<?php include "./templates/footer.php"; ?>