<?php include 'public/templates/componant/header.php' ?>
<link rel="stylesheet" href="public/css/admin.css">
<link rel="stylesheet" href="public/css/bookmark.css">
<script src="public/js/filter.js"></script>

<?php

function adminUserTemplate($i)
{
?>
<div class="user">
<div class="bookmarkName">
    <div>
        <h2>#nomdulogement_<?= $i ?> blabla</h2>
        <p>XVII arrondissement</p>
    </div>
    <i class="fa-regular fa-bookmark"></i>
</div>
    <div class="bookmarkList">
        <div class="userForm">
            <figure><img src="public/images/concierge/service_1.png" alt=""></figure>
        </div>
        <div class="userInfo">
            <p>Description</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit consequuntur adipisci ex unde architecto explicabo eum nisi repellendus non vitae, animi voluptatibus error ratione reprehenderit, numquam illum. Harum, ea eum!</p>
        </div>
    </div>
</div>
<?php
}
?>

<main>
    <div class="banner">
        <h1>Vos favoris</h1>
        <p>Dans cet espace dédié à vos préférences les plus raffinées, chaque choix est une invitation à l'exclusivité. Des pièces sélectionnées avec minutie, des trésors qui éblouissent les yeux et ravissent les sens. Découvrez ici une collection de favoris, témoignage d'un art de vivre singulier, où chaque objet chéri incarne le sommet de l'élégance.</p>
    </div>

    <div class="userContainer">

        <?php
        for ($i = 0; $i < 5; $i++) {
            adminUserTemplate($i);
        }
        ?>

    </div>

</main>


<script src="public/js/optionSelect.js"></script>
<?php include 'public/templates/componant/footer.html' ?>