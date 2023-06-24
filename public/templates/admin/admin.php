<?php
if ($_SESSION["role"] !== "admin") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
?>

<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/admin.css">
<script src="../public/js/filter.js"></script>

<?php

function countUsersByRole($users, $role)
{
    $count = 0;
    if (is_object($users)) {
        foreach ($users as $user) {
            if ($user->getRole() === $role) {
                $count++;
            }
        }
    } else if (is_array($users)) {

        foreach ($users as $user) {
            if ($user['role'] === $role) {
                $count++;
            }
        }
    }
    return $count;
}

global $users;
$total = count($users);
$value1 = countUsersByRole($users, 'admin');
$value2 = countUsersByRole($users, 'customer');
$value3 = countUsersByRole($users, 'management');
$value4 = countUsersByRole($users, 'logistic');

$filters = [
    ['text' => 'Tous', 'number' => $total],
    ['text' => 'Admin', 'number' => $value1],
    ['text' => 'Client', 'number' => $value2],
    ['text' => 'Gestion', 'number' => $value3],
    ['text' => 'Logistique', 'number' => $value4]
];


?>

<script>
    var filters = <?php echo json_encode($filters); ?>;
    var filterElement = createFilter(filters);
</script>

<?php

function adminUserTemplate($i)
{
    if (is_object($i)) {
        $role = $i->getRole();
        $status = $i->getStatus();
    } else if (is_array($i)) {
        $role = $i['role'];
        $status = $i['status'];
    }


    if ($role === 'customer') {
        $roleText = 'Client';
    } elseif ($role === 'logistic') {
        $roleText = 'Logistique';
    } elseif ($role === 'admin') {
        $roleText = 'Admin';
    } elseif ($role === 'management') {
        $roleText = 'Gestion';
    } else {
        $roleText = $role;
    }

    if ($status === 'active') {
        $statusText = 'Actif';
    } else if ($status === 'desactivate') {
        $statusText = 'Désactivé';
    }

    if (is_object($i)) {

?>
        <div class="user">
            <div class="userInfo">
                <p>ID : <?= $i->getId() ?></p>
                <p><?= $i->getName() ?></p>
                <p><?= $i->getMail() ?></p>
                <!-- <p>Prénom</p> -->
                <div class="statusRole">
                    <p>Statut : <?= $statusText ?></p>
                    <p>Rôle : <?= $roleText ?></p>
                </div>
                <!-- <p>Date de création : 02/12/2020</p> -->
            </div>
            <div class="userForm">
                <form action="user/updateRole" method="POST" class="form myForm">
                    <input type="hidden" name="id" value=<?= $i->getId() ?>>

                    <?php if ($role !== 'admin') : ?>
                        <select name="role" class="mySelect">
                            <?php if ($role === 'customer') : ?>
                                <option value="customer" selected>Client</option>
                            <?php else : ?>
                                <option value="customer">Client</option>
                            <?php endif; ?>

                            <?php if ($role === 'management') : ?>
                                <option value="management" selected>Gestion</option>
                            <?php else : ?>
                                <option value="management">Gestion</option>
                            <?php endif; ?>

                            <?php if ($role === 'logistic') : ?>
                                <option value="logistic" selected>Logistique</option>
                            <?php else : ?>
                                <option value="logistic">Logistique</option>
                            <?php endif; ?>
                        </select>
                    <?php endif; ?>
                </form>

                <div class="activeDelete">
                    <?php if ($i->getStatus() === "active") : ?>
                        <p class="blueGoldButton readDesactivate">Désactiver</p>
                    <?php elseif ($i->getStatus() === "desactive") : ?>
                        <p class="blueGoldButton readDesactivate">Activer</p>
                    <?php endif; ?>

                    <!-- <p class="blueGoldButton readDesactivate">Désactiver</p> -->

                    <div class="readDesactivateMenu">
                        <?php if ($i->getStatus() === "active") : ?>
                            <p>Êtes-vous sûr(e) de vouloir activer ce compte ?</p>
                        <?php elseif ($i->getStatus() === "desactive") : ?>
                            <p>Êtes-vous sûr(e) de vouloir désactiver ce compte ?</p>
                        <?php endif; ?>
                        <div id="readDeleteMenuButton">
                            <div class="userForm">
                                <p class="blueButton cancelDesactivate">Annuler</p>
                            </div>
                            <form action="user/updateStatus" method="POST">
                                <input type="hidden" name="id" value=<?= $i->getId() ?>>
                                <?php if ($i->getStatus() === "active") : ?>
                                    <input type="hidden" name="status" value="desactive">

                                    <input type="submit" value="Désactiver" class="goldenButton">
                                <?php elseif ($i->getStatus() === "desactive") : ?>
                                    <input type="hidden" name="status" value="active">

                                    <input type="submit" value="Activer" class="goldenButton">
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>

                    <p class="goldenButton readDelete">Supprimer</p>

                    <div class="readDeleteMenu">
                        <p>Êtes-vous sûr(e) de vouloir supprimer ce compte ?</p>
                        <div id="readDeleteMenuButton">
                            <div class="userForm">
                                <p class="blueButton cancelDelete">Annuler</p>
                            </div>
                            <form action="user/deleteUser" method="POST">
                                <input type="hidden" name="id" value=<?= $i->getId() ?>>
                                <input type="submit" value="Supprimer" class="goldenButton">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php
    } else if (is_array($i)) { ?>
        <div class="user">
            <div class="userInfo">
                <p>ID : <?= $i['id'] ?></p>
                <p><?= $i['name'] ?></p>
                <p><?= $i['email'] ?></p>
                <!-- <p>Prénom</p> -->
                <div class="statusRole">
                    <p>Statut : <?= $statusText ?></p>
                    <p>Rôle : <?= $roleText ?></p>
                </div>
                <!-- <p>Date de création : 02/12/2020</p> -->
            </div>
            <div class="userForm">
                <form action="user/updateRole" method="POST" class="form myForm">
                    <input type="hidden" name="id" value=<?= $i['id'] ?>>

                    <?php if ($role !== 'admin') : ?>
                        <select name="role" class="mySelect">
                            <?php if ($role === 'customer') : ?>
                                <option value="customer" selected>Client</option>
                            <?php else : ?>
                                <option value="customer">Client</option>
                            <?php endif; ?>

                            <?php if ($role === 'management') : ?>
                                <option value="management" selected>Gestion</option>
                            <?php else : ?>
                                <option value="management">Gestion</option>
                            <?php endif; ?>

                            <?php if ($role === 'logistic') : ?>
                                <option value="logistic" selected>Logistique</option>
                            <?php else : ?>
                                <option value="logistic">Logistique</option>
                            <?php endif; ?>
                        </select>
                    <?php endif; ?>
                </form>

                <div class="activeDelete">
                    <?php if ($i['status'] === "active") : ?>
                        <p class="blueGoldButton readDesactivate">Désactiver</p>
                    <?php elseif ($i['status'] === "desactive") : ?>
                        <p class="blueGoldButton readDesactivate">Activer</p>
                    <?php endif; ?>

                    <!-- <p class="blueGoldButton readDesactivate">Désactiver</p> -->

                    <div class="readDesactivateMenu">
                        <?php if ($i['status'] === "active") : ?>
                            <p>Êtes-vous sûr(e) de vouloir activer ce compte ?</p>
                        <?php elseif ($i['status'] === "desactive") : ?>
                            <p>Êtes-vous sûr(e) de vouloir désactiver ce compte ?</p>
                        <?php endif; ?>
                        <div id="readDeleteMenuButton">
                            <div class="userForm">
                                <p class="blueButton cancelDesactivate">Annuler</p>
                            </div>
                            <form action="user/updateStatus" method="POST">
                                <input type="hidden" name="id" value=<?= $i['id'] ?>>
                                <?php if ($i['status'] === "active") : ?>
                                    <input type="hidden" name="status" value="desactive">

                                    <input type="submit" value="Désactiver" class="goldenButton">
                                <?php elseif ($i['status'] === "desactive") : ?>
                                    <input type="hidden" name="status" value="active">

                                    <input type="submit" value="Activer" class="goldenButton">
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>

                    <p class="goldenButton readDelete">Supprimer</p>

                    <div class="readDeleteMenu">
                        <p>Êtes-vous sûr(e) de vouloir supprimer ce compte ?</p>
                        <div id="readDeleteMenuButton">
                            <div class="userForm">
                                <p class="blueButton cancelDelete">Annuler</p>
                            </div>
                            <form action="user/deleteUser" method="POST">
                                <input type="hidden" name="id" value=<?= $i['id'] ?>>
                                <input type="submit" value="Supprimer" class="goldenButton">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php
    }
}
?>

<main>
    <div class="banner">
        <h1>Zone administrateur</h1>
    </div>

    <div class="userContainer">


        <div class="filterList">
            <script>
                let filterList = document.querySelector(".filterList")
                filterList.appendChild(filterElement)
            </script>
            <form action="searchUser" method="GET">
                <input type="text" name="search" placeholder="Rechercher...">
                <button type="sumbit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <!-- <form action="" method="GET">
                <select class="select">
                    <option value="option1">ID</option>
                    <option value="option2">Adresse e-mail</option>
                    <option value="option3">Nom</option>
                    <option value="option4">Statut</option>
                    <option value="option5">Date de création</option>
                </select>
            </form> -->
        </div>


        <?php
        if (count($users) > 0) {
            foreach ($users as $user) {
                adminUserTemplate($user);
            }
        } else {
            echo "<p>Pas d'utilisateur correspondant à cette cette recherche.</p>";
        }
        ?>

    </div>

</main>


</body>
<script src="../public/js/optionSelect.js"></script>
<script src="../public/js/submit.js"></script>
<script src="../public/js/admin.js"></script>

</html>