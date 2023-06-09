<?php

class Apartment
{
    private $id;
    private $name;
    private $location;
    private $capacity;
    private $price;
    private $description;


    public function __construct($id,$name,$capacity,$description,$price,$location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->capacity = $capacity;
        $this->price = $price;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }
}

// fonction pour ajouter une annonce d'appartement dans la BDD
public function addNewApartment(){
    //connection BDD
    $db = new Database();
    
    $connection = $db->getConnection();

    // Requetes sql
    $request = $connection->prepare('INSERT INTO
        Apartment VALUES (:name, :location, :capacity, :price, :description;)');

    // utiliser bindParam en objet et non tableau assoc
    $request->bindParam(':name', $this->name);
    $request->bindParam(':location', $this->location);
    $request->bindParam(':capacity', $this->capacity);
    $request->bindParam(':price', $this->price);
    $request->bindParam(':description', $this->description);

    $result = $request->fetch(PDO::FETCH_ASSOC);

    if($request->execute()){
        $this->name = $result['name'];
        $this->location = $result['location'];
        $this->capacity = $result['capacity'];
        $this->price = $result['price'];
        $this->description = $result['description'];
        return true;
    }
    return false;
}


// fonction pour supprimer l'annonce de l'appartement dans la BDD
public function deleteAppartment(){
    $db = new Database();
    $connection = $db->getConnection();

    // Requetes sql
    $request = $connection->prepare('DELETE FROM Apartment
        WHERE id = :id');

    // utiliser bindParam en objet et non tableau assoc
    $request->bindParam(':id', $this->id);  

    $result = $request->fetch(PDO::FETCH_ASSOC);

    if($request->execute()){
        $this->id = $result['id'];
        return true;
    }
    return false;
}


// fonction pour modfier une annonce d'appartement dans la BDD
public function modifyApartment(){
    $db = new Database();
    $connection = $db->getConnection();

    // Requetes sql
    $request = $connection->prepare('UPDATE Apartment
        SET location = :location, capacity = :capacity, price = :price, description = :description WHERE name = :name');
    
    // Utiliser bindParam en objet et non tableau associatif
    $request->bindParam(':name', $this->name);
    $request->bindParam(':location', $this->location);
    $request->bindParam(':capacity', $this->capacity);
    $request->bindParam(':price', $this->price);
    $request->bindParam(':description', $this->description);

    if($request->execute()){
        return true;
    }
    return false;
}


//function pour faire une rechercher d'appartemen
public function searchApartment(){
    $db = new Database();
    $connection = $db->getConnection();

    // Requetes sql

    $request = $connection->prepare('SELECT * FROM apartment
        WHERE name LIKE '%result%'
        OR location LIKE '%result%'
        OR capacity = LIKE '%result%'
        OR price <= '%result%'
        OR description LIKE '%result%'');
    
    // Utiliser bindParam en objet et non tableau associatif
    $request->bindParam(':name', $this->name);
    $request->bindParam(':location', $this->location);
    $request->bindParam(':capacity', $this->capacity);
    $request->bindParam(':price', $this->price);
    $request->bindParam(':description', $this->description);

    if($request->execute()){
        return true;
    }
    return false;
}