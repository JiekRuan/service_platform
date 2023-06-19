<?php
namespace MyApp\Controllers;

use MyApp\Models\Apartment as Apartment;

require_once './model/Apartment.php';

class ApartmentController {
    public function readApartment(){
    {   
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
        
        $apartments = new Apartment();
        $apartmentList = $apartments->readAllApartments($id, $name, $address, $arrondissement, $price, $description, $squareMeter, $numberBathroom, $housingType, $balcon, $terasse, $capacity, $vueSur, $quartier);

        //afficher la vue lier a la function
        require_once('readApartment.php');

        //cree varible des donnee que je vais utiliser pour la vue
        }
    }
    public function deleteApartment()
    {
        $id = $_GET['id'];

        $apartment = new Apartment();
        $apartment->id = $id;
        $result = $apartment->deleteApartment();
        header('Location: listApartment');//a revoir pour les Location.
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