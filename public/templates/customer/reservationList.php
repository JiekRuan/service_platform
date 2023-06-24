<?php
if ($_SESSION["role"] !== "customer") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}

global $reservations;

?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/global.css">
<link rel="stylesheet" href="../public/css/reservationList.css">

<?php function reservationList($i)
{
?>
    <div class="superContainer">
        <div class="Container">
            <div>
                <h3><?= $i['name'] ?></h3>
                <p><?= $i['arrondissement'] ?>ème arrondissement</p>
            </div>
            <div class="reservationDateDesktop">
                <h4>Arrivée</h4>
                <p><?= date_format(new DateTime($i['start_time']), 'd/m/Y') ?></p>
            </div>
            <div class="reservationDateDesktop">
                <h4>Départ</h4>
                <p><?= date_format(new DateTime($i['end_time']), 'd/m/Y') ?></p>
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
                <img class="img-reservation" src="../public/images/salon.png" alt="image du logement">
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

<?php
foreach ($reservations as $reservation) {

    reservationList($reservation);
} ?>

<script src="../public/js/reservationList.js"></script>

<?php include "public/templates/component/footer.php" ?>