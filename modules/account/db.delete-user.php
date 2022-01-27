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

// if ($_SESSION["sessionStatus"] != 1 && $_SESSION["sessionStatus"] != 2 || empty($_SESSION["sessionStatus"])) {
//     header('Location: ' . ROOT_URL . 'index.php');
// }

// // Create query string
// $sQuery = "SELECT * FROM `users` WHERE `id` = " . $_SESSION["sessionAccountId"];

// // Execute query and catch results in array
// if ($oResult = $conn->query($sQuery)) {
//     $aRow = $oResult->fetch_assoc();
// }

if(isset($_POST["del_user_btn"])) {
    $sQuery = "DELETE FROM `users` WHERE `users`.`id` = " . $_SESSION["sessionAccountId"];

    //Execute query and catch results in array
    if ($db->query($sQuery)) {
    session_destroy();
    header('Location: ' . ROOT_URL . 'modules/login/index.php?msg=del');
    exit;
    }

}
?>