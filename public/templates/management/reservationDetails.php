<?php include "../componant/header.html" ?>
<link rel="stylesheet" href="../../css/global.css">
<link rel="stylesheet" href="../../css/reservationDetails.css">

<?php function reservation()
{ ?>
    <div class="superContainer">
        <div class="Container">
            <h3>#id_reservation</h3>

            <div class="infoReservation">
                <div class="detailClient">
                    <p>Client id : #XXXXXX</p>
                    <p>Location id : #XXXXXX</p>
                </div>
                <div class="detailDate">
                    <p>Arrivée : XX/XX/XXXX</p>
                    <p>Départ : XX/XX/XXXX</p>
                </div>

            </div>
        </div>
    </div>
    </div>
<?php
} ?>

<div class="banner">
    <h1>Réservations des clients</h1>
</div>

<?php for ($i = 0; $i < 10; $i++) {
        reservation();
} ?>
