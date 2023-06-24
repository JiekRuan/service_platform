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
            $balcon = $_POST['balcon'];
            $terasse = $_POST['terasse'];
            $vueSur = $_POST['vueSur'];
            $quartier = $_POST['quartier'];

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
            if ($apartment->saveData()) {
                // header('Location: public\templates\management\listApartment.php');
                global $domain;
                header('Location: http://' . $domain . '/apartment/listApartement'); //a revoir pour les Location.
            } else {
                header('Location: public\templates\public\404.php');
            }
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
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $apart = new Apartment();
            global $readApartment;
            $readApartment = $apart->readAnApartment($id);
            //afficher la vue lier a la function
            require_once 'public\templates\public\logement.php';
        }
    }

    public function moderateTestimony()
    {
        require_once 'public\templates\management\moderateTestimony.php';
        //pas encore fait
    }

    public function listTestimony()
    {
        require_once '';
    }
    public function thanksTestimony()
    {
        require_once 'public\templates\customer\thanksTestimony.php';
    }
    public function bookmark()
    {
        // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //     $name = $_GET['name'];
        //     $arrondissement = $_GET['arrondissement'];
        //     $description = $_GET['description'];

        //     $apartmentModel = new Apartment();
        //     $apartments = $apartmentModel->readAllApartments();

        //     // Utilisez les variables récupérées dans votre code ici

        // }
            require_once 'public/templates/customer/bookmark.php';
    }
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
            $search = $_GET['search'];
            $apartment = new Apartment();
            global $apartments;
    
            if (empty($search)) {
                $apartments = $apartment->readAllApartments();
            } else {
                $apartments = $apartment->searchApartment($search);
            }
    
            require_once 'public\templates\public\searchPage.php';
        }
    }

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
    
}
//affichier les appart cree une function avec un [].