<?php include_once("../../templates/header.php"); ?>
<script type="text/javascript">
    const inputs = document.querySelectorAll(".input");

    function addcl() {
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl() {
        let parent = this.parentNode.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
    }


    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });
</script>
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
                    <input onclick="none7()" type="email" class="input" name="email" value="">
                </div>
            </div>
            <!-- gebruikersnaam met icoon ernaast -->
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5 id="label8">Gebruikersnaam*</h5>
                    <input onclick="none8()" type="text" class="input" name="gebruikersnaam">
                </div>
            </div>
            <!-- Wachtwoord met icoon ernaast -->
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5 id="label9">Wachtwoord*</h5>
                    <input onclick="none9()" type="password" class="input" name="wachtwoord1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
            </div>
            <!-- Wachtwoord met icoon ernaast -->
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5 id="label10">Herhaal wachtwoord*</h5>
                    <input onclick="none10()" type="password" class="input" name="wachtwoord2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
            </div>
            <!-- Account en registreer knop/link -->
            <button type="submit" class="btn" name="registreerknop">Registreer</button>
            <a class="vergeetenaanmeldknop">Velden met een * zijn verplicht!</a>
            <a class="vergeetenaanmeldknop" href="login.php">Heeft u al een account? Klik dan hier!</a>
        </form>
    </div>
</div>
<script type="text/javascript" src="../js/login.js"></script>

<?php include "../../templates/footer.php"; ?>