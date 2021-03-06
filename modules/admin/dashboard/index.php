<?php

//load controller
if (file_exists('../../../admin-controller.php')) {
    include('../../../admin-controller.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: admin-controller.php does not exist.";
    echo $errorMessage;
    exit;
}

if ($_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
    header('Location: ' . ROOT_URL . 'index.php');
}

// Create query string
$sQuery = "SELECT * FROM `users` WHERE `id` = " . $_SESSION["sessionAccountId"];

// Execute query and catch results in array
if ($oResult = $conn->query($sQuery)) {
    $aRow = $oResult->fetch_assoc();
}

?>


<main class="admin-home">
    <section class="admin-options">
        <div class="admin-name">
            <h1>Welkom <?php echo $aRow["firstName"]; ?>.</h1>
        </div>
        <div class="admin-options-content">
            <div class="admin-options-part">
                <div class="add-about-content ds-form-style">
                    <h4>Voeg tekst toe voor over pagina</h4>
                    <form action="db.aboutContentAdd.php" method="post" class="add-about-form" autocomplete="off" enctype="multipart/form-data">
                        <label>Over Header 1</label><br>
                        <input type="text" name="aboutHd1" id="o_hd_1" class="over_input"><br>
                        <label>Over Text 1</label><br>
                        <textarea name="aboutTxt1" id="o_txt_1" class="over_text_input" rows="8" placeholder="Type Here"></textarea><br>
                        <label>Over Foto 1</label><br>
                        <input type="file" name="aboutFl1" <br>
                        <input name="submit" type="submit" value="Verzenden">
                    </form>
                </div>

                <div class="add-about-content ds-form-style margin-left">
                    <h4 class="not-visible">Not Visible</h4>
                    <form action="db.aboutContentAdd.php" method="post" class="add-about-form" autocomplete="off" enctype="multipart/form-data">
                        <label>Over Header 2</label><br>
                        <input type="text" name="aboutHd2" id="o_hd_2" class="over_input"><br>
                        <label>Over Text 2</label><br>
                        <textarea name="aboutTxt2" id="o_txt_2" class="over_text_input" rows="8" placeholder="Type Here"></textarea><br>
                        <label>Over Foto 2</label><br>
                        <input type="file" name="aboutFl2" id="o_fl_2"><br>
                        <input name="submitSecond" type="submit" value="Verzenden">
                    </form>
                </div>
            </div>
            <div class="admin-options-part">
                <div class="slider-image-uploader ds-form-style">
                    <h4>Homepagina Slider Image Uploader</h4>
                    <form action="db.sliderImageUploader.php" method="post" class="image_uploader" autocomplete="off" enctype="multipart/form-data">
                        <label>Foto 1</label><br>
                        <input type="file" name="sliderImg1" id="slider_img_1" class="slider_image_inp"><br>
                        <label>Caption1</label><br>
                        <input type="text" name="caption1" id="o_hd_2" class="over_input"><br>
                        <label>Foto 2</label><br>
                        <input type="file" name="sliderImg2" id="slider_img_2" class="slider_image_inp"><br>
                        <label>Caption2</label><br>
                        <input type="text" name="caption2" id="o_hd_2" class="over_input"><br>
                        <label>Foto 3</label><br>
                        <input type="file" name="sliderImg3" id="slider_img_3" class="slider_image_inp"><br>
                        <label>Caption3</label><br>
                        <input type="text" name="caption3" id="o_hd_2" class="over_input"><br>
                        <input name="submit" type="submit" value="Upload Bestanden">
                    </form>
                </div>
                <div class="title-change-div ds-form-style margin-left">
                    <h4>Verander Slogan/Titel</h4>
                    <form action="db.titleChange.php" method="post" class="title_form" autocomplete="off">
                        <label>Nieuwe Slogan/Titel</label><br>
                        <input type="text" name="titleChange" id="title_change" class="title_change"><br>
                        <input type="submit" value="Voeg toe">
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php if ($_SESSION["sessionStatus"] == 1) {
    include "../../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../../templates/footer-admin.php";
} else {
    include "../../../templates/footer.php";
}
?>