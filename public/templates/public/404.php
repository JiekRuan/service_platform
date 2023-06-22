<?php include 'public/templates/component/header.php' ?>

<main class="container404">
    <h1>Erreur 404</h1>
    <h3>La page que vous recherchez semble introuvable.</h3>

    <p>Voici quelques liens utiles à la place :</p>
    <ul>
        <li><a href=<?= "http://" . $domain . "/home" ?>>Page d'accueil</a></li>
    </ul>
</main>

<?php include 'public/templates/component/footer.php' ?>