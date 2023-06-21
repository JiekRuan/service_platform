<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="public/css/admin.css">
<link rel="stylesheet" href="public/css/managementCrud.css">

<main>
    <div class="banner">
        <h1>Logement #2</h1>
        <h3>Nom du logement</h3>
    </div>

    <div class="userContainer">

        <div class="apartement">
            <div class="userInfo">
                <h3>Informations principales</h3>
                <p>ID : #location_2</p>
                <p>Nom : Appartement Senteur de cerisier</p>
                <p>Arrondissement : 16ème</p>
            </div>
            <div class="userInfo">
                <h3>Caractéristiques</h3>
                <ul>
                    <li>Nombre de mètre carré : 120m²</li>
                    <li>Nombre de personne : 10</li>
                    <li>Nombre de salle de bain : 2</li>
                    <li>Type de bien : duplex</li>
                </ul>
            </div>
            <div class="userInfo">
                <h3>Agréments</h3>
                <ul>
                    <li>Vue sur la Tour Eiffel</li>
                    <li>Sitié en plein centre-ville</li>
                </ul>
            </div>
            <div class="userInfo">
                <h3>Particularité</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam qui animi sunt cupiditate asperiores pariatur eligendi voluptate facere officiis enim dolorem, recusandae repellat, aliquid accusantium dicta in at illo excepturi.</p>
            </div>
            <div class="userInfo">
                <h3>Photos</h3>
                <div class="readImage">
                    <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
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
                <a href="" class="blueButton">Retour</a>
            </div>
        </div>

    </div>

</main>

</body>
<script src="public/js/readApartement.js"></script>

</html>