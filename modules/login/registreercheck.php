<?php

//Start Session
session_start();

//Include Files
if (file_exists('../../config.php')) {
    include('../../config.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: ../../config.php does not exist.";
    echo $errorMessage;
    exit;
}

if (file_exists('../../functions.php')) {
    include('../../functions.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: ../../functions.php does not exist.";
    echo $errorMessage;
    exit;
}

if (isset($_POST["registerSubmit"])) {

    // Catch Form Values and clean them for sql trickery
    $email = cleaninput($_POST["email"], 30);
    $username = cleaninput($_POST["username"], 30);
    $fName = cleaninput($_POST["fName"], 30);

    $lName = cleaninput($_POST["lName"], 40);
    $password = cleaninput($_GET["password"], 80);
    $repeatpassword = cleaninput($_POST["repeatpassword"], 80);
    $phoneNumber = cleaninput($_POST["phoneNumber"], 40);
    $firm = cleaninput($_POST["firm"], 40);

    //Check if the passwords match up
    if ($password != $repeatpassword) {
        //if they dont match create a error message and exit
        $errorMessage = "De wachtwoorden zijn niet gelijk!";
        exit;
    } else {
        //If they match hash it
        $hashedPassword = sha256($password);
    }

    //Prepare the SQL statement
    $preparedSQL = "INSERT INTO `users` (`email`, `username`, `firstName`, `lastName`, `password`, 'phoneNumber`, `firm`) VALUES (`?`, `?`, `?`, `?`, `?`, `?`, `?`);";
}
