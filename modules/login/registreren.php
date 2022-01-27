<?php

session_start();

if (file_exists('../../config.php')) {
    include('../../config.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: config.php does not exist.";
    echo $errorMessage;
    exit;
}

if (file_exists('../../functions.php')) {
    include('../../functions.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: functions.php does not exist.";
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

?>
</head>

<!-- Begin code voor registreren -->
<main class="reg">
    <section class="reg">
        <div class="containerlogin">
            <div class="reglog">
                <form method="post" action="registreercheck.php" autocomplete="off">
                    <h2 class="title">Registreer hier</h2>
                    <br>
                    <div class="input-div">
                        <div class="div">
                            <label>Email*</label><br>
                            <input required type="email" class="input" name="email">
                        </div>
                    </div>
                    <div class="input-div">
                        <div class="div">
                            <label>Gebruikersnaam*</label><br>
                            <input required type="text" class="input" name="username">
                        </div>
                    </div>
                    <div class="input-div">
                        <div class="div">
                            <label>Voornaam*</label><br>
                            <input required type="text" class="input" name="fName">
                        </div>
                    </div>
                    <div class="input-div">
                        <div class="div">
                            <label>Achternaam*</label><br>
                            <input required type="text" class="input" name="lName">
                        </div>
                    </div>
                    <div class="input-div">
                        <div class="div">
                            <label>Firma</label><br>
                            <input type="text" class="input" name="firm">
                        </div>
                    </div>
                    <div class="input-div">
                        <div class="div">
                            <label>Tel. Nummer*</label><br>
                            <input required type="text" class="input" name="phoneNumber">
                        </div>
                    </div>
                    <div class="input-div">
                        <div class="div">
                            <label>Wachtwoord*</label><br>
                            <input required type="password" class="input" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                    </div>

                    <div class="input-div">
                        <div class="div">
                            <label>Herhaal Wachtwoord*</label><br>
                            <input required type="password" class="input" name="repeatPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                    </div>

                    <!-- Account en registreer knop/link -->
                    <input type="submit" name="registerSubmit" value="Registreer" class="button m-less">
                    <div class="reg-btn">
                        <a class="">Velden met * zijn verplicht!</a><br>
                        <a class="register-btn lower" href="login.php">Log hier in</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php

if ($_SESSION["sessionStatus"] == 1) {
    include "../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include "../../templates/footer-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include "../../templates/footer.php";
}
