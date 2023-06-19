<?php
namespace MyApp\Controllers;

require_once '../model/Apartment.php';

class ApartmentController {
    public function addNewApartment($data) {
        $apartment = new Apartment(null, $data['name'], $data['capacity'], $data['description'], $data['price'], $data['location']);
        
    }

    public function deleteApartment($id) {
        $apartment = new Apartment($id, null, null, null, null, null);
        
    }

    public function modifyApartment($data) {
        $apartment = new Apartment(null, $data['name'], $data['capacity'], $data['description'], $data['price'], $data['location']);
        
    }
}