<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/admin.css">
<link rel="stylesheet" href="../public/css/managementCrud.css">

<?php
global $readApartment;
$apartmentObject = $readApartment[0];
?>

<main>
    <div class="banner">
        <h1>Mise à jour de [<?= $apartmentObject->getName() ?>]</h1>
    </div>

    <div class="userContainer">

        <form action="updateApartement" method="POST" class="apartement">
            <div class="userInfo">
                <h3>Informations principales</h3>
                <input type="hidden" name="id" value=<?= $apartmentObject->getId() ?>>
                <input type="text" name="name" placeholder="Nom de l'appartement" value=<?= $apartmentObject->getName() ?> required>
                <input type="text" name="address" placeholder="Adresse" value=<?= $apartmentObject->getAddress() ?> required>
                <input type="text" name="arrondissement" placeholder="Arrondissement" value=<?= $apartmentObject->getArrondissement() ?> required>
                <input type="text" name="price" placeholder="Prix" value=<?= $apartmentObject->getPrice() ?> required>
            </div>
            <div class="userInfo">
                <h3>Caractéristiques</h3>
                <input type="text" name="squareMeter" placeholder="Nombre de mètre carré" value=<?= $apartmentObject->getSquareMeter() ?> required>
                <input type="text" name="capacity" placeholder="Nombre de personnes" value=<?= $apartmentObject->getCapacity() ?> required>
                <input type="text" name="numberBathroom" class="Nombre de salle de bain" value=<?= $apartmentObject->getNumberBathroom() ?> required>
                <input type="text" name="housingType" class="Type de propriété" value=<?= $apartmentObject->gethousingType() ?> required>
            </div>
            <div class="userInfo">
                <h3>Agréments</h3>
                <input type="text" name="vueSur" placeholder="Vue sur" value=<?= $apartmentObject->getVueSur() ?>>
                <input type="text" name="quartier" placeholder="Quartier" value=<?= $apartmentObject->getQuartier() ?>>
                <div class="createCheckbox">
                    <input type="checkbox" name="balcon" id="balcon-checkbox" <?= ($apartmentObject->getBalcon() === 'on') ? 'checked' : '' ?>>
                    <label for="balcon-checkbox">Balcon</label>
                </div>
                <div class="createCheckbox">
                    <input type="checkbox" name="terasse" id="terasse-checkbox" <?= ($apartmentObject->getTerasse() === 'on') ? 'checked' : '' ?>>
                    <label for="terasse-checkbox">Terrasse</label>
                </div>

            </div>
            <div class="userInfo">
                <h3>Particularité</h3>
                <input type="text" name="description" placeholder="Description..." value=<?= $apartmentObject->getDescription() ?> required>
            </div>
            <div class="userInfo">
                <h3>Photo</h3>
                <!-- <input type="text" name="photo1" placeholder="URL de l'image 1" required>
                <input type="text" name="photo2" placeholder="URL de l'image 2">
                <input type="text" name="photo3" placeholder="URL de l'image 3">
                <input type="text" name="photo4" placeholder="URL de l'image 4"> -->
                <!-- <div class="readImage">
                    <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
                </div> -->
            </div>
            <div class="userForm">
                <input type="submit" value="Mettre à jour" class="goldenButton">
            </div>
            <div class="userForm">
                <a href=<?= "http://" . $domain . "/apartment/listApartement" ?> class="blueButton">Retour</a>
            </div>
        </form>

    </div>

</main>


</body>

</html>