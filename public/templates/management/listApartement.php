<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="public/css/admin.css">
<link rel="stylesheet" href="public/css/managementCrud.css">


<?php

function listApartement($i)
{
?>
    <div class="user">
        <a href="" class="userInfo">
            <p>#location_<?= $i ?></p>
            <p>Nom de l'appartement</p>
            <p>Arrondissement</p>
            <p>Capacité</p>
        </a>
        <div class="userForm">
            <form action="" method="POST"><input type="submit" value="Modifier" class="blueGoldButton"></form>
            <p class="goldenButton readDelete">Supprimer</p>

            <div class="readDeleteMenu">
                <p>Êtes-vous sûr(e) de vouloir supprimer ce logement ?</p>
                <div id="readDeleteMenuButton">
                    <div class="userForm">
                        <p class="blueButton cancel">Annuler</p>
                    </div>
                    <form action="" method="POST"><input type="submit" value="Supprimer" class="goldenButton"></form>
                </div>
            </div>

        </div>
    </div>
<?php
}
?>

<main>
    <div class="banner">
        <h1>Liste des logements</h1>
    </div>

    <div class="userContainer">


        <div class="filterList">
            <form action="" method="GET">
                <input type="text" placeholder="Rechercher...">
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
        for ($i = 0; $i < 5; $i++) {
            listApartement($i);
        }
        ?>

    </div>

</main>


</body>
<script src="public/js/optionSelect.js"></script>
<script src="public/js/listApartement.js"></script>


</html>