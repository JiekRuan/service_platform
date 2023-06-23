<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="public/css/homepage.css">
<main>
    <section>
        <!-- <article class="presentation">
            <h1>Créez des souvenirs de vacances inoubliables.</h1>
            <p>Profitez d'un séjour d'exception au cœur de nos somptueux appartements haut de gamme, nichés dans les quartiers les plus prestigieux de Paris.</p>

            <div class="homepageFormContainer">
                <form class="homepageSearch">
                    <input type="text" placeholder="Rechercher..." class="homepageSearchInput">
                    <input type="submit" value="Rechercher" class="blueButton homepageSearchButton">
                </form>
                <p class="homepageRoadmap">Besoin d'une roadmap personnalisé ?</p>
            </div>
        </article> -->

        <article class="presentation">
            <div class="zoom-background"></div>

            <h1>Créez des souvenirs de vacances inoubliables.</h1>
            <p>Profitez d'un séjour d'exception au cœur de nos somptueux appartements haut de gamme, nichés dans les quartiers les plus prestigieux de Paris.</p>

            <div class="homepageFormContainer">
                <form action="searchPage" method="GET" class="homepageSearch">
                    <input type="text" name="search" placeholder="Rechercher..." class="homepageSearchInput">
                    <input type="submit" value="Rechercher" class="blueButton homepageSearchButton">
                </form>
                <p class="homepageRoadmap">Besoin d'une roadmap personnalisée ?</p>
            </div>
        </article>


        <article class="homepageDiscover">
            <h2>Découvrez nos résidences luxueuses au cœur des quartiers les plus prisés</h2>
            <div class="homepageDiscoverParagraph">
                <p>Découvrez nos logements luxueux, chacun avec son caractère unique et son charme incomparable. Chaque résidence est soigneusement sélectionnée pour offrir une expérience de séjour exceptionnelle. Situés au cœur des quartiers les plus prestigieux de la ville, nos logements vous plongent dans un univers de raffinement et de confort.</p>
                <p>Pour parfaire votre expérience, nos logements sont idéalement situés à proximité des périmètres les plus prisés, où vous trouverez les meilleures boutiques de créateurs, les bars branchés et les restaurants luxueux. Plongez dans l'effervescence des quartiers tendance de la ville, explorez les boutiques de luxe où les dernières tendances prennent vie, et savourez des moments de détente dans les bars et restaurants renommés pour leur cuisine raffinée et leur atmosphère exclusive.</p>
                <p>Que vous soyez amateur de shopping, de vie nocturne animée ou de gastronomie d'exception, nos logements luxueux vous offrent un accès privilégié à tout ce que la ville a de meilleur à offrir. Laissez-vous séduire par l'élégance de nos logements et l'ambiance envoûtante des quartiers environnants, et vivez des moments inoubliables lors de votre séjour chez nous.</p>
            </div>
            <a href="#" class="homepageMoreInfo">En savoir plus</a>
        </article>

        <article class="homepageOurHome">
            <h2>Nos appartements</h2>

            <div class="homepageContainer">
                <figure class="figure figure-animation">
                    <div class="zoom-image">
                        <img src="../public/images/homepage/appart_6.jpg" alt="" class="image">
                    </div>
                    <figcaption class="imageText">Santa Monica</figcaption>
                    <figcaption class="imageText">XVIème arrondissement</figcaption>
                </figure>

                <figure class="figure figure-animation">
                    <div class="zoom-image">
                        <img src="../public/images/homepage/appart_7.jpg" alt="" class="image">
                    </div>
                    <figcaption class="imageText">Santa Dominica</figcaption>
                    <figcaption class="imageText">XVIIème arrondissement</figcaption>
                </figure>

                <figure class="figure figure-animation">
                    <div class="zoom-image">
                        <img src="../public/images/homepage/appart_8.jpg" alt="" class="image">
                    </div>
                    <figcaption class="imageText">Santa Colada</figcaption>
                    <figcaption class="imageText">XVIIème arrondissement</figcaption>
                </figure>
            </div>


            <a href=<?= "http://" . $domain . "/searchPage" ?> class="goldenButton">Découvrez nos logements</a>

        </article>

        <article class="homepageOurSelection">
            <h2>Une sélection de résidence d'exceptions</h2>
            <div class="homepageDiscoverParagraph">
                <p>Chaque maison de notre collection est une rencontre entre nos critères d'excellence et un véritable coup de cœur. Nos conseillers vous accompagnent avec une transparence totale pour trouver votre maison idéale, celle qui correspond parfaitement à vos envies.</p>
            </div>
            <a href=<?= "http://" . $domain . "/searchPage" ?> class="homepageInformation">Se renseigner sur notre catalogue</a>
            <img src="public/images/homepage/appart_4.jpg" alt="">
        </article>

        <article class="homepageOurHome homepageExperience">
            <h2>Une expérience mémorable</h2>
            <div class="homepageDiscoverParagraph">
                <p>Demandez votre roadmap personnalisé par notre équipe entièrement pensé pour vous. Surprenant, fascinant et complet, nous construisons votre circuit pour vous avec un art du détail incomparable, en s'inspirant de vos envies et de vos passions.</p>
            </div>
            <a href=<?= "http://" . $domain . "/contactUs" ?> class="homepageInformation">Contactez-nous pour votre roadmap</a>
            <div class="imageContainer">
                <figure class="figure-animation">
                    <img src="public/images/homepage/exp_1.jpg" alt="">
                    <div class="homepageExp">
                        <p>Restaurant Carotte</p>
                        <p class="homepageArrondissement">XVIIème arrondissement</p>
                    </div>
                </figure>
                <figure class="figure-animation">
                    <img src="public/images/homepage/exp_2.jpg" alt="">
                    <div class="homepageExp">
                        <p>Restaurant gastronomique</p>
                        <p class="homepageArrondissement">XVIIème arrondissement</p>
                    </div>

                </figure>
                <figure class="figure-animation">
                    <img src="public/images/homepage/exp_3.jpg" alt="">
                    <div class="homepageExp">
                        <p>Restaurant Jambon</p>
                        <p class="homepageArrondissement">XVIIème arrondissement</p>
                    </div>

                </figure>
                <figure class="figure-animation">
                    <img src="public/images/homepage/exp_4.jpg" alt="">
                    <div class="homepageExp">
                        <p>Restaurant Beurre</p>
                        <p class="homepageArrondissement">XVIIème arrondissement</p>
                    </div>
                </figure>
            </div>

        </article>

        <article class="homepageResearvationContainer">
            <div class="homepageReservation homepageReservationContent">
                <h2>Réservez votre logement dès maintenant</h2>
                <p>Profiter de vos vacances dans un cadre exceptionnel</p>
                <a href=<?= "http://" . $domain . "/searchPage" ?> class="goldenButton">Découvrez nos logements</a>
                <figure class="homepageReservationImage">
                    <img src="public/images/homepage/appart_5.jpg" alt="">
                </figure>
            </div>
        </article>

        <article class="homepageFooter">
            <div class="homepageSection">
                <i class="fa-solid fa-award fa-2xl"></i>
                <h4>L'art de la reception</h4>
                <p>Nous avons la plus haute satisfaction client de notre industrie</p>
            </div>
            <div class="homepageSection">
                <i class="far fa-clock fa-2xl"></i>
                <h4>Disponibilité 24h/24</h4>
                <p>Nos équipes locales sont disponibles à tout moment pendant votre séjour</p>
            </div>
            <div class="homepageSection">
                <i class="fa-solid fa-lock fa-2xl"></i>
                <h4>Confidentialité</h4>
                <p>Nous garantissons le respect de votre vie privé et de votre sécurité lors de votre séjour</p>
            </div>
            <div class="homepageSection">
                <i class="fa-regular fa-gem fa-2xl"></i>
                <h4>L'élégance</h4>
                <p>Notre application interne vous offrira l'expérience la plus raffiné possibles</p>
            </div>
        </article>

    </section>
</main>

<script src="public/js/homepageAnimation.js"></script>
<?php include 'public/templates/component/footer.php' ?>