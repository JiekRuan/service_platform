<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="public/css/global.css">
<link rel="stylesheet" href="public/css/testimony.css">
<script src="public/js/filter.js"></script>

<?php
global $getTestimonies;
// echo var_dump($getTestimonies);

// $value1 = 15;
// $value2 = 4;

$filters = [
    ['text' => 'Témoignages', 'number' => count($getTestimonies)],
    // ['text' => 'Mes témoignages', 'number' => $value2],

];
?>

<script>
    var filters = <?php echo json_encode($filters); ?>;
    var filterElement = createFilter(filters);
</script>

<?php function testimony($i)
{
    global $domain;

    $createdAt = $i['opinion_create_at'];
    $createdDateTime = new DateTime($createdAt);
    $currentDateTime = new DateTime();
    $interval = $currentDateTime->diff($createdDateTime);

    $daysElapsed = $interval->days;
    $monthsElapsed = $interval->y * 12 + $interval->m;
    $yearsElapsed = $interval->y;
    $text = "";

    if ($daysElapsed == 0) {
        $text = "aujourd'hui";
    } elseif ($daysElapsed < 30) {
        $text =  "il y a " . $daysElapsed . " jour(s)";
    } elseif ($monthsElapsed < 12) {
        $text = "il y a " . floor($daysElapsed / 30) . " mois";
    } else {
        $text = "il y a " . floor($daysElapsed / 365) . " ans";
    }

?>
    <div class="superContainer">
        <div class="Container">
            <div class="infoLogement">
                <h3><a href=<?= "http://" . $domain . "/logement?id=" . $i['id'] ?>><?= $i['name'] ?></a></h3>
                <p><a href=<?= "http://" . $domain . "/logement?id=" . $i['id'] ?>>dans le <?= $i['arrondissement'] ?>ème arrondissement</a></p>
            </div>
            <div class="infoTemoignage">
                <i class="fa-solid fa-quote-left" style="color: #c29b40;"></i>
                <p>
                    <?= $i['content'] ?>
                </p>
            </div>
            <div class="infoNomTemoignage">
                <p>De <?= $i['user_name'] ?>, <?= $text ?></p>
                <i class="fa-solid fa-quote-right" style="color: #c29b40;"></i>
            </div>
        </div>
        <!-- <div class="readImage">
            <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
            <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
            <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
            <figure><img src="public/images/concierge/service_1.png" alt="placeholder"></figure>
        </div> -->
    </div>
<?php
} ?>
<div class="banner">
    <h1>Vos témoignages</h1>
    <p>Votre satisfaction est notre priorité absolue, c'est pourquoi nous attachons une grande importance à vos témoignages sur notre site.
        Vos retours d'expérience sont précieux pour nous, car ils nous permettent d'évaluer et d'améliorer continuellement nos services.
        Votre confiance et vos commentaires nous guident dans notre volonté constante de vous offrir une expérience exceptionnelle.
    </p>
</div>

<div class="filterList">
    <script>
        let filterList = document.querySelector(".filterList")
        filterList.appendChild(filterElement)
    </script>
</div>

<?php
if (count($getTestimonies) > 0) {

    foreach ($getTestimonies as $getTestimony) {
        testimony($getTestimony);
    }
} else {
?>
    <div class="superContainer">
        <p>Pas de témoignages pour le moment.</p>
    </div>
<?php
}
?>

<!-- <a href="#" class="blueGoldButton">Voir plus de témoignages</a> -->

<?php include "public/templates/component/footer.php" ?>