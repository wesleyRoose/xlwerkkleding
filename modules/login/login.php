    <?php include("../../config.php");

    session_start();

    $_SESSION["token"] = sha1(rand());
    ?>
    <?php include("../../templates/header.php"); ?>
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Begin code voor login -->
    <div class="containerlogin">
        <div class="beginlogincontent">
            <!-- titel met PHP verstuur methode -->
            <form method="post" action="checklogin.php">
                <h2 class="title">Welkom</h2>
                <br>
                <!-- gebruikersnaam met icoon ernaast -->
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">

                        <input onclick="none1()" type="text" name="username" placeholder="username">

                    </div>
                </div>
                <!-- wachtwoord met icoon ernaast -->
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input onclick="none2()" type="password" name="password" placeholder="password">
                    </div>
                </div>
                <input type="text" name="token" class="token" value="<?php echo $_SESSION['token'] ?>">
                <!-- begin button met PHP link voor verzenden -->
                <button type="submit" class="btn" name="submit">Login</button>
                <!-- <input type="hidden" name="tk" value="\"> -->
                <a class="vergeetenaanmeldknop" href="registreren.php">Registeer u nu!</a>
            </form>
            <?php
            if (isset($_GET["msg"])) {
                echo '<p>' . $_GET["msg"] . '</p>';
            }
            ?>
        </div>
    </div>
    <script type="text/javascript" src="../js/login.js"></script>

    <?php include "../../templates/footer.php"; ?>