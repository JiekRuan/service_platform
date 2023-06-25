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
<link rel="stylesheet" href="../public/css/avis.css">


<div class="banner">
    <h1>Merci de nous avoir fait confiance </h1>
        <h1>Exprimez votre expérience </h1>
    
        <p>Nous vous remercions d'avoir choisi notre établissement pour vos vacances de luxe. Votre satisfaction est notre priorité absolue. 
        Si vous le souhaitez, nous vous invitons chaleureusement à partager votre expérience en laissant un témoignage. 
        Votre retour est précieux et nous aide à améliorer continuellement nos services et guide d'autres voyageurs dans leur choix. 
        Nous sommes impatients de lire vos impressions et de vous accueillir à nouveau dans un futur proche.</p>
</div>

<div class="superContainer">
    <div class="Container">
        <h1>VOTRE EXPÉRIENCE</h1>
        <form class="infoForm" method="POST" action=<?= "http://" . $domain . "/user/sendCreateTestimony" ?>>
            <div class="row">
                <input name="content" type="text" class="inputText" placeholder="J'ai passé un séjour incroyable dans l'appartement..." required>
            </div>
            
            <div class="userInfo">
                <h3>Photos</h3>

                <div id="publication_image">

                </div>

                <label id="custom-img-btn" class="addPhoto blueGoldButton">
                    <i class="fa-solid fa-camera"></i>
                    <p>Ajouter des images</p>
                </label>

            </div>

            <div class="buttonAvis">
                <a href=<?= "http://" . $domain . "/user/reservationList" ?> class="blueButton">Retour</a>
                <input type="hidden" name="reservation_id" value=<?= $_POST['reservation_id'] ?>>
                <input type="hidden" name="user_id" value=<?= $_SESSION['userId'] ?>>
                <input type="submit" class="goldenButton" value="Envoyer">
            </div>
            
        </form>
    </div>

</div>

<script>
    let userContainer = document.querySelector('.superContainer');
</script>
<script src="../public/js/addPhoto.js"></script>

<?php include "public/templates/component/footer.php" ?>