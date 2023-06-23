<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/admin.css">
<link rel="stylesheet" href="../public/css/managementCrud.css">

<main>
    <div class="banner">
        <h1>Mise à jour du logement #id</h1>
    </div>

    <div class="userContainer">

        <form action="" method="POST" class="apartement">
            <div class="userInfo">
                <h3>Informations principales</h3>
                <input type="text" name="name" placeholder="Nom de l'appartement" required>
                <input type="text" name="address" placeholder="Adresse" required>
                <input type="text" name="arrondissement" placeholder="Arrondissement" required>
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
                <input type="text" name="specificity1" placeholder="Vue sur">
                <input type="text" name="specificity2" placeholder="Situé dans le quartier">
                <input type="text" name="specificity3" placeholder="Terasse/balcon">
            </div>
            <div class="userInfo">
                <h3>Particularité</h3>
                <input type="text" name="description" placeholder="Blabla no jutsu" required>
            </div>
            <div class="userInfo">
                <h3>Photo</h3>
                <input type="text" name="photo1" placeholder="URL de l'image 1" required>
                <input type="text" name="photo2" placeholder="URL de l'image 2">
                <input type="text" name="photo3" placeholder="URL de l'image 3">
                <input type="text" name="photo4" placeholder="URL de l'image 4">
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
                <a href="" class="blueButton">Retour</a>
            </div>
        </form>

    </div>

</main>


</body>

</html>