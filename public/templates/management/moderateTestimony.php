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
<link rel="stylesheet" href="../public/css/planning.css">
<link rel="stylesheet" href="../public/css/moderateTestimony.css">
<link rel="stylesheet" href="../public/css/managementCrud.css">
<script src="../public/js/filter.js"></script>

<?php

global $getTestimonies;
// echo var_dump($getTestimonies);

$value1 = count($getTestimonies);
$approvedCount = 0;
$pendingCount = 0;

foreach ($getTestimonies as $testimony) {
    if ($testimony['state'] == 1) {
        $approvedCount++;
    } elseif ($testimony['state'] == 0) {
        $pendingCount++;
    }
}

$filters = [
    ['text' => 'Tous', 'number' => count($getTestimonies)],
    ['text' => 'Approuvé', 'number' => $approvedCount],
    ['text' => 'En attente', 'number' => $pendingCount],
];
?>

<script>
    var filters = <?php echo json_encode($filters); ?>;
    var filterElement = createFilter(filters);
</script>

<?php

function moderateTestimony($i)
{
    global $domain;
?>
    <div class="user">
        <div class="userInfo">
            <div class="testimonyInfo">
                <div>
                    <h3>#<?= $i['apartment_id'] ?> <?= $i['name'] ?></h3>
                    <p>dans le <?= $i['arrondissement'] ?>ème arrondissement</p>
                </div>
                <p>
                    Témoignage #<?= $i['opinion_id'] ?>
                </p>
            </div>
            <div class="testimonyUser">
                <p><?= $i['user_name'] ?></p>
                <p><?= $i['email'] ?></p>
                <p>Date du séjour : <?= date_format(new DateTime($i['start_time']), 'd/m/Y') ?> - <?= date_format(new DateTime($i['end_time']), 'd/m/Y') ?></p>
                <p>Date du témoignage : <?= date_format(new DateTime($i['created_at']), 'd/m/Y') ?></p>
                <p>Témoignage :</p>
                <p><?= $i['content'] ?></p>
            </div>
            <!-- <div class="userInfo">
                <p>Photos :</p>
                <div class="readImage">
                    <figure><img src="../public/images/salon.png" alt="placeholder"></figure>
                    <figure><img src="../public/images/homepage/appart_2.jpg" alt="placeholder"></figure>
                    <figure><img src="../public/images/homepage/appart_6.jpg" alt="placeholder"></figure>
                    <figure><img src="../public/images/homepage/appart_5.jpg" alt="placeholder"></figure>
                </div>
            </div> -->

            <?php
            if ($i['state']) { ?>
                <div class="testimonyForm">
                    <p>Témoignage validé !</p>
                </div>
            <?php
            } else { ?>
                <div class="testimonyForm">
                    <form action="http://<?= $domain ?>/apartment/refuseTestimony" method="POST">
                        <input type="hidden" name="id" value=<?= $i['opinion_id'] ?>>
                        <input type="submit" value="Refuser" class="blueButton">
                    </form>
                    <form action="http://<?= $domain ?>/apartment/acceptTestimony" method="POST">
                        <input type="hidden" name="id" value=<?= $i['opinion_id'] ?>>
                        <input type="submit" value="Accepter" class="goldenButton">
                    </form>
                </div>
            <?php
            } ?>

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
                <!-- <form action="" method="GET">
                    <select>
                        <option value="option1">ID témoignage</option>
                        <option value="option2">Date témoignage</option>
                        <option value="option3">ID logement</option>
                    </select>
                </form> -->
            </div>
            <!-- <form action="" method="GET" class="filterSub2">
                <input type="text" placeholder="Rechercher...">
                <input type="date" placeholder="De...">
                <input type="date" placeholder="Jusqu'à">
                <input type="submit" value="Rechercher" class="goldenButton">
            </form> -->
        </div>


        <?php
        if (count($getTestimonies) > 0)
            foreach ($getTestimonies as $getTestimony) {
                moderateTestimony($getTestimony);
            }
        else { ?>
            <p>Pas de témoignage pour le moment.</p>
        <?php
        }
        ?>

    </div>

</main>


</body>
<script src="../public/js/optionSelect.js"></script>

</html>