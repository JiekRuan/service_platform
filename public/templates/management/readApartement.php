<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/admin.css">
<link rel="stylesheet" href="../public/css/managementCrud.css">
<?php
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
                    <li><?= $apartmentObject->getVueSur() ?></li>
                    <li><?= $apartmentObject->getQuartier() ?></li>
                    <li><?= $apartmentObject->getTerasse() ?></li>
                    <li><?= $apartmentObject->getBalcon() ?></li>
                </ul>
            </div>
            <div class="userInfo">
                <h3>Particularité</h3>
                <p><?= $apartmentObject->getDescription() ?></p>
            </div>
            <div class="userInfo">
                <h3>Photos</h3>
                <div class="readImage">
                    <figure><img src="../public/images/concierge/service_6.png" alt="placeholder"></figure>
                    <figure><img src="../public/images/concierge/service_2.png" alt="placeholder"></figure>
                    <figure><img src="../public/images/concierge/service_3.png" alt="placeholder"></figure>
                    <figure><img src="../public/images/concierge/service_5.png" alt="placeholder"></figure>
                </div>
            </div>

            <div class="userForm">
                <form action="" method="POST"><input type="submit" value="Modifier" class="blueGoldButton"></form>
                <p class="goldenButton" id="readDelete">Supprimer</p>

                <div id="readDeleteMenu">
                    <p>Êtes-vous sûr(e) de vouloir supprimer ce logement ?</p>
                    <div id="readDeleteMenuButton">
                        <div class="userForm">
                            <a href="" class="blueButton">Annuler</a>
                        </div>
                        <form action="" method="POST"><input type="submit" value="Supprimer" class="goldenButton"></form>
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