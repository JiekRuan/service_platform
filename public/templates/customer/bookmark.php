<?php
if ($_SESSION["role"] !== "customer") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}
global $bookmarks;
// echo var_dump($bookmarks);
?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/admin.css">
<link rel="stylesheet" href="../public/css/bookmark.css">
<script src="../public/js/filter.js"></script>

<?php

function adminUserTemplate($i)
{
    global $domain;
?>
    <div class="user">
        <div class="bookmarkName">
            <div>
                <h2><a href=<?= "http://" . $domain . "/logement?id=" . $i['id'] ?>><?= $i['name'] ?></a></h2>
                <p><a href=<?= "http://" . $domain . "/logement?id=" . $i['id'] ?>><?= $i['arrondissement'] ?> arrondissement</a></p>
            </div>
            <form action=<?= "http://" . $domain . "/user/bookmarkAddDelete" ?> method="POST" id=<?= $i['id'] ?> onclick="submitReservationForm('<?= $i['id'] ?>')">
                <input type="hidden" name="apartmentId" value=<?= $i['id'] ?>>
                <input type="hidden" name="REQUEST_URI" value=<?= $_SERVER['REQUEST_URI'] ?>>
                <input type="hidden" name="userId" value=<?= $_SESSION['userId'] ?>>
                <i class="fa-solid fa-bookmark"></i>
            </form>
        </div>
        <div class="bookmarkList">
            <div class="userForm">
                <figure><a href=<?= "http://" . $domain . "/logement?id=" . $i['id'] ?>><img src="../public/images/paris.jpeg" alt="image du logement"></a></figure>
            </div>
            <div class="userInfo">
                <p>Description</p>
                <p><?= $i['description'] ?></p>
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
        foreach ($bookmarks as $bookmark) {
            adminUserTemplate($bookmark);
        }
        ?>

    </div>

</main>

<script>
    function submitReservationForm(formId) {
        document.getElementById(formId).submit();
    }
</script>
<script src="../public/js/optionSelect.js"></script>
<?php include 'public/templates/component/footer.php' ?>