<?php include '../componant/header.html' ?>
<link rel="stylesheet" href="../../css/admin.css">
<script src="../../js/filter.js"></script>

<?php
$value1 = 15;
$value2 = 4;
$value3 = 5;
$value4 = 6;

$filters = [
    ['text' => 'Tous', 'number' => $value1],
    ['text' => 'Client', 'number' => $value2],
    ['text' => 'Gestion', 'number' => $value3],
    ['text' => 'Logistique', 'number' => $value4]
];
?>

<script>
    var filters = <?php echo json_encode($filters); ?>;
    var filterElement = createFilter(filters);
</script>

<?php

function adminUserTemplate($i)
{
?>
    <div class="user">
        <div class="userInfo">
            <p>#<?= $i ?></p>
            <p>adresse@email.fr</p>
            <p>Nom</p>
            <p>Prénom</p>
            <p>Statut : Actif</p>
            <p>Date de création : 02/12/2020</p>
        </div>
        <div class="userForm">
            <form action="" method="POST" class="form">
                <select>
                    <option value="option1">Client</option>
                    <option value="option2">Gestion</option>
                    <option value="option3">Logistique</option>
                </select>
            </form>

            <p class="blueGoldButton readDesactivate">Désactiver</p>

            <div class="readDesactivateMenu">
                <p>Êtes-vous sûr(e) de vouloir désactiver ce compte ?</p>
                <div id="readDeleteMenuButton">
                    <div class="userForm">
                        <p class="blueButton cancelDesactivate">Annuler</p>
                    </div>
                    <form action="" method="POST"><input type="submit" value="Désactiver" class="goldenButton"></form>
                </div>
            </div>

            <p class="goldenButton readDelete">Supprimer</p>

            <div class="readDeleteMenu">
                <p>Êtes-vous sûr(e) de vouloir supprimer ce compte ?</p>
                <div id="readDeleteMenuButton">
                    <div class="userForm">
                        <p class="blueButton cancelDelete">Annuler</p>
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
        <h1>Zone administrateur</h1>
    </div>

    <div class="userContainer">


        <div class="filterList">
            <script>
                let filterList = document.querySelector(".filterList")
                filterList.appendChild(filterElement)
            </script>
            <form action="" method="GET">
                <input type="text" placeholder="Rechercher...">
            </form>
            <form action="" method="GET">
                <select>
                    <option value="option1">ID</option>
                    <option value="option2">Adresse e-mail</option>
                    <option value="option3">Nom</option>
                    <option value="option4">Statut</option>
                    <option value="option5">Date de création</option>
                </select>
            </form>
        </div>


        <?php
        for ($i = 0; $i < 5; $i++) {
            adminUserTemplate($i);
        }
        ?>

    </div>

</main>


</body>
<script src="../../js/optionSelect.js"></script>
<script src="../../js/admin.js"></script>

</html>