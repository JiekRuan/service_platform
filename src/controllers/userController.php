<?php 
namespace MyApp\Controllers;

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
    }
?>