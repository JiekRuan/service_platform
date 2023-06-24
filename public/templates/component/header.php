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
                    <form action="searchPage" method="GET" class="searchFormInput">
                        <input class="searchInput" name="search" type="text" placeholder="16ème arrondissement...">
                        <button type="submit" class="homepageSearchButton homepageSearchButtonMobile"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
                <?php
                if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                ?>
                    <li><a href=<?= "http://" . $domain . "/testimony" ?>>Témoignages</a></li>
                    <li>
                        <a href=<?= "http://" . $domain . "/user/login" ?>>
                            Se connecter
                        </a>
                    </li>

                    <?php
                } else {
                    if ($_SESSION["role"] == "customer") { ?>
                        <li><a href=<?= "http://" . $domain . "/testimony" ?>><i class="fas fa-quote-left"></i></a></li>
                        <li><a href=<?= "http://" . $domain . "/user/bookmark" ?>><i class="fa-regular fa-bookmark"></i></a></li>
                        <li><a href=<?= "http://" . $domain . "/user/chat" ?>><i class="fa-regular fa-message"></i></a></li>
                        <li><a href=<?= "http://" . $domain . "/user/reservationList" ?>><i class="fa-regular fa-calendar-check"></i></a></li>

                    <?php } else if ($_SESSION["role"] == "logistic") { ?>
                        <li><a href=<?= "http://" . $domain . "/intern/planning" ?>><i class="fa-regular fa-calendar"></i></a></li>
                        <li><a href=<?= "http://" . $domain . "/intern/checklist" ?>><i class="fa-solid fa-list-check"></i></a></li>
                        <li><a href=<?= "http://" . $domain . "/intern/todo" ?>><i class="fa-solid fa-list-ul"></i></a></li>
                    <?php } else if ($_SESSION["role"] == "management") { ?>
                        <li><a href=<?= "http://" . $domain . "/reservation/reservationDetails" ?>><i class="fa-regular fa-calendar"></i></a></li>
                        <li><a href=<?= "http://" . $domain . "/intern/chat" ?>><i class="fa-regular fa-message"></i></a></li>
                        <li><a href=<?= "http://" . $domain . "/apartment/moderateTestimony" ?>><i class="fas fa-clipboard-check"></i></a></li>
                        <li><a href=<?= "http://" . $domain . "/apartment/listApartement" ?>><i class="fa-regular fa-building"></i></a></li>
                    <?php } else if ($_SESSION["role"] == "admin") { ?>
                        <li><a href=<?= "http://" . $domain . "/admin/admin" ?>><i class="fa-solid fa-user-gear"></i></a></li>
                    <?php } ?>
                    <li><a href=<?= "http://" . $domain . "/user/settings" ?>><i class="fa-regular fa-user"></i></a></li>
                    <li>

                        <a href=<?= "http://" . $domain . "/user/logoutMethod" ?>>
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>

                    </li>
                <?php } ?>
            </ul>
            <ul id="mobile">
                <li id="searchMobile"><i class="fa-solid fa-magnifying-glass"></i></li>
                <li id="searchFormMobile">
                    <form action="searchPage" method="GET" class="searchFormInput">
                        <input class="searchInput" name="search" type="text" placeholder="16ème arrondissement...">
                        <button type="submit" class="homepageSearchButton homepageSearchButtonMobile"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
                <li id="headerBurger"><i class="fa-solid fa-bars"></i></li>
            </ul>
            <ul id="headerBurgerContent">
                <?php
                if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                ?>
                    <a href=<?= "http://" . $domain . "/testimony" ?>>
                        <li><i class="fas fa-quote-left"></i>
                            <p>Témoignages</p>
                        </li>
                    </a>
                    <a href=<?= "http://" . $domain . "/user/login" ?>>
                        <li><i class="fa-solid fa-right-to-bracket"></i>
                            <p>Se connecter</p>
                        </li>
                    </a>

                    <?php
                } else {
                    if ($_SESSION["role"] == "customer") { ?>
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
                    <?php } else if ($_SESSION["role"] == "logistic") { ?>
                        <a href=<?= "http://" . $domain . "/intern/planning" ?>>
                            <li><i class="fa-regular fa-calendar"></i>
                                <p>Planning
                                </p>
                            </li>
                        </a>
                        <a href=<?= "http://" . $domain . "/intern/checklist" ?>>
                            <li>
                                <i class="fa-solid fa-list-check"></i>
                                <p>Checklist
                                </p>
                            </li>
                        </a>
                        <a href=<?= "http://" . $domain . "/intern/todo" ?>>
                            <li>
                                <i class="fa-solid fa-list-ul"></i>
                                <p>To do
                                </p>
                            </li>
                        </a>
                    <?php } else if ($_SESSION["role"] == "management") { ?>
                        <a href=<?= "http://" . $domain . "/reservation/reservationDetails" ?>>
                            <li><i class="fa-regular fa-calendar"></i>
                                <p>Calendrier
                                </p>
                            </li>
                        </a>
                        <a href=<?= "http://" . $domain . "/reservation/chat" ?>>
                            <li><i class="fa-regular fa-message"></i>
                                <p>Chat
                                </p>
                            </li>
                        </a>
                        <a href=<?= "http://" . $domain . "/apartment/moderateTestimony" ?>>
                            <li><i class="fas fa-clipboard-check"></i>
                                <p>Modération des avis
                                </p>
                            </li>
                        </a>
                        <a href=<?= "http://" . $domain . "/apartment/listApartement" ?>>
                            <li><i class="fa-regular fa-building"></i>
                                <p>Appartements
                                </p>
                            </li>
                        </a>
                    <?php } else if ($_SESSION["role"] == "admin") { ?>
                        <a href=<?= "http://" . $domain . "/admin/admin" ?>>
                            <li><i class="fa-solid fa-user-gear"></i>
                                <p>Gérer les utilisateurs
                                </p>
                            </li>
                        </a>
                    <?php } ?>
                    <a href=<?= "http://" . $domain . "/user/settings" ?>>
                        <li><i class="fa-regular fa-user"></i>
                            <p>Votre Profil</p>
                        </li>
                    </a>
                    <form action="" method="post">
                        <li>
                            <button type="submit" class="buttonSubmit">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <a href=<?= "http://" . $domain . "/user/logoutMethod" ?>>Se déconnecter</a>
                            </button>
                        </li>
                    </form>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <script src="../public/js/app.js"></script>
    <script src="../public/js/header.js"></script>