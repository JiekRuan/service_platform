<?php
if ($_SESSION["role"] !== "logistic") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}
?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/planning.css">
<script src="../public/js/filter.js"></script>

<?php
$value1 = 27;
$value2 = 4;
$value3 = 5;
$value4 = 6;
$value5 = 6;

$filters = [
    ['text' => 'Tous', 'number' => $value1],
    ['text' => 'À nettoyer', 'number' => $value2],
    ['text' => 'En cours', 'number' => $value3],
    ['text' => 'En attente', 'number' => $value4],
    ['text' => 'Prêt', 'number' => $value4],
    ['text' => 'Terminé', 'number' => $value5],
];
?>

<script>
    var filters = <?php echo json_encode($filters); ?>;
    var filterElement = createFilter(filters);
</script>

<?php

function logisticPlanning($i)
{
?>
    <div class="user">
        <div class="userInfo">
            <div class="planningDate">
                <h3>#location_<?= $i ?></h3>
                <div class="planningState">
                    <p class="state">Terminé</p>
                    <div class="colorTablet"></div>
                </div>
            </div>
            <div>
                <p>Nom du logement</p>
                <p>Adresse</p>
            </div>
            <div>
                <p>Personne en charge :</p>
                <p>TRUC Machin</p>
            </div>
            <div class="planningDate">
                <p>Arrivé : 10/12/2023</p>
                <p>Départ : 20/12/2023</p>
            </div>
        </div>
    </div>
<?php
}
?>

<main>
    <div class="banner">
        <h1>Planning</h1>
    </div>

    <div class="userContainer">

        <div class="filterList">
            <div class="filterSub1">
                <script>
                    let filterSub1 = document.querySelector(".filterSub1")
                    filterSub1.appendChild(filterElement)
                </script>
                <form action="" method="GET">
                    <select>
                        <option value="option1">ID</option>
                        <option value="option2">Arrondissement</option>
                        <option value="option3">Nom</option>
                        <option value="option4">Statut</option>
                        <option value="option5">Date de départ</option>
                        <option value="option6">Date d'arrivé</option>
                    </select>
                </form>
            </div>
            <form action="" method="GET" class="filterSub2">
                <input type="text" placeholder="Rechercher...">
                <input type="date" placeholder="De...">
                <input type="date" placeholder="Jusqu'à">
                <input type="submit" value="Rechercher" class="goldenButton">
            </form>
        </div>


        <?php
        for ($i = 0; $i < 5; $i++) {
            logisticPlanning($i);
        }
        ?>

    </div>

</main>


</body>
<script src="../public/js/optionSelect.js"></script>
<script src="../public/js/colorTablet.js"></script>

</html>