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

?>
<main class="home-container">
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
        <h3>Uitgelichte Producten</h3>
        <div class="cards">
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/placeholder.png" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
                </div>
                <div class="text">
                    <h3>Product 1</h3>
                    <a href="#" class="card-link">Klik hier</a>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img src="<?php echo ROOT_URL ?>/img/koudblauw.jpg" alt="Placeholder Image" class="card-image">
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
    include "./templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "./templates/footer-admin.php";
} else {
    include "./templates/footer.php";
}
?>