<?php
namespace MyApp\Controllers;

use MyApp\Models\Apartment as Apartment;

require_once 'src/model/Apartment.php';

class ApartmentController {

    public function createApartment()
    {
    // verifier que le form soit en POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        // recup les donnee du form create
        $name = $_POST['name'];
        $address = $_POST['address'];
        $arrondissement = $_POST['arrondissement'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $squareMeter = $_POST['squareMeter'];
        $numberBathroom = $_POST['numberBathroom'];
        $housingType = $_POST['housingType'];
        $balcon = $_POST['balcon'];
        $terasse = $_POST['terasse'];
        $capacity = $_POST['capacity'];
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
        $apartment->setBalcon($balcon);
        $apartment->setTerasse($terasse);
        $apartment->setCapacity($capacity);
        $apartment->setVueSur($vueSur);
        $apartment->setQuartier($quartier);
        
        //Enregistrer les infos
        if($apartment->saveData())
        {
            header('Location: listApartment');
        }else{
            header('Location: 404');
        }

        }
    }  
    public function modifyApartment()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
        // recup les donnee du form modify
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $arrondissement = $_POST['arrondissement'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $squareMeter = $_POST['squareMeter'];
        $numberBathroom = $_POST['numberBathroom'];
        $housingType = $_POST['housingType'];
        $balcon = $_POST['balcon'];
        $terasse = $_POST['terasse'];
        $capacity = $_POST['capacity'];
        $vueSur = $_POST['vueSur'];
        $quartier = $_POST['quartier'];

        //nouvel objet Apartment
        $apartment = new Apartment;

        //l'ID de l'appart a modifier
        $apartment->getId($id);

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
        
        //Enregistrer les infos
        if($apartment->saveData())
        {
            header('Location: listApartment');
        }else{
            header('Location: 404');
        }
        }
    }
    public function readApartment()
    { 
        $id = $_GET['id'];
        $name = $_GET['name'];
        $address = $_GET['address'];
        $arrondissement = $_GET['arrondissement'];
        $price = $_GET['price'];
        $description = $_GET['description'];
        $squareMeter = $_GET['squareMeter'];
        $numberBathroom = $_GET['numberBathroom'];
        $housingType = $_GET['housingType'];
        $balcon = $_GET['balcon'];
        $terasse = $_GET['terasse'];
        $capacity = $_GET['capacity'];
        $vueSur = $_GET['vueSur'];
        $quartier = $_GET['quartier'];
        
        $apartments = new Apartment();
        $apartmentList = $apartments->readAllApartments($id, $name, $address, $arrondissement, $price, $description, $squareMeter, $numberBathroom, $housingType, $balcon, $terasse, $capacity, $vueSur, $quartier);

        //afficher la vue lier a la function
        require_once('readApartment.php');

        //cree varible des donnee que je vais utiliser pour la vue
        
    }
    public function deleteApartment()
    {
        $id = $_GET['id'];

        $apartment = new Apartment();
        $apartment->id = $id;
        $result = $apartment->deleteApartment();
        header('Location: listApartment');//a revoir pour les Location.
    }

    public function logement()
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
        require_once 'public\templates\management\updateApartement.php';
    }
}
//affichier les appart cree une function avec un [].