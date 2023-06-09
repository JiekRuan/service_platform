<?php

namespace MyApp\Controllers;

use MyApp\Models\Apartment as Apartment;

require_once 'src/model/Apartment.php';

class ApartmentController
{

    public function createApartement()
    {
        // verifier que le form soit en POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // recup les données du form create
            $name = $_POST['name'];
            $address = $_POST['address'];
            $arrondissement = $_POST['arrondissement'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $squareMeter = $_POST['squareMeter'];
            $numberBathroom = $_POST['numberBathroom'];
            $housingType = $_POST['housingType'];
            $capacity = $_POST['capacity'];
            // $balcon = $_POST['balcon'];
            // $terasse = $_POST['terasse'];
            $vueSur = $_POST['vueSur'];
            $quartier = $_POST['quartier'];

            $balcon = isset($_POST['balcon']) ? $_POST['balcon'] : null;
            $terasse = isset($_POST['terasse']) ? $_POST['terasse'] : null;

            $apartment = new Apartment();
            // Definir les valeurs de l'appart
            $apartment->setName($name);
            $apartment->setAddress($address);
            $apartment->setArrondissement($arrondissement);
            $apartment->setPrice($price);
            $apartment->setDescription($description);
            $apartment->setSquareMeter($squareMeter);
            $apartment->setNumberBathroom($numberBathroom);
            $apartment->setHousingType($housingType);
            $apartment->setCapacity($capacity);
            $apartment->setBalcon($balcon);
            $apartment->setTerasse($terasse);
            $apartment->setVueSur($vueSur);
            $apartment->setQuartier($quartier);


            //Enregistrer les infos
            // if () {
            $lastInsertedId = $apartment->saveData();
            // recuperer les images
            $uploadedFiles = $_FILES['userfile'];

            // echo var_dump($uploadedFiles);

            for ($i = 0; $i < count($uploadedFiles['tmp_name']); $i++) {
                $tmpFile = $uploadedFiles['tmp_name'][$i];

                // Vérifier si le fichier existe et est accessible
                if (is_uploaded_file($tmpFile)) {
                    $blob = file_get_contents($tmpFile);

                    // Vérifier si la lecture du fichier a réussi
                    if ($blob !== false) {
                        $bin = base64_encode($blob);

                        $saveImage = new Apartment();
                        $saveImage->setId($lastInsertedId); // Utiliser l'ID du dernier appartement inséré
                        $saveImage->setImage($bin);
                        $saveImage->addImage();
                    } else {
                        // Gérer l'erreur de lecture du fichier
                        echo "Erreur lors de la lecture du fichier.";
                    }
                } else {
                    // Gérer l'erreur de fichier non téléchargé
                    echo "Erreur lors du téléchargement du fichier.";
                }
            }
            // header('Location: public\templates\management\listApartment.php');
            global $domain;
            header('Location: http://' . $domain . '/apartment/listApartement'); //a revoir pour les Location.
            // } else {
            //     header('Location: public\templates\public\404.php');
            // }
        }
    }
    // public function updateApartement()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // recup les donnee du form modify
    //         $id = $_POST['id'];
    //         $name = $_POST['name'];
    //         $address = $_POST['address'];
    //         $arrondissement = $_POST['arrondissement'];
    //         $price = $_POST['price'];
    //         $description = $_POST['description'];
    //         $squareMeter = $_POST['squareMeter'];
    //         $numberBathroom = $_POST['numberBathroom'];
    //         $housingType = $_POST['housingType'];
    //         $capacity = $_POST['capacity'];
    //         $balcon = $_POST['balcon'];
    //         $terasse = $_POST['terasse'];
    //         $vueSur = $_POST['vueSur'];
    //         $quartier = $_POST['quartier'];

