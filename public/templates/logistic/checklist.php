<?php include '../componant/header.html' ?>
<link rel="stylesheet" href="../../css/checklist.css">

<?php

function checklistPiece($state)
{
?>
    <div class="user">
        <div class="userInfo">
            <div class="planningDate">
                <h3>Nom de la pièce</h3>
                <div class="planningState">
                    <p class="state"><?= $state ?></p>
                    <div class="colorTablet"></div>
                </div>
            </div>

            <ul>
                <li>
                    <label>
                        <input type="checkbox">
                        <p>Changer les draps</p>
                    </label>
                    <div class="bl">
                        <p class="checklistAddNote">Ajouter une note</p>
                        <div class="noteContainer bl" style="display: none;">
                            <input type="text" placeholder="Ajouter une note">
                            <button class="noteSubmitButton goldenButton">Valider</button>
                            <button class="noteEditButton hidden">Modifier</button>
                            <button class="noteDeleteButton hidden blueButton">Supprimer</button>
                        </div>
                    </div>
                </li>
                <li>
                    <label>
                        <input type="checkbox">
                        <p>Changer les draps</p>
                    </label>
                    <div class="bl">
                        <p class="checklistAddNote">Ajouter une note</p>
                        <div class="noteContainer bl" style="display: none;">
                            <input type="text" placeholder="Ajouter une note">
                            <button class="noteSubmitButton goldenButton">Valider</button>
                            <button class="noteEditButton hidden">Modifier</button>
                            <button class="noteDeleteButton hidden blueButton">Supprimer</button>
                        </div>
                    </div>
                </li>
            </ul>



        </div>
    </div>
<?php
}
?>

<main>
    <div class="banner">
        <h1>Checklist de #location_2</h1>
        <div>
            <p>Nom du logement</p>
            <p>XX Rue de Adresse 20 arrondissement</p>
        </div>
        <div class="planningDate">
            <p>Arrivé : 10/12/2023</p>
            <p>Départ : 20/12/2023</p>
        </div>
    </div>

    <div class="checklistState">
        <p>Etat du logement : </p>
        <div class="planningState">
            <p class="state">En cours</p>
            <div class="colorTablet"></div>
        </div>
    </div>

    <div class="userContainer">

        <?php
        checklistPiece("En cours");
        checklistPiece("Terminé");
        ?>

    </div>

</main>


</body>
<script src="../../js/colorTablet.js"></script>
<script src="../../js/addNote.js"></script>

</html>