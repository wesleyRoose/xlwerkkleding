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

if(isset($_POST["del_user_btn"])) {
    $sQuery = "DELETE FROM `users` WHERE `users`.`id` = " . $_SESSION["sessionAccountId"];

    //Execute query and catch results in array
    if ($db->query($sQuery)) {
    session_destroy();
    header('Location: ' . ROOT_URL . 'modules/login/index.php?msg=del');
    exit;
    }

}
