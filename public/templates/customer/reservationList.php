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
// echo var_dump($reservations);


?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/global.css">
<link rel="stylesheet" href="../public/css/reservationList.css">

<?php function reservationList($i)
{
    global $domain;
    global $getTestimonies;
    global $photos;
    // echo var_dump($getTestimonies);


    $currentDate = new DateTime(); // Date actuelle
    $startDateTime = DateTime::createFromFormat('Y-m-d', $i['start_time']); // Convertir en objet DateTime
    $endDateTime = DateTime::createFromFormat('Y-m-d', $i['end_time']); // Convertir en objet DateTime

?>
    <div class="superContainer">
        <div class="Container">
            <form action="reservation" method="POST" id="<?= $i['id'] ?>" onclick="submitReservationForm('<?= $i['id'] ?>')">
                <input type="hidden" name="reservation_id" value=<?= $i['id'] ?>>
                <input type="hidden" name="apartment_id" value=<?= $i['apartment_id'] ?>>
                <h3><?= $i['name'] ?></h3>
                <p><?= $i['arrondissement'] ?>ème arrondissement</p>
            </form>
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
                    <p><?= date_format(new DateTime($i['start_time']), 'd/m/Y') ?></p>
                </div>
                <div class="reservationDate">
                    <h4>Départ</h4>
                    <p><?= date_format(new DateTime($i['end_time']), 'd/m/Y') ?></p>
                </div>
            </div>
            <?php
            if ($currentDate > $endDateTime) {
            ?>
                <div class="dateReservationContainer">
                    <p>Passé</p>
                    <span class="dateReservation inComing"></span>
                </div>
                <?php
                if (count($getTestimonies) > 0) {
                    $hasTestimony = false;
                    foreach ($getTestimonies as $getTestimony) {
                        if ($getTestimony['reservation_id'] == $i['id']) {
                            $hasTestimony = true;
                            break; // Sortir de la boucle si un témoignage est trouvé
                        }
                    }

                    if ($hasTestimony) {
                ?>
                        <p>Merci pour votre témoignage !</p>
                    <?php
                    } else {
                    ?>
                        <form action="http://<?= $domain ?>/user/createTestimony" method="POST">
                            <input type="hidden" name="reservation_id" value="<?= $i['id'] ?>">
                            <input type="submit" class="goldenButton" value="Raconter votre expérience">
                        </form>
                    <?php
                    }
                } else {
                    ?>
                    <form action="http://<?= $domain ?>/user/createTestimony" method="POST">
                        <input type="hidden" name="reservation_id" value="<?= $i['id'] ?>">
                        <input type="submit" class="goldenButton" value="Raconter votre expérience">
                    </form>
                <?php
                }
            } elseif ($currentDate >= $startDateTime && $currentDate <= $endDateTime) { ?>
                <div class="dateReservationContainer">
                    <p>En cours</p><span class="dateReservation atTheMoment"></span>
                </div>
            <?php
            } elseif ($currentDate < $startDateTime) { ?>
                <div class="dateReservationContainer">
                    <p>À venir</p><span class="dateReservation passed"></span>
                </div>
                <p class="goldenButton cancelReservation">Annuler la réservation</p>
            <?php
            }
            ?>
            <div class="cancelReservationConfirm">
                <p>Êtes-vous sûr(e) de vouloir annuler la réservation ?</p>
                <div class="readDeleteMenuButton">
                    <div class="userForm">
                        <p class="blueButton cancelDesactivate">Annuler</p>
                    </div>
                    <form action=<?= "http://" . $domain . "/reservation/reservationCancel" ?> method="POST">
                        <input type="hidden" name="id" value=<?= $i['id'] ?>>
                        <input type="submit" value="Confirmer" class="goldenButton">
                    </form>
                </div>
            </div>
            <?php
            $firstPhotoDisplayed = false;

            foreach ($photos as $photo) {
                if ($photo['apartment_id'] == $i['apartment_id'] && !$firstPhotoDisplayed) {
                    $firstPhotoDisplayed = true;
            ?>
                    <!-- <a href=<?= "http://" . $domain . "/logement?id=" . $i['apartment_id'] ?>> -->
                    <img src="data:image/jpeg;base64,<?= $photo['photo']; ?>" alt="logement à Paris <?= $i['apartment_id'] ?>" />
                    <!-- </a> -->
            <?php
                }
            }
            ?>
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
if (count($reservations) > 0) {
    foreach ($reservations as $reservation) {

        reservationList($reservation);
    }
} else { ?>
    <div class="superContainer">
        <p>Vous n'avez pas fait de réservation pour le moment.</p>
    </div>
<?php

} ?>

<script src="../public/js/reservationList.js"></script>
<script>
    function submitReservationForm(formId) {
        document.getElementById(formId).submit();
    }
</script>
<style>
    form {
        cursor: pointer;
    }
</style>
<?php include "public/templates/component/footer.php" ?>