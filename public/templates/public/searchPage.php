<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="public/css/searchPage.css">

<?php


global $apartments;
function apartementTemplate($apartments, $index)
{
    global $domain;
    global $bookmarks;
    global $photos;
    if (is_object($apartments)) {

        $i = $apartments;
?>
        <div class="userInfo box">
            <a href="<?= "http://" . $domain . "/logement?id=" . $i->getId() ?>">
                <figure>
                    <!-- <img src="../public/images/paris.jpeg" alt="logement2"> -->
                    <img src="data:image/jpeg;base64,<?= $photos[$index]['photo']; ?>" alt="logement à Paris <?= $i->getName() ?>" />
                </figure>
            </a>
            <div class="information">
                <div class="star">
                    <h3 class="monaco"><a href="<?= "http://" . $domain . "/logement?id=" . $i->getId() ?>"><?= $i->getName() ?></a></h3>
                    <?php
                    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                    } else {
                        if (isset($_SESSION["role"]) && $_SESSION["role"] === "customer") { ?>
                            <form action=<?= "http://" . $domain . "/user/bookmarkAddDelete" ?> method="POST" id=<?= $i->getId() ?> onclick="submitReservationForm('<?= $i->getId() ?>')">
                                <input type="hidden" name="apartmentId" value=<?= $i->getId() ?>>
                                <input type="hidden" name="REQUEST_URI" value=<?= $_SERVER['REQUEST_URI'] ?>>
                                <input type="hidden" name="userId" value=<?= $_SESSION['userId'] ?>>
                        <?php
                            $isFavorite = false;
                            if (count($bookmarks) > 0) {
                                foreach ($bookmarks as $bookmark) {
                                    if ($bookmark['id'] == $i->getId()) {
                                        $isFavorite = true; // L'élément est dans les favoris
                                        break; // Sortir de la boucle dès que l'élément est trouvé
                                    }
                                }
                            }
                            if ($isFavorite) {
                                echo '<i class="fa-solid fa-bookmark"></i>';
                            } else {
                                echo '<i class="fa-regular fa-bookmark"></i>';
                            }
                        }
                    }
                        ?>
                            </form>

                </div>
                <div class="price">

                    <p><a href="<?= "http://" . $domain . "/logement?id=" . $i->getId() ?>"><?= $i->getHousingType() ?> | <?= $i->getSquareMeter() ?> m² | <?= $i->getCapacity() ?> chambres</a></p>
                    <p><?= $i->getPrice() ?>€</p>
                </div>
                <p class="price2">/jour</p>
            </div>
        </div>
    <?php
    } elseif (is_array($apartments)) {
    ?>
        <div class="userInfo box">
            <figure>
                <a href="<?= "http://" . $domain . "/logement?id=" . $apartments['id'] ?>">
                    <img src="data:image/jpeg;base64,<?= $photos[$index]['photo']; ?>" alt="logement à Paris <?= $apartments['name'] ?>" />
                </a>
            </figure>
            <div class="information">
                <div class="star">
                    <h3 class="monaco">
                        <a href="<?= "http://" . $domain . "/logement?id=" . $apartments['id'] ?>">
                            <?= $apartments['name'] ?>
                        </a>
                    </h3>
                    <?php
                    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                    } else {
                        if (isset($_SESSION["role"]) && $_SESSION["role"] === "customer") { ?>
                            <form action=<?= "http://" . $domain . "/user/bookmarkAddDelete" ?> method="POST" id=<?= $apartments['id'] ?> onclick="submitReservationForm('<?= $apartments['id'] ?>')">
                                <input type="hidden" name="apartmentId" value=<?= $apartments['id'] ?>>
                                <input type="hidden" name="REQUEST_URI" value=<?= $_SERVER['REQUEST_URI'] ?>>
                                <input type="hidden" name="userId" value=<?= $_SESSION['userId'] ?>>
                        <?php
                            $isFavorite = false;
                            if (count($bookmarks) > 0) {
                                foreach ($bookmarks as $bookmark) {
                                    if ($bookmark['id'] == $apartments['id']) {
                                        $isFavorite = true; // L'élément est dans les favoris
                                        break; // Sortir de la boucle dès que l'élément est trouvé
                                    }
                                }
                            }
                            if ($isFavorite) {
                                echo '<i class="fa-solid fa-bookmark"></i>';
                            } else {
                                echo '<i class="fa-regular fa-bookmark"></i>';
                            }
                        }
                    }
                        ?>
                </div>
                <div class="price">
                    <p><?= $apartments['housingType'] ?> | <?= $apartments['squareMeter'] ?> m² | <?= $apartments['capacity'] ?> chambres <a href="<?= "http://" . $domain . "/logement?id=" . $apartments['id'] ?>">
                        </a>
                    </p>
                    <p><?= $apartments['price'] ?>€</p>
                </div>
                <p class="price2">/jour</p>
            </div>
        </div>
