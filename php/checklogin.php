<?php
// maakt weer verbinding met database
include_once("connectie.php");
include_once("registreercheck.php");
// zal zeggen dat we nog niet ingelogd zijn en zal dus dit gaan checken, ook kan je maar na 1 sec weer opnieuw inloggen.
$_SESSION["ingelogd"] = false;
sleep(1);
$msg = '';
// wanneer gebruikersnaam is ingevuld en de input mail (fop stukje) niet, voer dat eronder uit
if (isset($_POST["gebruikersnaam"]) == true and $_POST["email"] == '') {
    // kijken of het token overeenkomt, zo ja ga door
    if ($_POST["tk"] == $_SESSION["tk"]) {
        unset($_SESSION["tk"]);
        $gebruikersnaam = cleaninput($_POST["gebruikersnaam"],30);
        $wachtwoord1 = cleaninput($_POST["wachtwoord"], 20);
        // maak het wachtwoord sterk door met salt te werken
        $wachtwoord1 = sha256($salt.$wachtwoord1);
        // database stukje erin
        $sql = "select * from gebruikers where gebruikersnaam = '".$gebruikersnaam."' and wachtwoord = '".$wachtwoord1."'";

        $result = mysqli_query($conn,$sql);
        // als de gevonden rij 1 gebruiker is dan heb je hem gevonden en voer je eronder uit
        if (mysqli_num_rows($result) == 1) {
            $rij = mysqli_fetch_array($result);
            // zo kan je de ingelogde admin zijn naam weergeven op het scherm
            $_SESSION["naam"] = $rij["naam"];
            $_SESSION["rechten"] = $rij["rechten"]; // 1 = user, 2 = admin
            $_SESSION["ingelogd"] = true;
            session_regenerate_id();
            // zal gaan kijken of het een Admin is en stuurt hem dan door naar een andere pagina
            if ($_SESSION["rechten"] == 2) {
                // exit code want dan voert ie alles wat eronder staat niet meer uit en zo voorkom je verkeerde doorlinks
                header("location:backoffice.php");
            } else {
                header("location:index.php");

                exit();
            }
        } else {
            // fout

            $msg = 'Onbekende login';
            header("location:login.php?msg=".$msg);
            exit();
        }
    } else {
        // laat de hacker 1sec wachten en stopt meteen de code
        sleep(1);
        echo " niet gelukt3!";
        exit();
    }
} else {
    sleep(1);
    header("location:login.php");
    exit();
};
?>