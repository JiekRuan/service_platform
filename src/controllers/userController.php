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
            null,
            'active'
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
            'phone' => $_POST['phone'],
            'email' => $_POST['email']
        ];

        $user = new User(
            $data['id'],
            $data['name'],
            null,
            $data['email'],
            $data['phone'],
            null,
            null,
            null
        );

        if ($user->updateUser($data['id'])) {
            $_SESSION["userName"] = $data['name'];
            $_SESSION["email"] = $data['email'];
            $_SESSION["phone"] = $data['phone'];
            global $domain;
            header('Location: http://' . $domain . '/home');
        } else {
            echo "Erreur lors de la mise à jour des informations de l'utilisateur.";
        }
    }

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['password']) && isset($_POST['confirmedPassword'])) {
                $password = $_POST['password'];
                $confirmedPassword = $_POST['confirmedPassword'];

                if ($password === $confirmedPassword) {
                    $userId = $_SESSION["userId"];
                    $user = new User();
                    if ($user->updateUserPassword($userId, $password)) {
                        echo "Le mot de passe a été mis à jour avec succès.";
                    } else {
                        echo "Erreur lors de la mise à jour du mot de passe.";
                    }
                } else {
                    echo "Le mot de passe et sa confirmation ne correspondent pas. Veuillez réessayer.";
                }
            } else {
                echo "Veuillez fournir un mot de passe et une confirmation.";
            }
        }
    }


    public function deleteUser()
    {
        $id = $_POST['id'];

        $user = new User($id, null, null, null, null, null, null, null);

        if ($user->deleteUser($id)) {
            echo "L'utilisateur a été supprimé avec succès.";
            global $domain;
            header('Location: http://' . $domain . '/admin');
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

                $user = new User(null, null, $email, null, null, $password, null, null);
                $loggedInUser = $user->verifyAccount($email, $password);

                if ($loggedInUser instanceof User) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION['userId'] = $loggedInUser->getId();
                    $_SESSION['userName'] = $loggedInUser->getName();
                    $_SESSION['phone'] = $loggedInUser->getPhone();
                    $_SESSION['email'] = $loggedInUser->getMail();
                    $_SESSION["role"] = $loggedInUser->getRole();
                    $_SESSION["status"] = $loggedInUser->getStatus();
                    setcookie("userId", $_SESSION['userId'], time() + 3600);
                    setcookie("userName", $_SESSION['userName'], time() + 3600);
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
        $user = new User(null, null, null, null, null, null, null, null);

        if ($user->getUserById($id)) {
            $userInfo = $user->getUserInfo($id);

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
    public function Error404(): void
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

    public function disableAccount()
    {
        require_once 'public\templates\customer\disableAccount.php';
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

    public function settings()
    {
        require_once 'public\templates\customer\settings.php';
    }

    public function settingsForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $user = new User($id, $name, $email, $phone, null, null, null, null);

            // Enregistrer les nouvelles informations
            if ($user->updateUser($id)) {
                $_SESSION['userName'] = $user->getName();
                $_SESSION['phone'] = $user->getPhone();
                $_SESSION['email'] = $user->getMail();
                global $domain;
                header('Location: http://' . $domain . '/user/settings');
                exit();
            } else {
                header('Location: public\templates\public\404.php');
            }
        }
    }

    public function UpdateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $status = $_POST['status'];

            $user = new User($id, null, null, null, null, null, null, $status);

            // Enregistrer les nouvelles informations
            if ($user->status($id)) {
                $_SESSION['status'] = $user->getStatus();
                global $domain;
                header('Location: http://' . $domain . '/admin');
                exit();
            } else {
                header('Location: public\templates\public\404.php');
            }
        }
    }

    public function admin()
    {
        $user = new User(null, null, null, null, null, null, null, null);

        global $users;
        $users = $user->getAllUsers();
        // echo var_dump($users);
        require_once 'public\templates\admin\admin.php';
    }
}