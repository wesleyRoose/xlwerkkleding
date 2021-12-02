<?php
    include_once "../../config.php";
    include_once "../../functions.php";

    // Variabelen voor makkelijkere code
    $Achternaam = "";
    $geboortedatum = "";
    $woonplaats = "";
    $postcode = "";
    $telefoon = "";
    $email = "";
    $Voornaam = "";
    $wachtwoord1 = "";
    $wachtwoord2 = "";
    $errors = array();
    

    if (isset($_POST["registreerknop"])) {

        // Krijgt hieronder alle ingevulde variabelen
        $email = cleaninput($_POST["email"],30);
        $Voornaam = cleaninput($_POST["Voornaam"],30);
        $Achternaam = cleaninput($_POST["Achternaam"],40);
        $wachtwoord1 = cleaninput($_GET["wachtwoord1"],80);
        $wachtwoord2 = cleaninput($_POST["wachtwoord2"],80);

        // Alle verplichte velden worden hieronder gecheckt of het ingevuld is.
        if (empty($email)) { array_push($errors, header ('location: registreren.php')); }
        if (empty($Voornaam)) { array_push($errors, header ('location: registreren.php')); }
        if ($wachtwoord1 != $wachtwoord2) { array_push($errors, header ('location: registreren.php'));}

        // verbinding met database zodat hij alles onder het kopje gebruikers stopt
        if (count($errors) == 0) {
            $wachtwoord1 = sha256($salt.$wachtwoord1);
            $query = "INSERT INTO gebruikers (email, Voornaam, Achternaam, wachtwoord) 
                      VALUES('$email', '$Voornaam', '$Achternaam', '$wachtwoord1')";
            mysqli_query($conn, $query);
            $_SESSION['succes'] = "Je bent nu ingelogd!";
            header('location: login.php');
        }
    }
?>