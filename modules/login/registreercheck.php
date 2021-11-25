<?php
    include_once "connectie.php";

    // Variabelen voor makkelijkere code
    $voornaam = "";
    $achternaam = "";
    $geboortedatum = "";
    $woonplaats = "";
    $postcode = "";
    $telefoon = "";
    $email = "";
    $gebruikersnaam = "";
    $wachtwoord1 = "";
    $wachtwoord2 = "";
    $errors = array();
    

    if (isset($_POST["registreerknop"])) {

        // Krijgt hieronder alle ingevulde variabelen
        $email = cleaninput($_POST["email"],30);
        $gebruikersnaam = cleaninput($_POST["gebruikersnaam"],30);
        $wachtwoord1 = cleaninput($_POST["wachtwoord1"],80);
        $wachtwoord2 = cleaninput($_POST["wachtwoord2"],80);

        // Alle verplichte velden worden hieronder gecheckt of het ingevuld is.
        if (empty($email)) { array_push($errors, header ('location: registreren.php')); }
        if (empty($gebruikersnaam)) { array_push($errors, header ('location: registreren.php')); }
        if ($wachtwoord1 != $wachtwoord2) { array_push($errors, header ('location: registreren.php'));}

        // verbinding met database zodat hij alles onder het kopje gebruikers stopt
        if (count($errors) == 0) {
            $wachtwoord1 = sha256($salt.$wachtwoord1);
            $query = "INSERT INTO gebruikers (email, gebruikersnaam, wachtwoord) 
                      VALUES('$email', '$gebruikersnaam', '$wachtwoord1')";
            mysqli_query($conn, $query);
            $_SESSION['succes'] = "Je bent nu ingelogd!";
            header('location: login.php');
        }
    }
?>