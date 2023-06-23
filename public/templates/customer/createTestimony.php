<?php
if ($_SESSION["role"] !== "customer") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="public/css/avis.css">


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
        <h1>VOTRE EXPERIENCE</h1>

        <form class="infoForm">
            <div class="row">
                <input name="name" type="text" class="inputText" placeholder="Note" required>
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
                <a href="#" class="blueButton">Fermer</a>
                <input type="submit" class="goldenButton" value="Envoyer">
            </div>
            
        </form>
    </div>

</div>

<script>
    let userContainer = document.querySelector('.superContainer');
</script>
<script src="public/js/addPhoto.js"></script>

<?php include "public/templates/component/footer.php" ?>