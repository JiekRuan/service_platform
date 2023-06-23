<?php
if ($_SESSION["role"] !== "management") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/admin.css">
<link rel="stylesheet" href="../public/css/managementCrud.css">



<?php
global $apartments;
function listApartement($i)
{
    global $domain;
    if (is_object($i)) {
?>
        <div class="user">
            <a href="<?= "http://" . $domain . "/apartment/readApartement?id=" . $i->getId() ?>" class="userInfo">
                <p>ID : <?= $i->getId() ?></p>
                <p>Nom : <?= $i->getName() ?></p>
                <p>Arrondissement : <?= $i->getArrondissement() ?></p>
                <p>Capacité : <?= $i->getCapacity() ?></p>
            </a>
            <div class="userForm">
                <a href=<?= "http://" . $domain . "/apartment/displayFormModify?id=" . $i->getId() ?> class="userInfo blueGoldButton">Modifier</a>
                <p class="goldenButton readDelete">Supprimer</p>
                <div class="readDeleteMenu">
                    <p>Êtes-vous sûr(e) de vouloir supprimer ce logement ?</p>
                    <div id="readDeleteMenuButton">
                        <div class="userForm">
                            <p class="blueButton cancel">Annuler</p>
                        </div>
                        <form action="deleteApartment" method="POST">
                            <input type="hidden" name="id" value=<?= $i->getId() ?>>
                            <input type="submit" value="Supprimer" class="goldenButton">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    <?php
    } elseif (is_array($i)) {
    ?>
        <div class="user">
            <a href="<?= "http://" . $domain . "/apartment/readApartement?id=" . $i["id"] ?>" class="userInfo">
                <p>ID : <?= $i["id"] ?></p>
                <p>Nom : <?= $i["name"] ?></p>
                <p>Arrondissement : <?= $i["arrondissement"] ?></p>
                <p>Capacité : <?= $i["capacity"] ?></p>
            </a>
            <div class="userForm">
                <a href=<?= "http://" . $domain . "/apartment/displayFormModify?id=" . $i["id"] ?> class="userInfo blueGoldButton">Modifier</a>
                <p class="goldenButton readDelete">Supprimer</p>
                <div class="readDeleteMenu">
                    <p>Êtes-vous sûr(e) de vouloir supprimer ce logement ?</p>
                    <div id="readDeleteMenuButton">
                        <div class="userForm">
                            <p class="blueButton cancel">Annuler</p>
                        </div>
                        <form action="deleteApartment" method="POST">
                            <input type="hidden" name="id" value=<?= $i["id"] ?>>
                            <input type="submit" value="Supprimer" class="goldenButton">
                        </form>
                    </div>
                </div>

            </div>
        </div>
<?php
    }
}
?>

<main>
    <div class="banner">
        <h1>Liste des logements</h1>
    </div>

    <div class="userContainer">

        <div class="filterList">
            <a href=<?= "http://" . $domain . "/apartment/createApartement" ?> class="goldenButton">Ajouter un logement</a>
            <form action="searchPageListApartment" method="GET">
                <input type="text" name="search" placeholder="Rechercher...">
                <button type="sumbit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <form action="" method="GET">
                <select>
                    <option value="option1">ID</option>
                    <option value="option2">Nom</option>
                    <option value="option3">Arrondissement</option>
                    <option value="option4">Capacité</option>
                </select>
            </form>
        </div>


        <?php

        if (count($apartments) > 0) {
            foreach ($apartments as $apartment) {
                listApartement($apartment);
            }
        } else {
            echo "<p>Pas de logement correspondant à cette cette recherche.</p>";
        }
        ?>

    </div>

</main>


</body>
<script src="../public/js/optionSelect.js"></script>
<script src="../public/js/listApartement.js"></script>


</html>