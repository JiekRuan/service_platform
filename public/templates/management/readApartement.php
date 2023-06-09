<?php
if ($_SESSION["role"] !== "management") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}

global $photos;
?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/admin.css">
<link rel="stylesheet" href="../public/css/managementCrud.css">
<?php
global $domain;
global $readApartment;
$apartmentObject = $readApartment[0];
?>

<main>
    <div class="banner">
        <h1>Logement ID : <?= $apartmentObject->getId() ?></h1>
        <h3><?= $apartmentObject->getName() ?></h3>
    </div>

    <div class="userContainer">

        <div class="apartement">
            <div class="userInfo">
                <h3>Informations principales</h3>
                <p>ID : <?= $apartmentObject->getId() ?></p>
                <p>Nom : <?= $apartmentObject->getName() ?></p>
                <p>Arrondissement : <?= $apartmentObject->getArrondissement() ?></p>
            </div>
            <div class="userInfo">
                <h3>Caractéristiques</h3>
                <ul>
                    <li>Nombre de mètre carré : <?= $apartmentObject->getSquareMeter() ?>m²</li>
                    <li>Nombre de personne : <?= $apartmentObject->getCapacity() ?></li>
                    <li>Nombre de salle de bain : <?= $apartmentObject->getNumberBathroom() ?></li>
                    <li>Type de bien : <?= $apartmentObject->gethousingType() ?></li>
                </ul>
            </div>
            <div class="userInfo">
                <h3>Agréments</h3>
                <ul>
                    <li>Vue sur : <?= $apartmentObject->getVueSur() ?></li>
                    <li>Quartier : <?= $apartmentObject->getQuartier() ?></li>
                    <li>Terasse : <?= ($apartmentObject->getTerasse() === 'on') ? 'Oui' : 'Non' ?></li>
                    <li>Balcon : <?= ($apartmentObject->getBalcon() === 'on') ? 'Oui' : 'Non' ?></li>

                </ul>
            </div>
            <div class="userInfo">
                <h3>Particularité</h3>
                <p><?= $apartmentObject->getDescription() ?></p>
            </div>
            <div class="userInfo">
                <h3>Photos</h3>
                <div class="readImage">
                <figure>
                    <?php if (isset($photos[0]['photo'])) : ?>
                        <!-- <img src="public/images/sdb.png" alt="salle de bain" class="clickable-image"> -->
                        <img src="data:image/jpeg;base64,<?= $photos[0]['photo']; ?>" alt="logement à Paris <?= $apartmentObject->getName() ?>" class="clickable-image" />
                    <?php endif; ?>

                </figure>
                <figure>
                    <?php if (isset($photos[1]['photo'])) : ?>
                        <!-- <img src="public/images/sdb.png" alt="salle de bain" class="clickable-image"> -->
                        <img src="data:image/jpeg;base64,<?= $photos[1]['photo']; ?>" alt="logement à Paris <?= $apartmentObject->getName() ?>" class="clickable-image" />
                    <?php endif; ?>

                </figure>
                <figure>
                    <?php if (isset($photos[2]['photo'])) : ?>
                        <!-- <img src="public/images/sdb.png" alt="salle de bain" class="clickable-image"> -->
                        <img src="data:image/jpeg;base64,<?= $photos[2]['photo']; ?>" alt="logement à Paris <?= $apartmentObject->getName() ?>" class="clickable-image" />
                    <?php endif; ?>

                </figure>
                <figure>
                    <?php if (isset($photos[3]['photo'])) : ?>
                        <!-- <img src="public/images/sdb.png" alt="salle de bain" class="clickable-image"> -->
                        <img src="data:image/jpeg;base64,<?= $photos[3]['photo']; ?>" alt="logement à Paris <?= $apartmentObject->getName() ?>" class="clickable-image" />
                    <?php endif; ?>
                </figure>
                </div>
            </div>

            <div class="userForm">
                <a href=<?= "http://" . $domain . "/apartment/displayFormModify?id=" . $apartmentObject->getId() ?> class="blueGoldButton">Modifier</a>
                <p class="goldenButton" id="readDelete">Supprimer</p>

                <div id="readDeleteMenu">
                    <p>Êtes-vous sûr(e) de vouloir supprimer ce logement ?</p>
                    <div id="readDeleteMenuButton">
                        <div class="userForm">
                            <p class="blueButton cancel">Annuler</p>
                        </div>
                        <form action="deleteApartment" method="POST">
                            <input type="hidden" name="id" value=<?= $apartmentObject->getId() ?>>
                            <input type="submit" value="Supprimer" class="goldenButton">
                        </form>
                    </div>
                </div>
            </div>

            <div class="userForm">
                <a href=<?= "http://" . $domain . "/apartment/listApartement" ?> class="blueButton">Retour</a>
            </div>

        </div>

    </div>

</main>

</body>
<script src="../public/js/readApartement.js"></script>

</html>