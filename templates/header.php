<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Custom CSS-->
    <link rel="stylesheet" href="./css/style.css">
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>XLwerkkleding - Home</title>
</head>

<body>
    <div class="view">
        <header>
            <div class="header">
                <div class="logo">
                    <a class="logo-link" href="index.php">
                        <h2>XLwerkkleding</h2>
                    </a>
                </div>
                <nav class="menu" id="menu">
                    <div class="menu-wrap">
                        <ul class="menu-list">
                            <li class="navitem"><a class="nav-item" href="<?php echo ROOT_URL ?>index.php">Home</a></li>
                            <li class="navitem"><a class="nav-item" href="<?php echo ROOT_URL ?>modules/webshop/index.php">WebShop</a></li>
                            <li class="navitem"><a class="nav-item" href="<?php echo ROOT_URL ?>modules/over/index.php">Over</a></li>
                            <li class="navitem"><a class="nav-item login" href="<?php echo ROOT_URL ?>modules/login/index.php">Login</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Responsive menu toggle button -->
                <div class="hamburger">
                    <i class="fas fa-bars" id="hamburger" onclick="toggleMenu();"></i>
                </div>
            </div>
        </header>