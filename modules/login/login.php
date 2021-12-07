<?php include("../../config.php");

session_start();

$_SESSION["token"] = sha1($salt . rand());

include("../../templates/header.php"); ?>

<!-- Begin code voor login -->
<section class="containerlogin">
    <div class="reglog">
        <!-- titel met PHP verstuur methode -->
        <form method="post" action="checklogin.php">
            <h2 class="title">Log hier in</h2>
            <br>
            <div class="input-div">
                <div class="div">
                    <label>Gebruikersnaam</label><br>
                    <input type="text" name="username" placeholder="Typ hier...">
                </div>
            </div>
            <div class="input-div">
                <div class="div">
                    <label>Wachtwoord</label><br>
                    <input type="password" name="password" placeholder="Typ hier...">
                </div>
            </div>
            <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'] ?>">
            <input type="hidden" id="email1" name="email1">
            <input type="submit" value="Login" class="button m-less">
            <div class="reg-btn">
                <a class="register-btn lower" href="registreren.php">Registreer hier</a>
            </div>
        </form>
        <?php
        if (isset($_POST["msg"])) {
            echo '<p>' . $_POST["msg"] . '</p>';
        }
        ?>
    </div>
</section>
<script type="text/javascript" src="../js/login.js"></script>

<?php include "../../templates/footer.php"; ?>