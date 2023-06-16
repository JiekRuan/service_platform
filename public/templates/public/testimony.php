<?php include "../componant/header.html" ?>
<link rel="stylesheet" href="../../css/global.css">
<link rel="stylesheet" href="../../css/testimony.css">
<script src="../../js/filter.js"></script>

<?php
$value1 = 15;
$value2 = 4;

$filters = [
    ['text' => 'Témoignages', 'number' => $value1],
    ['text' => 'Mes témoignages', 'number' => $value2],

];
?>

<script>
    var filters = <?php echo json_encode($filters); ?>;
    var filterElement = createFilter(filters);
</script>

<?php function testimony()
{ ?>
    <div class="superContainer">
        <div class="Container">
            <div class="infoLogement">
                <h3>Nom du logement</h3>
                <p>dans le 4ème arrondissement</p>
            </div>
            <div class="infoTemoignage">
                <i class="fa-solid fa-quote-left" style="color: #c29b40;"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vestibulum purus nec felis consequat mattis.
                    Nam varius felis nec massa efficitur consequat. Aenean vel justo sed mi maximus suscipit nec gravida dui. Vivamus non finibus orci.
                    Sed laoreet est odio, a imperdiet felis volutpat sed. Donec sagittis a mi et pellentesque. Vestibulum et libero est. Fusce cursus massa
                    eu risus accumsan, a porta eros rutrum. Integer consequat dictum finibus. Maecenas eget bibendum orci. Morbi eget commodo leo.
                </p>
            </div>
            <div class="infoNomTemoignage">
                <p>De Jaqueline, il y a 5 jours</p>
                <i class="fa-solid fa-quote-right" style="color: #c29b40;"></i>
            </div>
        </div>
        <div class="readImage">
            <figure><img src="../../images/concierge/service_1.png" alt="placeholder"></figure>
            <figure><img src="../../images/concierge/service_1.png" alt="placeholder"></figure>
            <figure><img src="../../images/concierge/service_1.png" alt="placeholder"></figure>
            <figure><img src="../../images/concierge/service_1.png" alt="placeholder"></figure>
        </div>
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
<?php for ($i = 0; $i < 5; $i++) {
    testimony();
} ?>

<a href="#" class="blueGoldButton">Voir plus de témoignages</a>

<?php include "../componant/footer.html" ?>