<?php

//load controller
if (file_exists('../../controller.php')) {
    include('../../controller.php');
  } else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: controller.php does not exist.";
    echo $errorMessage;
    exit;
  }

if (isset($_POST["registerSubmit"])) {
    // Check if everything is not empty
    if (!empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["fName"]) && !empty($_POST["lName"]) && !empty($_POST["password"]) && !empty($_POST["repeatPassword"]) && !empty($_POST["phoneNumber"]) && !empty($_POST["firm"])) {

        // Catch Form Values and clean them for sql trickery
        $email = cleaninput($_POST["email"], 30);
        $username = cleaninput($_POST["username"], 30);
        $fName = cleaninput($_POST["fName"], 30);
        $lName = cleaninput($_POST["lName"], 40);
        $password = cleaninput($_POST["password"], 20);
        $repeatPassword = cleaninput($_POST["repeatPassword"], 20);
        $phoneNumber = cleaninput($_POST["phoneNumber"], 15);
        $firm = cleaninput($_POST["firm"], 40);

        //Check if the passwords match up
        if ($password != $repeatPassword) {
            //if they dont match create a error message and exit
            $errorMessage = "De wachtwoorden zijn niet gelijk!";
            exit;
        } else {
            //If they match hash it
            $hashedPassword = sha256($password);
        }

        // Creating Arrays for function
        $aRowNames = array("email", "username", "firstName", "lastName", "password", "phoneNumber", "Firm");
        $aValues = array($email, $username, $fName, $lName, $hashedPassword, $phoneNumber, $firm);

        // Create and execute prepared statement
        if (preparedInsertIntoQuery($conn, 7, "users", $aRowNames, "sssssss", $aValues)) {
            header('Location: ' . ROOT_URL . 'index.php');
        }
    }
}
