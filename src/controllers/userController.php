<?php 
    require_once '../model/User.php';

    class UserController {
        public function addUser($data) {
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
    
        public function updateUser($data) {
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
    
        public function deleteUser($id) {
            $user = new User($id, null, null, null, null);
    
            if ($user->deleteUser()) {
                echo "L'utilisateur a été supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression de l'utilisateur.";
            }
        }
    
        public function getUserById($id) {
            $user = new User();
            
            if ($user->getUserById($id)) {
                echo "ID : ", $user->getId(), "<br>";
                echo "Nom : ", $user->getName(), "<br>";
                echo "Email : ", $user->getEmail(), "<br>";
                echo "Téléphone : ", $user->getPhone(), "<br>";
            } else {
                echo "Erreur lors de la récupération des informations de l'utilisateur.";
            }
        }
    }
?>