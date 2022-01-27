<?php

if (file_exists('../../controller.php')) {
    include('../../controller.php');
} else {
    $errorMessage = "";
    $errorMessage .= "PHP ERROR: controller.php does not exist.";
    echo $errorMessage;
    exit;
}
?>

<head>
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>css/style.css">
</head>
<section class="succes">
    <div class="centered">
        <h1>Product(en) niet geüpload</h1>
        <button class="button"><a class="btn-s" href="<?php echo ROOT_URL ?>modules/admin/add-product.php">GA TERUG</a></button>
    </div>
</section>