<?php include '../componant/header.html' ?>
<link rel="stylesheet" href="../../css/searchPage.css">
<link rel="stylesheet" href="../../css/logement.css">


<main>
    <div class="banner">
        <form action="" method="GET" class="formSearch">
            <div class="date">
                <div class="dateInput">
                    <label for="fromDate">De : </label>
                    <input type="date" name="fromDate" id="fromDate" min="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="dateInput">
                    <label for="toDate">Jusqu'à : </label>
                    <input type="date" name="toDate" id="toDate" min="<?php echo date('Y-m-d'); ?>">
                </div>
                <input type="submit" value="Réserver" class="goldenButton">
            </div>
        </form>
    </div>


    <section class="container">
        <h1>Appartement exceptionnel 4 pièces au Trocadéro</h1>

        <article class="containerContent">
            <h2>Description</h2>
            <p class="info">300m2 | 5 chambres | 4 salles de bain</p>

            <figure class="containerImage">
                <img src="../../images/troca.png" alt="appartement 4 pièces">
            </figure>

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


    <section class="">
        <article class="gallery">
            <h2>Galerie du lieu de résidence</h2>

            <div class="galerie">
                <figure>
                    <img src="../../images/sdb.png" alt="salle de bain">
                </figure>
                <figure>
                    <img src="../../images/salon.png" alt="salon">
                </figure>
                <figure>
                    <img src="../../images/cuisine.png" alt="cuisine">
                </figure>
            </div>
        </article>
    </section>

    <section>
        <article class="further">
            <h2>Prix</h2>
            <h4>560€/par jour</h4>
            <p>Notre tarif de base vous donne accès à une multitude d'avantages et de prestations haut de gamme qui rendront votre séjour des plus agréables.</p>
            <p>De plus, nous comprenons que chaque voyageur a des besoins et des préférences différents. C'est pourquoi nous sommes flexibles et prêts à vous fournir des renseignements supplémentaires sur les tarifs et à adapter nos offres en fonction de vos exigences spécifiques. Que vous souhaitiez bénéficier de services supplémentaires, prolonger votre séjour ou obtenir des tarifs pour un groupe, notre équipe est là pour vous accompagner et vous fournir toutes les informations nécessaires.</p>
            <p>Contactez-nous dès maintenant pour discuter de vos besoins et obtenir un devis personnalisé. Nous sommes impatients de vous aider à planifier votre séjour de luxe sur mesure et de vous offrir une expérience inoubliable.</p>
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
                    <img src="../../images/agence.png" alt="">
                </figure>
            </div>
        </article>
    </section>

</main>

<script src="../../js/app.js"></script>
<?php include '../componant/footer.html' ?>