<?php
if ($_SESSION["role"] !== "customer" || $_SESSION["role"] !== "logistic" || $_SESSION["role"] !== "management" || $_SESSION["role"] !== "admin") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
?>


<?php include 'public/templates/component/header.php' ?>

<main class="containerDisable">
    <h1>Votre comptre est actuellement désactivé</h1>

    <p>Contacter l'administrateur pour réactiver votre compte</p>

</main>

<?php include 'public/templates/component/footer.php' ?>