    //         //nouvel objet Apartment
    //         $apartment = new Apartment;
    //         // $updateApart = $apartment;
    //         //l'ID de l'appart a modifier
    //         $apartment->getId($id);
    //         $apartment->setName($name);
    //         $apartment->setAddress($address);
    //         $apartment->setArrondissement($arrondissement);
    //         $apartment->setPrice($price);
    //         $apartment->setDescription($description);
    //         $apartment->setSquareMeter($squareMeter);
    //         $apartment->setNumberBathroom($numberBathroom);
    //         $apartment->setHousingType($housingType);
    //         $apartment->setBalcon($balcon);
    //         $apartment->setTerasse($terasse);
    //         $apartment->setCapacity($capacity);
    //         $apartment->setVueSur($vueSur);
    //         $apartment->setQuartier($quartier);
    //         // var_dump($apartment);

    //         //Enregistrer les infos
    //         if ($apartment->saveData()) {
    //             // header('Location: public\templates\management\listApartment.php');
    //             global $domain;
    //             header('Location: http://' . $domain . '/apartment/listApartement');
    //         } else {
    //             header('Location: public\templates\public\404.php');
    //         }
    //     }
    // }
    public function updateApartement()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire de modification
            $id = $_POST['id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $arrondissement = $_POST['arrondissement'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $squareMeter = $_POST['squareMeter'];
            $numberBathroom = $_POST['numberBathroom'];
            $housingType = $_POST['housingType'];
            $capacity = $_POST['capacity'];
            $balcon = $_POST['balcon'];
            $terasse = $_POST['terasse'];
            $vueSur = $_POST['vueSur'];
            $quartier = $_POST['quartier'];

            // Créer un nouvel objet Apartment
            $apartment = new Apartment();

            // Définir les nouvelles valeurs des propriétés de l'appartement
            $apartment->setName($name);
            $apartment->setAddress($address);
            $apartment->setArrondissement($arrondissement);
            $apartment->setPrice($price);
            $apartment->setDescription($description);
            $apartment->setSquareMeter($squareMeter);
            $apartment->setNumberBathroom($numberBathroom);
            $apartment->setHousingType($housingType);
            $apartment->setBalcon($balcon);
            $apartment->setTerasse($terasse);
            $apartment->setCapacity($capacity);
            $apartment->setVueSur($vueSur);
            $apartment->setQuartier($quartier);

            // Enregistrer les nouvelles informations
            if ($apartment->updateData($id)) {
                global $domain;
                // Rediriger vers une autre page (par exemple, la liste des appartements)
                header('Location: http://' . $domain . '/apartment/listApartement');
                exit();
            } else {
                header('Location: public\templates\public\404.php');
            }
        }
    }
    public function readApartement()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $apart = new Apartment();
            global $readApartment;
            $readApartment = $apart->readAnApartment($id);

            $photo = new Apartment();
            $photo->setId($id);
            global $photos;
            $photos = $photo->getPhotosByApartment();

            //afficher la vue lier a la function
            require_once('public\templates\management\readApartement.php');
        }
    }

    public function deleteApartment()
    {
        $id = $_POST['id'];

        $apartment = new Apartment();
        $result = $apartment->deleteApartement($id);

        global $domain;
        header('Location: http://' . $domain . '/apartment/listApartement');
    }


    public function listApartement()
    {
        // if ($_SERVER['REQUEST_METHOD'] === 'GET') 
        // {
        // $id = $_GET['id'];
        // $name = $_GET['name'];
        // $address = $_GET['address'];
        // $arrondissement = $_GET['arrondissement'];
        // $capacity = $_GET['capacity'];

        $apartment = new Apartment();
        // $apartment->getId();
        // $apartment->getName();
        // $apartment->getAddress();
        // $apartment->getArrondissement();
        // $apartment->getCapacity();

        global $apartments;
        $apartments = $apartment->readAllApartments();
        // }

        require_once 'public/templates/management/listApartement.php';
        // return $apartments;
    }

    //fonction recherche pour pouvoir faire des recherche
    //sur ttes la table Apartment
    public function searchAll()
    {
    }
    public function displayPageDelete()
    {
        require_once 'public\templates\management\readApartement.php';
    }

    public function displayFormAdd()
    {
        require_once 'public\templates\management\createApartement.php';
    }

    public function displayFormModify()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $id = $_GET['id'];
        }
        $apart = new Apartment();
        global $readApartment;
        $readApartment = $apart->readAnApartment($id);
        require_once 'public\templates\management\updateApartement.php';
    }

    public function logement()
    {
        $id = $_GET['id'];
        $apart = new Apartment();
        global $readApartment;
        $readApartment = $apart->readAnApartment($id);

        $photo = new Apartment();
        $photo->setId($id);
        global $photos;
        $photos = $photo->getPhotosByApartment();

        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $userId = $_SESSION['userId'];
                $bookmark = new Apartment();
                $bookmark->setUserId($userId);
                global $bookmarks;
                $bookmarks = $bookmark->readUserBookmark();

                //afficher la vue lier a la function
            }
        }
        require_once 'public\templates\public\logement.php';
    }

    // public function listTestimony()
    // {
    //     require_once '';
    // }

    public function bookmark()
    {
        $userId = $_SESSION['userId'];
        $bookmark = new Apartment();
        $bookmark->setUserId($userId);
        global $bookmarks;
        $bookmarks = $bookmark->readUserBookmark();

        $photo = new Apartment();
        global $photos;
        $photos = $photo->getAllPhotos();
        // echo var_dump($photos);

        require_once 'public/templates/customer/bookmark.php';
    }

    public function bookmarkAddDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $apartmentId = $_POST['apartmentId'];
            $userId = $_POST['userId'];

            $apartment = new Apartment();

            $apartment->setId($apartmentId);
            $apartment->setUserId($userId);

            if ($apartment->addDeleteBookmark()) {

                global $domain;
                $currentPage = $_POST['REQUEST_URI'];
                header('Location: http://' . $domain . '' . $currentPage);
            } else {
                global $domain;
                header('Location: http://' . $domain . '/user/bookmark');
                // header('Location: http://' . $domain . '/404');
            }
        }

        require_once 'public/templates/customer/bookmark.php';
    }

    // public function bookmarkDelete()
    // {
    //     $currentPage = $_SERVER['REQUEST_URI'];
    //     echo $currentPage;
    //     require_once 'public/templates/customer/bookmark.php';
    // }

    public function checklist()
    {
        require_once 'public\templates\logistic\checklist.php';
    }

    public function planning()
    {
        require_once 'public\templates\logistic\planning.php';
    }

    public function todo()
    {
        require_once 'public\templates\logistic\todo.php';
    }
    public function conciergeService()
    {
        require_once 'public\templates\public\conciergeService.php';
    }

    public function searchPage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // récupérer les favoris
            if (isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
                $bookmark = new Apartment();
                $bookmark->setUserId($userId);
                global $bookmarks;
                $bookmarks = $bookmark->readUserBookmark();
            }
            $search = $_GET['search'];
            $apartment = new Apartment();
            global $apartments;

            $photo = new Apartment();
            global $photos;
            $photos = $photo->getAllPhotos();

            if (empty($search)) {
                $apartments = $apartment->readAllApartments();
            } else {
                $apartments = $apartment->searchApartment($search);
            }

            require_once 'public\templates\public\searchPage.php';
        }
    }

    // gestion
    public function searchPageListApartment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $search = $_GET['search'];
            $apartment = new Apartment();
            global $apartments;

            if (empty($search)) {
                $apartments = $apartment->readAllApartments();
            } else {
                $apartments = $apartment->searchApartment($search);
            }

            require_once 'public\templates\management\listApartement.php';
        }
    }

    function confirmReservation()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];

            $photo = new Apartment();
            $photo->setId($id);
            global $photos;
            $photos = $photo->getPhotosByApartment();

            require_once 'public\templates\customer\ConfirmReservation.php';
        }
    }
}
//affichier les appart cree une function avec un [].