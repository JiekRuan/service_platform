<?php include '../componant/header.html' ?>
<link rel="stylesheet" href="../../css/confirmReservation.css">
<link rel="stylesheet" href="../../css/picture.css">

<main>

    <div id="modal">
        <span class="close"><i class="fa-solid fa-xmark"></i></span>
        <img id="modalImage" src="" alt="Image en grand">
    </div>

    <div class="banner">
        <h1>Votre réservation</h1>
    </div>

    <form action="" class="superContainer">

        <div>
            <h2>Nom du logement</h2>
            <p>XVIIème arrondissement</p>
        </div>

        <div class="subContainer">

            <figure class="containerImage">
                <img src="../../images/troca.png" alt="appartement 4 pièces" class="clickable-image">
            </figure>

            <div class="galerie">
                <figure>
                    <img src="../../images/sdb.png" alt="salle de bain" class="clickable-image">
                </figure>
                <figure>
                    <img src="../../images/salon.png" alt="salon" class="clickable-image">
                </figure>
                <figure>
                    <img src="../../images/cuisine.png" alt="cuisine" class="clickable-image">
                </figure>
            </div>

            <div>
                <h3>Description</h3>
                <hr>
                <p>
                    Cette superbe proriété de quatre chambres est l'expression ultime de l'architecture contemporaine, offrant à ses résidents un décor inpeccable dans une palette de couleurs élégantes pour créer une atmosphère luxieuse et rayonante.

                    La propriété comprend une cuisine ultra moderne et trois grands espaces de vie avec des baies vitrées, permettant à la lumière naturelle d'inondée l'espace.

                    Les équipements du batiment sont conçus pour une expérience clé en main, offrant au résident un parking privé, une cave, une conciergerie, une sécurité 24h/24 et une piscine olympique. De plus, la terrasse vous offrira un cadre sublime pour vous imprénier du paysage et d'un soleil radieux.
                </p>
            </div>

            <div>
                <h3>Caractéristiques</h3>
                <hr>
                <p>300m² | 5 chambres | 4 salles de bain</p>
            </div>

            <div>
                <h3>Agréments</h3>
                <hr>
                <p>Vue sur la mer | Terasse |Jacuzzi</p>
            </div>

            <div>
                <h3>Particularité</h3>
                <hr>
                <p>Situé au 28e étage d'une résidence exclusive les appartements du chateau du Périgord ont été magnifiquement conçu dans un esprit de luxe et de douceur de vivre. En tant que summum du paysage architectural monégasque, les résidents bénéficient d'une vue panorama sur Monaco et son paysage azur méditeranéen qui s'étend à perte de vue.</p>
            </div>

            <div>
                <h3>Prix</h3>
                <hr>
                <h4 id="price">
                    560€/jour
                </h4>
            </div>

            <div>
                <h3>Date</h3>
                <hr>
                <div class="confirmDate">
                    <input type="date" name="fromDate" id="fromDate" min="<?php echo date('Y-m-d'); ?>" required>
                    <i class="fa-solid fa-arrow-right-long"></i>
                    <input type="date" name="toDate" id="toDate" min="<?php echo date('Y-m-d'); ?>" required>
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
            <a href="#" class="blueButton">Retour</a>
            <input type="submit" value="Confimer votre réservation" class="goldenButton">
        </div>

    </form>

</main>
<script src="../../js/confirmDate.js"></script>
<script src="../../js/picture.js"></script>
<?php include '../componant/footer.html' ?>