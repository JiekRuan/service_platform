<?php include "../componant/header.html" ?>
<link rel="stylesheet" href="../../css/global.css">
<link rel="stylesheet" href="../../css/reservationList.css">

<?php function reservationList()
{
?>
    <div class="superContainer">
        <div class="Container">
            <div>
                <h3>Nom de logement</h3>
                <p>dans le 4è arrondissement</p>
            </div>
            <div class="reservationDateDesktop">
                <h4>Arrivée</h4>
                <p>XX/XX/XXXX</p>
            </div>
            <div class="reservationDateDesktop">
                <h4>Départ</h4>
                <p>XX/XX/XXXX</p>
            </div>
            <div>
                <i class="fa-solid fa-chevron-down fa-2xl arrow"></i>
            </div>

        </div>
        <div class="unroll">
            <div class="reservationDateMobile">
                <div class="reservationDate">
                    <h4>Arrivée</h4>
                    <p>XX/XX/XXXX</p>
                </div>
                <div class="reservationDate">
                    <h4>Départ</h4>
                    <p>XX/XX/XXXX</p>
                </div>
            </div>

            <p class="goldenButton cancelReservation">Annuler la réservation</p>
            <div class="cancelReservationConfirm">
                <p>Êtes-vous sûr(e) de vouloir désactiver ce compte ?</p>
                <div class="readDeleteMenuButton">
                    <div class="userForm">
                        <p class="blueButton cancelDesactivate">Annuler</p>
                    </div>
                    <form action="" method="POST"><input type="submit" value="Désactiver" class="goldenButton"></form>
                </div>
            </div>
            <figure>
                <img class="img-reservation" src="../../images/salon.png" alt="image du logement">
            </figure>
        </div>
    </div>
<?php
} ?>

<div class="banner">
    <h1>Vos réservations</h1>
    <p>
        Bienvenue sur notre page de réservation exclusive, où vous pouvez accéder en toute simplicité à l'ensemble de vos réservations.
        Profitez de notre interface conviviale pour consulter, gérer et organiser vos séjours dans notre hôtel de luxe.
        Avec notre engagement envers le service personnalisé, votre satisfaction est notre priorité absolue.
        Réservez dès maintenant et laissez-nous créer des souvenirs inoubliables pour vous et vos proches.
    </p>
</div>

<?php for ($i = 0; $i < 10; $i++) {
    reservationList();
} ?>

<script src="../../js/reservationList.js"></script>

<?php include "../componant/footer.html" ?>