<?php
if ($_SESSION["role"] !== "customer") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}

$serializedObject = $_SESSION['apartmentObject'];
$apartmentObject = unserialize($serializedObject);
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];

?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/confirmReservation.css">
<link rel="stylesheet" href="../public/css/picture.css">

<main>

    <div id="modal">
        <span class="close"><i class="fa-solid fa-xmark"></i></span>
        <img id="modalImage" src="" alt="Image en grand">
    </div>

    <div class="banner">
        <h1>Votre réservation</h1>
    </div>

    <form action="reservationThanks" method="POST" class="superContainer">

        <div style="text-align: center;">
            <h2><?= $apartmentObject->getName() ?></h2>
            <p><?= $apartmentObject->getArrondissement() ?>ème arrondissement</p>
        </div>

        <div class="subContainer">

            <figure class="containerImage">
                <img src="../public/images/troca.png" alt="appartement 4 pièces" class="clickable-image">
            </figure>

            <div class="galerie">
                <figure>
                    <img src="../public/images/sdb.png" alt="salle de bain" class="clickable-image">
                </figure>
                <figure>
                    <img src="../public/images/salon.png" alt="salon" class="clickable-image">
                </figure>
                <figure>
                    <img src="../public/images/cuisine.png" alt="cuisine" class="clickable-image">
                </figure>
            </div>

            <div>
                <h3>Description</h3>
                <hr>
                <p>
                    <?= $apartmentObject->getDescription() ?>
                </p>
            </div>

            <div>
                <h3>Caractéristiques</h3>
                <hr>
                <p><?= $apartmentObject->getSquareMeter() ?>m² | <?= $apartmentObject->getCapacity() ?> chambres | <?php
                                                                                                                    $numberBathroom = $apartmentObject->getNumberBathroom();
                                                                                                                    if ($numberBathroom == 1) {
                                                                                                                        echo $numberBathroom . " salle";
                                                                                                                    } else {
                                                                                                                        echo $numberBathroom . " salles";
                                                                                                                    }
                                                                                                                    ?> de bain</p>
            </div>

            <div>
                <h3>Agréments</h3>
                <hr>
                <p>Vue sur <?= $apartmentObject->getVueSur() ?> 
                    |
                    <?php if ($apartmentObject->getTerasse() === 'on') : ?>
                        Possède une terrasse
                        |
                    <?php endif; ?>
                    <?php if ($apartmentObject->getBalcon() === 'on') : ?>
                        Possède un balcon
                        |
                    <?php endif; ?>

                    Dans le quartier <?= $apartmentObject->getQuartier() ?></p>
            </div>

            <!-- <div>
                <h3>Particularité</h3>
                <hr>
                <p>Situé au 28e étage d'une résidence exclusive les appartements du chateau du Périgord ont été magnifiquement conçu dans un esprit de luxe et de douceur de vivre. En tant que summum du paysage architectural monégasque, les résidents bénéficient d'une vue panorama sur Monaco et son paysage azur méditeranéen qui s'étend à perte de vue.</p>
            </div> -->

            <div>
                <h3>Prix</h3>
                <hr>
                <h4 id="price">
                <?= $apartmentObject->getPrice() ?>€/jour
                </h4>
            </div>

            <div>
                <h3>Date</h3>
                <hr>
                <div class="confirmDate">
                    <input type="hidden" name="user_id" value=<?= $_SESSION['userId'] ?>>
                    <input type="hidden" name="apartment_id" value=<?= $apartmentObject->getId() ?>>
                    <input type="date" name="fromDate" id="fromDate" min="<?php echo date('Y-m-d'); ?>" value=<?= $fromDate ?> required>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <input type="date" name="toDate" id="toDate" min="<?php echo date('Y-m-d'); ?>" value=<?= $toDate ?> required>
                </div>
            </div>

            <div>
                <h3>Services</h3>
                <hr>
                <input type="text" placeholder="Appéritif à l'arrivé...">
                <p class="nb">
                    Notez que des services supplémentaires engendreront des frais supplémentaires. Contactez-nous pour plus d'informations.
                </p>
            </div>

            <div class="total">
                <h3>Total</h3>
                <hr>
                <h4 id="totalPrice">
                    560€
                </h4>
            </div>

        </div>

        <div class="confirmButton">
            <a href=<?= "http://" . $domain . "/logement?id=" . $apartmentObject->getId() ?> class="blueButton">Retour</a>
            <input type="submit" value="Confimer votre réservation" class="goldenButton">
        </div>

    </form>

</main>
<script src="../public/js/confirmDate.js"></script>
<script src="../public/js/picture.js"></script>
<?php include 'public/templates/component/footer.php' ?>