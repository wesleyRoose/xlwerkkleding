<?php

if (!isset($_SESSION)) {
    session_start();
}

if (file_exists('../../config.php')) {
    include('../../config.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: config.php does not exist.";
    echo $errorMessage;
    exit;
}



if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/header-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/header-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/header.php";
}

if (!isset($_SESSION)) {
    session_start();
}

$token = sha1($salt . rand());

$_SESSION["token"] = $token;


?>

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
        if (isset($_SESSION["sessionStatus"])) {
            if ($_SESSION["sessionStatus"] != 0 && $_SESSION["sessionStatus"] != 6) {
                echo "<p>Login Succesvol!</p>";
            } else if ($_SESSION["sessionStatus"] == 6) {
                echo "<p>Login was niet Succesvol!</p>";
            }
        }
        ?>
    </div>
</section>
<script type="text/javascript" src="../js/login.js"></script>

<?php include "../../templates/footer.php"; ?>