<?php
        // }
    } else {
        echo "Type de données non pris en charge pour \$apartments.";
    }
} ?>

<main>
    <div id="searchFilter" class="searchFilter">
        <div class="searchTitle">
            <h3>Filtres</h3>
            <i id="filterClose" class="fa-solid fa-xmark"></i>
        </div>
        <form action="" class="formFilter">

            <div class="formCategory">
                <label for="">
                    <h4>Arrondissement</h4>
                </label>

                <div class="searchFilterCheckbox">
                    <label class="searchFilterCheckboxOption">
                        <input type="checkbox" name="option1" value="Option 1">
                        <p>Option 1</p>
                    </label>

                    <label class="searchFilterCheckboxOption">
                        <input type="checkbox" name="option2" value="Option 2">
                        <p>Option 2</p>
                    </label>

                    <label class="searchFilterCheckboxOption">
                        <input type="checkbox" name="option3" value="Option 3">
                        <p>Option 3</p>
                    </label>
                </div>

            </div>

            <div class="formCategory">
                <label for="">
                    <h4>Pièces</h4>
                </label>
                <div class="searchFilterCheckbox">
                    <label class="searchFilterCheckboxOption">
                        <input type="checkbox" name="option1" value="Option 1">
                        <p>Option 1</p>
                    </label>

                    <label class="searchFilterCheckboxOption">
                        <input type="checkbox" name="option2" value="Option 2">
                        <p>Option 2</p>
                    </label>

                    <label class="searchFilterCheckboxOption">
                        <input type="checkbox" name="option3" value="Option 3">
                        <p>Option 3</p>
                    </label>
                </div>
            </div>

            <div class="formCategory">
                <label for="">
                    <h4>Budget</h4>
                </label>
                <div class="searchFilterCheckbox">

                    <div class="range_container">
                        <div class="sliders_control">
                            <input id="fromSlider" type="range" value="0" min="0" max="100" />
                            <input id="toSlider" type="range" value="100" min="0" max="100" />
                        </div>
                        <div class="form_control">
                            <div class="form_control_container">
                                <div class="form_control_container__time">Min</div>
                                <input class="form_control_container__time__input" type="number" id="fromInput" value="0" min="0" max="100" />
                            </div>
                            <div class="form_control_container">
                                <div class="form_control_container__time">Max</div>
                                <input class="form_control_container__time__input" type="number" id="toInput" value="100" min="0" max="100" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="formCategory">
                <label for="">
                    <h4>Santé et bien-être</h4>
                </label>
                <div>
                    <div class="searchFilterCheckbox">
                        <label class="searchFilterCheckboxOption">
                            <input type="checkbox" name="option1" value="Option 1">
                            <p>Option 1</p>
                        </label>

                        <label class="searchFilterCheckboxOption">
                            <input type="checkbox" name="option2" value="Option 2">
                            <p>Option 2</p>
                        </label>

                        <label class="searchFilterCheckboxOption">
                            <input type="checkbox" name="option3" value="Option 3">
                            <p>Option 3</p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="formCategory">
                <input type="submit" value="Confimer" class="goldenButton">
            </div>


        </form>
    </div>
    <div class="banner">
        <h1>Vos vacances méritent d'être inoubliables</h1>
        <form action="searchPage" method="GET" class="formSearch">
            <div class="research">
                <input type="text" name="search" placeholder="Rechercher..." class="homepageInput">
                <input type="submit" value="Rechercher" class="goldenButton">
                <p class="blueGoldButton" id="filterBlock">Filtre</p>
            </div>

            <div class="date">
                <div class="dateInput">
                    <label for="fromDate">De : </label>
                    <input type="date" name="fromDate" id="fromDate" min="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="dateInput">
                    <label for="toDate">Jusqu'à : </label>
                    <input type="date" name="toDate" id="toDate" min="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>

        </form>
    </div>

    <div class="listApartement">
        <?php

        if (count($apartments) > 0) {
            foreach ($apartments as $index => $apartment) {
                apartementTemplate($apartment, $index);
            }
        } else {
            echo "<p>Pas de logement correspondant à cette cette recherche.</p>";
        }

        ?>
    </div>

</main>
<script>
    function submitReservationForm(formId) {
        document.getElementById(formId).submit();
    }
</script>
<script src="public/js/searchPageDate.js"></script>
<script src="public/js/searchPageDualRange.js"></script>
<script src="public/js/date.js"></script>

<?php include 'public/templates/component/footer.php' ?>