<?php
if ($_SESSION["role"] !== "customer") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}
?>


<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="public/css/searchPage.css">
<link rel="stylesheet" href="public/css/logement.css">
<link rel="stylesheet" href="public/css/reservation.css">
<link rel="stylesheet" href="public/css/picture.css">


<main>

    <div id="modal">
        <span class="close"><i class="fa-solid fa-xmark"></i></span>
        <img id="modalImage" src="" alt="Image en grand">
    </div>

    <div class="banner">
        <h1>Votre réservation</h1>
        <p>Bonjour [nom d'utilisateur], nous avons le plaisir de vous accueillir chez nous. Voici le détail concernant votre réservation au sein de notre établissement.</p>
    </div>

    <section class="container">
        <h1>Appartement exceptionnel 4 pièces au Trocadéro</h1>

        <article class="containerContent">
            <div class="descriptionBookmark">
                <h2>Description</h2>
                <i class="fa-regular fa-bookmark"></i>
            </div>
            <p class="info">300m2 | 5 chambres | 4 salles de bain</p>

            <figure class="containerImage">
                <img src="public/images/troca.png" alt="appartement 4 pièces" class="clickable-image">
            </figure>

            <section class="galleryContainer">
                <article class="gallery">

                    <div class="galerie">
                        <figure>
                            <img src="public/images/sdb.png" alt="salle de bain" class="clickable-image">
                        </figure>
                        <figure>
                            <img src="public/images/salon.png" alt="salon" class="clickable-image">
                        </figure>
                        <figure>
                            <img src="public/images/cuisine.png" alt="cuisine" class="clickable-image">
                        </figure>
                    </div>
                </article>
            </section>

            <div class="text-describe">
                <p>Cette superbe proriété de quatre chambres est l’expression ultime de l’architecture contemporaine, offrant à ses résidents un décor inpeccable dans une palette de couleurs élégantes pour créer une atmosphère luxieuse et rayonante.</p>
                <p>La propriété comprend une cuisine ultra moderne et trois grands espaces de vie avec des baies vitrées, permettant à la lumière naturelle d’inondée l’espace. </p>
                <p>Les équipements du batiment sont conçus pour une expérience clé en main, offrant au résident un parking privé, une cave, une conciergerie, une sécurité 24h/24 et une piscine olympique. De plus, la terrasse vous offrira un cadre sublime pour vous imprénier du paysage et d’un soleil radieux.</p>
            </div>
        </article>
    </section>

    <section>
        <article class="features">
            <div class="caracteristic">
                <h2>Caractéristiques</h2>
                <hr>
                <p>100m2</p>
                <hr>
                <p>1 jacuzzi</p>
                <hr>
                <p>5 chambres</p>
                <hr>
            </div>
            <div class="caracteristic">
                <h2>Agréments</h2>
                <hr>
                <p>Vue sur la mer</p>
                <hr>
                <p>terrasse</p>
                <hr>
            </div>
            <div class="caracteristic">
                <h2>Particularités</h2>
                <hr>
                <p class="carac-text">Situé au 28e étage d'une résidence exclusive les appartements du chateau du Périgord ont été magnifiquement conçu dans un esprit de luxe et de douceur de vivre. En tant que summum du paysage architectural monégasque, les résidents bénéficient d’une vue panorama sur Monaco et son paysage azur méditeranéen qui s’étend à perte de vue.</p>
            </div>
        </article>
    </section>

    <section>
        <article class="further">
            <h2>Vos services</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam maiores corporis quaerat aspernatur aut ducimus, nemo iste autem eum, pariatur sint nam necessitatibus iure deleniti. Voluptate est aspernatur quam adipisci.</p>

            <div class="updateService">
                <p class="blueButton" id="editButton">Modifier vos services</p>
                <p class="nb">Notez que des services supplémentaires engendreront des frais supplémentaires. Contactez-nous pour plus d'informations.</p>
            </div>
        </article>
    </section>


    <section>
        <article class="further">
            <h2>Renseignement</h2>
            <div class="logementInfo">
                <div class="logementMoreInfo">
                    <p>Pour toute information complémentaire nous restons à votre entière disposition et serons ravis de pouvoir vous aider. Le service client est disponible 24h/24 toute la semaine via téléphone, whatsapp, email ou en agence.</p>

                    <article class="further-footer">
                        <div>
                            <h4>Téléphone</h4>
                            <hr>
                            <p>+33 6 59 38 53 35</p>
                        </div>
                        <div>
                            <h4>E-mail</h4>
                            <hr>
                            <p>elysians_paris@hotmail.com</p>
                        </div>
                        <div>
                            <h4>Agence</h4>
                            <hr>
                            <p>27 bis rue du Progrès, Paris 75016</p>
                        </div>
                    </article>
                </div>
                <figure class="logementInfoImage">
                    <img src="public/images/agence.png" alt="">
                </figure>
            </div>
        </article>
    </section>

    <p class="goldenButton" id="cancel">Annuler la réservation</p>

    <div id="cancelReservation">
        <p>Êtes-vous sûr(e) de vouloir annuler cette réservation ?</p>
        <div id="readDeleteMenuButton">
            <div class="userForm">
                <p class="blueButton cancelDesactivate">Retour</p>
            </div>
            <form action="" method="POST"><input type="submit" value="Confirmer" class="goldenButton"></form>
        </div>
    </div>

</main>

<script src="public/js/reservation.js"></script>
<script src="public/js/picture.js"></script>

<?php include 'public/templates/component/footer.php' ?>