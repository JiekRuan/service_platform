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

<main class="thanksTestimony">
    <h1>Merci d'avoir réservé chez nous</h1>

    <p>
        Nous tenons à vous exprimer notre sincère gratitude d'avoir choisi notre site pour réserver votre séjour luxueux. Nous sommes enchantés de vous accueillir et nous mettons tout en œuvre pour que votre expérience soit absolument exceptionnelle.
    </p>

    <p>
        Au sein de notre établissement, nous nous engageons à offrir des prestations de qualité supérieure, empreintes d'élégance et de raffinement. Chaque détail a été soigneusement pensé pour vous garantir un séjour mémorable, où le luxe sera omniprésent à chaque instant.
    </p>

    <p>
        Notre équipe dévouée est à votre entière disposition pour répondre à vos besoins et satisfaire vos attentes les plus exigeantes. Du service personnalisé à l'attention portée aux moindres détails, nous ferons tout notre possible pour créer une atmosphère empreinte de confort et d'exclusivité.
    </p>

    <p>
        Que ce soit pour vous offrir des expériences culinaires d'exception, des moments de détente et de bien-être dans notre spa ou encore pour vous conseiller sur les activités et découvertes à ne pas manquer, notre personnel attentif sera à vos côtés pour faire de votre séjour une véritable expérience inoubliable.
    </p>

    <p>Nous tenons à vous remercier à nouveau de votre confiance et nous sommes impatients de vous accueillir prochainement dans notre établissement. Nous mettons tout en œuvre pour que votre séjour soit une expérience unique, où le luxe se mêle à l'excellence pour vous offrir des souvenirs impérissables.</p>
    <div>
        <p>
            Au plaisir de vous recevoir,
        </p>
        <p>
            Elysians Paris.
        </p>
    </div>

    <p class="thanksClose">
        <a href=<?= "http://" . $domain . "/user/reservationList" ?> class="goldenButton">Fermer</a>
    </p>

</main>

<?php include 'public/templates/component/footer.php' ?>