<?php

session_start();

if (file_exists('config.php')) {
    include('config.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: config.php does not exist.";
    echo $errorMessage;
    exit;
}

if (file_exists('functions.php')) {
    include('functions.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: functions.php does not exist.";
    echo $errorMessage;
    exit;
}



if ($_SESSION["sessionStatus"] == 1) {
    include ROOT_URL . "templates/header-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include ROOT_URL . "templates/header-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include ROOT_URL . "templates/header.php";
}
?>

<head>
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>css/style.css">
</head>
<section class="succes">
    <div class="centered">
        <h1>Product(en) succesvol geüpload</h1>
        <button class="button"><a class="btn-s" href="<?php echo ROOT_URL ?>modules/admin/add-product.php">GA TERUG</a></button>
    </div>
</section>

<?php


if ($_SESSION["sessionStatus"] == 1) {
    include ROOT_URL . "templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
    include ROOT_URL . "templates/footer-admin.php";
} else if ($_SESSION["sessionStatus"] == 6 || empty($_SESSION["sessionStatus"])) {
    include ROOT_URL . "templates/footer.php";
}

?>