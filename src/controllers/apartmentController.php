<?php
require_once '../model/apartment.php';

class ApartmentController {
    public function readApartment()
    {
        $apartments = new Apartment();
        $apartmentList = $apartments->readAllApartments();

        //afficher la vue lier a la function
        require_once('readApartment.php');

        foreach ($apartmentList as $apartment) {
            // Affichage des informations de chaque appartement
            echo "ID: " . $apartment->id . "<br>";
            echo "Nom: " . $apartment->name . "<br>";
            echo "Adresse: " . $apartment->address . "<br>";
            echo "Arrondissement: " . $apartment->arrondissement . "<br>";
            echo "Prix: " . $apartment->price . "<br>";
            echo "Description: " . $apartment->description . "<br>";
            echo "Mètre carré: " . $apartment->squareMeter . "<br>";
            echo "Nombre de salles de bain: " . $apartment->numberBathroom . "<br>";
            echo "Type de logement: " . $apartment->housingType . "<br>";
            echo "Balcon: " . $apartment->balcon . "<br>";
            echo "Terrasse: " . $apartment->terasse . "<br>";
            echo "Capacité: " . $apartment->capacity . "<br>";
            echo "Vue sur: " . $apartment->vueSur . "<br>";
            echo "Quartier: " . $apartment->quartier . "<br>";
            echo "<br>";
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