<?php
if ($_SESSION["role"] !== "management") {
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
<link rel="stylesheet" href="../public/css/reservationDetails.css">


<?php function reservation($i)
{
    global $domain;
?>
    <div class="superContainer">
        <div class="Container">
            <h3>Réservation #<?= $i['id'] ?></h3>

            <div class="infoReservation">
                <div class="detailClient">
                    <p>Client #<?= $i['user_id'] ?> : <?= $i['customer'] ?></p>
                </div>
                <div class="detailClient">
                    <p>Location #<?= $i['apartment_id'] ?> : <?= $i['name'] ?>
                </div>
                <div class="detailDate">
                    <p>Arrivée : <?= date_format(new DateTime($i['start_time']), 'd/m/Y') ?></p>
                    <p>Départ : <?= date_format(new DateTime($i['end_time']), 'd/m/Y') ?></p>
                </div>
            </div>
        </div>
        <p class="blueGoldButton">Envoyer un message</p>
        <p class="goldenButton cancelReservation">Annuler la réservation</p>
        <div class="cancelReservationConfirm">
            <p>Êtes-vous sûr(e) de vouloir annuler la réservation ?</p>
            <div class="readDeleteMenuButton">
                <div class="userForm">
                    <p class="blueButton cancelDesactivate">Annuler</p>
                </div>
                <form action=<?= "http://" . $domain . "/reservation/delReservation" ?> method="POST">
                    <input type="hidden" name="id" value=<?= $i['id'] ?>>
                    <input type="submit" value="Confirmer" class="goldenButton">
                </form>
            </div>
        </div>
    </div>

<?php
} ?>

<div class="banner">
    <h1>Réservations clients</h1>
</div>

<?php
if (count($reservations) > 0) {
    foreach ($reservations as $reservation) {
        reservation($reservation);
    }
} else { ?>
    <div class="superContainer">
        <p>Aucune réservation n'a été faite pour le moment.</p>
    </div>
<?php

} ?>

</body>

<script>
    let cancelReservation = document.querySelectorAll('.cancelReservation');
    let cancelReservationConfirm = document.querySelectorAll('.cancelReservationConfirm');

    cancelReservation.forEach(function(element, index) {
        toggleMenu(element, cancelReservationConfirm[index]);
    });

    let cancel = document.querySelectorAll('.cancelDesactivate');

    cancel.forEach(function(element, index) {
        element.addEventListener('click', () => {
            cancelReservationConfirm[index].style.display = "none";
        });
    });
</script>

</html>