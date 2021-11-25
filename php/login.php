    <?php include("header.php"); ?>
    <!-- Begin code voor login -->
    <div class="containerlogin">
        <div class="beginlogincontent" >
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
                        
                        <input onclick="none1()" type="text" name="gebruikersnaam" placeholder="gebruikersnaam">
                        
                    </div>
                </div>
                <!-- wachtwoord met icoon ernaast -->
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input onclick="none2()"  type="password" name="wachtwoord" placeholder="Wachtwoord">
                    </div>
                </div>
                <!-- fop stukje -->
                <input type="hidden" placeholder="email" name="email" class="mail"> <br>
                <!-- begin button met PHP link voor verzenden -->
                <button type="submit" class="btn" name="inlogbutton">Login</button>
                    <input type="hidden" name="tk" value="<?php echo gettoken(); ?>">
                <a class="vergeetenaanmeldknop" href="registreren.php">Registeer u nu!</a>
            </form>
            <?php 
            if (isset($_GET["msg"])) {
                echo '<p>'.$_GET["msg"].'</p>';
            }
            ?>
        </div>
    </div>
    <script type="text/javascript" src="../js/login.js"></script>

<?php include "footer.php"; ?>