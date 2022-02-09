<?php


if (!isset($_SESSION["sessionStatus"])) {
    $_SESSION["sessionStatus"] = null;
}


$token = sha1($salt . rand());

$_SESSION["token"] = $token;

?>

<!-- Begin code voor login -->
<main class="login-container">
    <section class="containerlogin">
        <div class="reglog">
            <!-- titel met PHP verstuur methode -->
            <form method="post" action="checklogin.php" autocomplete="off">
                <h2 class="title">Log hier in</h2>
                <br>
                <div class="input-div">
                    <div class="div">
                        <label>Gebruikersnaam</label><br>
                        <input type="text" name="username">
                    </div>
                </div>
                <div class="input-div">
                    <div class="div">
                        <label>Wachtwoord</label><br>
                        <input type="password" name="password">
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
            if (!empty($_GET)) {
                if(isset($_GET["login"])){
                    if ($_GET['login'] == 'fail') {
                        $sLoginMsg = '';
                        $sLoginMsg = '<p>U bent niet ingelogd, probeer het nog een keer.</p>';
                        echo $sLoginMsg;
                    }
                } else if($_GET['msg'] == 'del'){
                    $sLoginMsg = '';
                    $sLoginMsg = '<p>Uw account is succesvol verwijdert!</p>';
                    echo $sLoginMsg;
                } else {
                    $sLoginMsg = "";
                }
            }
            ?>
        </div>
    </section>
</main>

<?php include "../../templates/footer.php"; ?>