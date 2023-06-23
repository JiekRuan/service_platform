<?php
if ($_SESSION["role"] !== "management") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}
?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/managementCrud.css">
<link rel="stylesheet" href="../public/css/moderateTestimony.css">
<link rel="stylesheet" href="../public/css/planning.css">
<script src="../public/js/filter.js"></script>

<?php
$value2 = 4;
$value3 = 5;
$value1 = $value2 + $value3;

$filters = [
    ['text' => 'Tous', 'number' => $value1],
    ['text' => 'Approuvé', 'number' => $value2],
    ['text' => 'En attente', 'number' => $value3],
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
            <div class="testimonyInfo">
                <div>
                    <h3>#location_<?= $i ?></h3>
                    <p>dans le Xème arrondissement</p>
                </div>
                <p>
                    #id_du_témoignage
                </p>
            </div>
            <div class="testimonyUser">
                <p>Nom</p>
                <p>Prénom</p>
                <p>E-mail</p>
                <p>Arrivé</p>
                <p>Départ</p>
                <p>Date du témoignage</p>
                <p>Témoignage :</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto recusandae illo inventore iste atque. Obcaecati reprehenderit architecto cum, vel possimus dolores voluptatum ipsa natus odit commodi esse quis sit pariatur!</p>
            </div>
            <div class="userInfo">
                <p>Photos :</p>
                <div class="readImage">
                    <figure><img src="../public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="../public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="../public/images/concierge/service_1.png" alt="placeholder"></figure>
                    <figure><img src="../public/images/concierge/service_1.png" alt="placeholder"></figure>
                </div>

            </div>
            <div class="testimonyForm">
                <form action=""><input type="submit" value="Accepter" class="goldenButton"></form>
                <form action=""><input type="submit" value="Refuser" class="blueButton"></form>
            </div>
        </div>
    </div>
<?php
}
?>

<main>
    <div class="banner">
        <h1>Modération des avis</h1>
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
                        <option value="option1">ID témoignage</option>
                        <option value="option2">Date témoignage</option>
                        <option value="option3">ID logement</option>
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

</html>