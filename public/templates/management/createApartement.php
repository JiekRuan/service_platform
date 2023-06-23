<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/admin.css">
<link rel="stylesheet" href="../public/css/managementCrud.css">

<main>
    <div class="banner">
        <h1>Ajout d'un logement</h1>
    </div>

    <div class="userContainer">

        <form action="createApartementMethod" method="POST" class="apartement">
            <div class="userInfo">
                <h3>Informations principales</h3>
                <input type="text" name="name" placeholder="Nom de l'appartement" required>
                <input type="text" name="address" placeholder="Adresse" required>
                <input type="text" name="arrondissement" placeholder="Arrondissement" required>
                <input type="text" name="price" placeholder="Prix" required>
            </div>
            <div class="userInfo">
                <h3>Caractéristiques</h3>
                <input type="text" name="squareMeter" placeholder="Nombre de mètre carré" required>
                <input type="text" name="capacity" placeholder="Nombre de personnes" required>
                <input type="text" name="numberBathroom" placeholder="Nombre de salle de bain" required>
                <input type="text" name="housingType" placeholder="Type de bien" required>
            </div>
            <div class="userInfo">
                <h3>Agréments</h3>
                <input type="text" name="vueSur" placeholder="Vue sur">
                <input type="text" name="quartier" placeholder="Situé dans le quartier">
                <div class="createCheckbox">
                    <input type="checkbox" name="balcon" id="balcon-checkbox">
                    <label for="balcon-checkbox">Balcon</label>
                </div>
                <div class="createCheckbox">
                    <input type="checkbox" name="terasse" id="terasse-checkbox">
                    <label for="terasse-checkbox">Terrasse</label>
                </div>
                <!-- <div class="createCheckbox">
                    <input type="checkbox" name="jacuzzi" id="terasse-checkbox">
                    <label for="terasse-checkbox">Jacuzzi</label>
                </div>
                <div class="createCheckbox">
                    <input type="checkbox" name="sport" id="terasse-checkbox">
                    <label for="terasse-checkbox">Salle de sport</label>
                </div> -->
            </div>
            <div class="userInfo">
                <h3>Particularité</h3>
                <input type="text" name="description" placeholder="Proche de boutiques de luxes et restaurants..." required>
            </div>

            <div class="userInfo">
                <h3>Photos</h3>

                <div id="publication_image">

                </div>

                <label id="custom-img-btn" class="addPhoto blueGoldButton">
                    <i class="fa-solid fa-camera"></i>
                    <p>Ajouter des images</p>
                </label>

            </div>

            <div class="userForm">
                <input type="submit" value="Ajouter un logement" class="goldenButton">
            </div>
            <div class="userForm">
                <a href=<?= "http://" . $domain . "/apartment/listApartement" ?> class="blueButton">Retour</a>
            </div>
        </form>

    </div>

</main>


</body>
<script>
    let userContainer = document.querySelector('.userContainer');
</script>
<script src="../public/js/addPhoto.js"></script>

</html>