<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="public/css/searchPage.css">

<?php
global $apartments;
// echo var_dump($apartments);
function apartementTemplate($apartments)
{
    global $domain;

    if (is_object($apartments)) {
        $i = $apartments;
?>
        <a href="<?= "http://" . $domain . "/logement?id=" . $i->getId() ?>" class="userInfo box">
            <figure>
                <img src="../public/images/paris.jpeg" alt="logement2">
            </figure>
            <div class="information">
                <div class="star">
                    <h3 class="monaco"><?= $i->getName() ?></h3>
                    <!-- <form action="" method="POST">
                        <input type="hidden" name="favorite" value=<?= $i->getId() ?>>
                        <i class="fa-regular fa-bookmark"></i>
                    </form> -->
                </div>
                <div class="price">
                    <p><?= $i->getHousingType() ?> | <?= $i->getSquareMeter() ?> m² | <?= $i->getCapacity() ?> chambres</p>
                    <p><?= $i->getPrice() ?>€</p>
                </div>
                <p class="price2">/jour</p>
            </div>
        </a>
    <?php
    } elseif (is_array($apartments)) {
        // foreach ($apartments as $i) {
    ?>
        <a href="<?= "http://" . $domain . "/logement?id=" . $apartments['id'] ?>" class="userInfo box">
            <figure>
                <img src="../public/images/paris.jpeg" alt="logement2">
            </figure>
            <div class="information">
                <div class="star">
                    <h3 class="monaco"><?= $apartments['name'] ?></h3><i class="fa-regular fa-bookmark"></i>
                </div>
                <div class="price">
                    <p><?= $apartments['housingType'] ?> | <?= $apartments['squareMeter'] ?> m² | <?= $apartments['capacity'] ?> chambres</p>
                    <p><?= $apartments['price'] ?>€</p>
                </div>
                <p class="price2">/jour</p>
            </div>
        </a>
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
            foreach ($apartments as $apartment) {
                apartementTemplate($apartment);
            }
        } else {
            echo "<p>Pas de logement correspondant à cette cette recherche.</p>";
        }

        ?>
    </div>

</main>

<script src="public/js/searchPageDate.js"></script>
<script src="public/js/searchPageDualRange.js"></script>
<script src="public/js/date.js"></script>

<?php include 'public/templates/component/footer.php' ?>