<?php include_once("../../config.php"); ?>
<?php include_once("../../templates/header.php"); ?>
</head>

<!-- Begin code voor registreren -->
<div class="containerlogin">
    <div class="beginlogincontent">
        <form method="post" action="registreercheck.php">
            <h2 class="title">Registreer u hier</h2>
            <br>

            <!-- Email met icoon ernaast -->
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-at"></i>
                </div>
                <div class="div">
                    <h5 id="label7">E-Mail*</h5>
                    <input onclick="none7()" type="email" class="input" name="email" value="" required>
                </div>
            </div>

            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5 id="label8">Gebruikersnaam*</h5>
                    <input onclick="none15()" type="text" class="input" name="username" required>
                </div>
            </div>

            <!-- Voornaam met icoon ernaast -->
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5 id="label8">Voornaam*</h5>
                    <input onclick="none8()" type="text" class="input" name="fName" required>
                </div>
            </div>

            <!-- Achternaam met icoon ernaast -->
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5 id="label11">Achternaam*</h5>
                    <input onclick="none11()" type="text" class="input" name="lName" required>
                </div>
            </div>

            <div class="input-div pass">
                <div class="div">
                    <h5 id="label12">Email*</h5>
                    <input onclick="none12()" type="text" class="input" name="email" required>
                </div>
            </div>

            <div class="input-div pass">
                <div class="div">
                    <h5 id="label13">Mobiel-Nummer*</h5>
                    <input onclick="none13()" type="text" class="input" name="phoneNumber" required>
                </div>
            </div>

            <div class="input-div pass">
                <div class="div">
                    <h5 id="label14">Firma</h5>
                    <input onclick="none14()" type="text" class="input" name="firm">
                </div>
            </div>

            <!-- Wachtwoord met icoon ernaast -->
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5 id="label9">Wachtwoord*</h5>
                    <input onclick="none9()" type="password" class="input" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
            </div>

            <!-- Wachtwoord met icoon ernaast -->
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5 id="label10">Herhaal wachtwoord*</h5>
                    <input onclick="none10()" type="password" class="input" name="repeatPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
            </div>

            <!-- Account en registreer knop/link -->
            <button type="submit" class="btn" name="registerSubmit">Registreer</button>
            <a class="vergeetenaanmeldknop">Velden met een * zijn verplicht!</a>
            <a class="vergeetenaanmeldknop" href="login.php">Heeft u al een account? Klik dan hier!</a>
        </form>
    </div>
</div>
<script type="text/javascript" src="<?php echo ROOT_URL ?>js/login.js"></script>

<?php include "../../templates/footer.php"; ?>