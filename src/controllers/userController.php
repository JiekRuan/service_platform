<?php
namespace MyApp\Controllers;

use MyApp\Models\User;


require_once 'src/model/User.php';
class UserController
{
    public function toHomepage()
    {
        // Require de la page d'accueil
        require_once 'public\templates\public\homepage.php';
    }

    public function addUser()
    {
        $data = [
            'name' => $_POST['name'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone']
        ];

        $user = new User(
            null,
            $data['name'],
            $data['email'],
            $data['phone'],
            'customer',
            $data['password'],
            null
        );

        if ($user->addUser()) {
            $_SESSION["loggedin"] = true;
            $_SESSION["role"] = $user->getRole();
            global $domain;
            header('Location: http://' . $domain . '/home');
        } else {
            echo "Erreur lors de la création de l'utilisateur.";
        }
    }

    public function updateUser()
    {
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'role' => $_POST['role'],
            'create_at' => $_POST['create_at']
        ];

        $user = new User(
            $data['id'],
            $data['name'],
            $data['password'],
            $data['email'],
            $data['phone'],
            $data['role'],
            null
        );

        if ($user->updateUser()) {
            echo "Les informations de l'utilisateur ont été mises à jour.";
        } else {
            echo "Erreur lors de la mise à jour des informations de l'utilisateur.";
        }
    }

    public function deleteUser()
    {
        $id = $_POST['id'];

        $user = new User(
            $id,
            null,
            null,
            null,
            null
        );

        if ($user->deleteUser()) {
            echo "L'utilisateur a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = new User(null, null, $email, null, null, $password, null);
                $loggedInUser = $user->verifyAccount($email, $password);

                if ($loggedInUser instanceof User) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION['userId'] = $loggedInUser->getId();
                    $_SESSION['userName'] = $loggedInUser->getName();
                    $_SESSION["role"] = $loggedInUser->getRole();
                    setcookie("userId",$_SESSION['userId'],time()+3600);
                    setcookie("userName",$_SESSION['userName'],time()+3600);
                    global $domain;
                    header('Location: http://' . $domain . '/home');
                } else {
                    echo "Identifiants invalides. Veuillez réessayer.";
                }
            } else {
                echo "Veuillez fournir une adresse e-mail et un mot de passe.";
            }
        }
    }

    public function displayLoginForm()
    {
        require_once 'public/templates/public/login.php';
    }

    public function logout()
    {
        // Détruire toutes les variables de session
        session_unset();
        // Détruire la session
        session_destroy();
        global $domain;
        header('Location: http://' . $domain . '/user/login');
        exit();
    }

    public function getUserById($id)
    {
        $user = new User();

        if ($user->getUserById($id)) {
            $userInfo = $user->getUserInfo();

            if ($userInfo) {
                echo "ID : ", $userInfo['id'], "<br>";
                echo "Nom : ", $userInfo['name'], "<br>";
                echo "Email : ", $userInfo['email'], "<br>";
                echo "Téléphone : ", $userInfo['phone'], "<br>";
            } else {
                echo "Aucune information disponible pour l'utilisateur avec l'ID spécifié.";
            }
        } else {
            echo "Erreur lors de la récupération des informations de l'utilisateur.";
        }
    }
    // redirection vers les vues
    public function Error404():void
    {
        require_once 'public\templates\public\404.php';
    }

    public function Error405(): void
    {
        require_once 'public\templates\public\405.php';
    }

    public function aboutUs()
    {
        require_once 'public\templates\public\aboutUs.php';
    }

    public function contactUs()
    {
        require_once 'public\templates\public\contactUs.php';
    }

    public function logement()
    {
        require_once 'public\templates\public\logement.php';
    }

    public function mentions()
    {
        require_once 'public\templates\public\mentions.php';
    }

    public function policy()
    {
        require_once 'public\templates\public\policy.php';
    }

    // public function searchPage()
    // {
    //     $apartment = new Apartment();
    //     global $apartments;
    //     $apartments = $apartment->readAllApartments();
    //     require_once 'public\templates\public\searchPage.php';
    // }

    public function signup()
    {
        require_once 'public\templates\public\signup.php';
    }

    public function testimony()
    {
        require_once 'public\templates\public\testimony.php';
    }
    public function chat()
    {
        require_once 'public\templates\customer\chatroom.php';
    }

    public function generateToken()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charnum = strlen($characters);
        $token = '';
        for ($i = 0; $i < 10; $i++) {
            $token .= $characters[random_int(0, $charnum - 1)];
        }
        return $token;
    }

    public function settings(){
        // manque la logique

        require_once 'public\templates\customer\settings.php';
    }
}
?>