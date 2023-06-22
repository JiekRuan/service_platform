<?php 
namespace MyApp\Controllers;

use MyApp\Models\User as User;

require_once 'src/model/User.php';

class UserController {
    public function toHomepage() {      
        // Require de la page d'accueil
        require_once 'public\templates\public\homepage.php';
    }

    public function addUser() {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'phone' => $_POST['phone']
        ];

        $user = new User(
            null, 
            $data['name'], 
            $data['email'], 
            $data['password'], 
            $data['phone']
        );
        
        if ($user->addUser()) {
            echo "L'utilisateur a été créé avec succès.";
        } else {
            echo "Erreur lors de la création de l'utilisateur.";
        }
    }

    public function updateUser() {
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'phone' => $_POST['phone']
        ];
    
        $user = new User(
            $data['id'], 
            $data['name'], 
            $data['email'], 
            $data['password'], 
            $data['phone']
        );
    
        if ($user->updateUser()) {
            echo "Les informations de l'utilisateur ont été mises à jour.";
        } else {
            echo "Erreur lors de la mise à jour des informations de l'utilisateur.";
        }
    }

    public function deleteUser() {
        $id = $_POST['id'];
    
        $user = new User(
            $id, 
            null, 
            null, 
            null, 
            null);

        if ($user->deleteUser()) {
            echo "L'utilisateur a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }
    }

    public function login() {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
    
        $user = new User();
        $loggedIn = $user->login($data['email'], $data['password']);
    
        if ($loggedIn) {
            echo "Connexion réussie.";
        } else {
            echo "Identifiants invalides. Veuillez réessayer.";
        }
    }

    public function logout() {
        // Détruire toutes les variables de session
        session_unset();
        // Détruire la session
        session_destroy();
        header("Location: login.php");
        exit(); 
    }

    public function getUserById($id) {
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
    public function Error404(){
        require_once 'public\templates\public\404.php';
    }

    public function Error405():void{
        require_once 'public\templates\public\405.php';
    }

    public function aboutUs(){
        require_once 'public\templates\public\aboutUs.php';
    }

    public function contactUs(){
        require_once 'public\templates\public\contactUs.php';
    }

    public function logement(){
        require_once 'public\templates\public\logement.php';
    }

    public function mentions(){
        require_once 'public\templates\public\mentions.php';
    }

    public function policy(){
        require_once 'public\templates\public\policy.php';
    }

    public function searchPage(){
        require_once 'public\templates\public\searchPage.php';
    }

    public function signup(){
        require_once 'public\templates\public\signup.php';
    }

    public function testimony(){
        require_once 'public\templates\public\testimony.php';
    }
}
?>