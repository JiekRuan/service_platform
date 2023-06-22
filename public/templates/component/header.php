<?php
global $domain;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../public/images/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Elysians Paris</title>
</head>

<body>
    <header>
        <h3 class="logo"><a href=<?= "http://" . $domain . "/home" ?>>Elysians Paris</a></h3>
        <nav>
            <ul id="desktop">
                <li id="search"><i class="fa-solid fa-magnifying-glass"></i></li>
                <li id="searchForm">
                    <form action="" method="GET">
                        <input class="searchInput" type="text" placeholder="16ème arrondissement...">
                    </form>
                </li>
                <li><a href=<?= "http://" . $domain . "/testimony" ?>><i class="fas fa-quote-left"></i></a></li>
                <li><a href=<?= "http://" . $domain . "/user/bookmark" ?>><i class="fa-regular fa-bookmark"></i></a></li>
                <li><a href=<?= "http://" . $domain . "/user/chat" ?>><i class="fa-regular fa-message"></i></a></li>
                <li><a href=<?= "http://" . $domain . "/user/reservationList" ?>><i class="fa-regular fa-calendar-check"></i></a></li>
                <li><a href=<?= "http://" . $domain . "/user/settings" ?>><i class="fa-regular fa-user"></i></a></li>

            </ul>
            <ul id="mobile">
                <li id="searchMobile"><i class="fa-solid fa-magnifying-glass"></i></li>
                <li id="searchFormMobile">
                    <form action="" method="GET">
                        <input class="searchInput" type="text" placeholder="16ème arrondissement...">
                    </form>
                </li>
                <li id="headerBurger"><i class="fa-solid fa-bars"></i></li>
            </ul>
            <ul id="headerBurgerContent">
                <a href=<?= "http://" . $domain . "/testimony" ?>>
                    <li><i class="fas fa-quote-left"></i>
                        <p>Témoignages</p>
                    </li>
                </a>
                <a href=<?= "http://" . $domain . "/user/bookmark" ?>>
                    <li><i class="fa-regular fa-bookmark"></i>
                        <p>Vos favoris</p>
                    </li>
                </a>
                <a href=<?= "http://" . $domain . "/user/chat" ?>>
                    <li><i class="fa-regular fa-message"></i>
                        <p>Messagerie</p>
                    </li>
                </a>
                <a href=<?= "http://" . $domain . "/user/reservationList" ?>>
                    <li><i class="fa-regular fa-calendar-check"></i>
                        <p>Vos réservations</p>
                    </li>
                </a>
                <a href=<?= "http://" . $domain . "/user/settings" ?>>
                    <li><i class="fa-regular fa-user"></i>
                        <p>Votre Profil</p>
                    </li>
                </a>
            </ul>
        </nav>
    </header>
    <script src="../public/js/app.js"></script>
    <script src="../public/js/header.js"></script>