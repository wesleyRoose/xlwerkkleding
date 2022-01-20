<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="Dutch">
    <meta http-equiv="content-language" content="nl">
    <!--Custom CSS-->
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>css/style.css">
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo ROOT_URL ?>img/favicon.ico">
    <title>XLwerkkleding - Admin</title>
</head>
<body>
    <div class="view">
        <noscript>
            <div class="noscript">
                <p>Hey, blijkbaar heb je JavaScript niet aanstaan, zet dit aan voor een functionele website :)</p>
            </div>
        </noscript>
        <header>
            <div class="header">
                <div class="logo">
                    <a class="logo-link" href="<?php echo ROOT_URL ?>">
                        <img src="<?php echo ROOT_URL ?>img/xlwerkkleding-logo.jpg" alt="XLwerkkleding Logo" class="logo-img">
                    </a>
                </div>
                <nav class="menu" id="menu">
                    <div class="menu-wrap">
                        <ul class="menu-list">
                            <li class="navitem"><a class="nav-item" href="<?php echo ROOT_URL ?>">Home</a></li>
                            <li class="navitem"><a class="nav-item" href="<?php echo ROOT_URL ?>modules/admin/product-overview.php">Products</a></li>
                            <li class="navitem"><a class="nav-item" href="<?php echo ROOT_URL ?>modules/admin/users-overview.php">Users</a></li>
                            <li class="navitem"><a class="nav-item" href="<?php echo ROOT_URL ?>modules/admin/add-product.php">Product Toevoegen</a></li>
                            <div class="dropdown">
                                <span>MEER<i class="fas fa-chevron-down"></i></span>
                                <div class="dropdown-content">
                                    <li class="navitem"><a class="nav-item dropdown-item" href="<?php echo ROOT_URL ?>modules/webshop/index.php">WebShop</a></li>
                                    <li class="navitem"><a class="nav-item dropdown-item" href="<?php echo ROOT_URL ?>modules/account/index.php">Account</a></li>
                                </div>
                            </div>
                            <li class="navitem"><a class="nav-item login" href="<?php echo ROOT_URL ?>modules/login/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Responsive menu toggle button -->
                <div class="hamburger">
                    <i class="fas fa-bars" id="hamburger" onclick="toggleMenu();"></i>
                </div>
            </div>
        </header>