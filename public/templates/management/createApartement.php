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
                <input type="text" name="balcon" placeholder="Balcon">
                <input type="text" name="terasse" placeholder="Terasse">
            </div>
            <div class="userInfo">
                <h3>Particularité</h3>
                <input type="text" name="description" placeholder="Blabla no jutsu" required>
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