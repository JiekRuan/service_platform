<?php

namespace MyApp;

use MyApp\Controllers\UserController as UserController;
use MyApp\Controllers\ReservationController as ReservationController;
use MyApp\Controllers\ApartmentController as ApartmentController;

require_once './controllers/reservationController.php';
require_once './controllers/userController.php';
require_once './controllers/apartmentController.php';

class Router {

    public function __construct() {
        $this->request = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        //on enlève le 'http://' de l'url
        $this->url = preg_replace('/^http:\/{2}/', '$0 --> $2 $1', $this->request);

        if($this->method = 'GET'){
            $this->url = explode('?', $this->url)[0];
        }

        // on récupère le domaine (pas d'utilité pour le moment)
        $this->domain = preg_split('/\//', $this->url)[0];

        //  on récupère le reste de la requêta après le nom de domaine
        $this->route = preg_replace('/^' . $this->domain . '/', '$0 --> $2 $1', $this->url);

        if($this->route == '/'){
            $this->route = '';
        }
    }


    //  routage
    public function dispatch() {

        //je récupère les routes
        $routes = $this->getRoutes();

        //je vérifie si ma route est vide (que l'on a juste tapé le nom du domaine), ex : http://localhost:3000
        if($this->route == '') {
            $controller = new UserController();
            $controller->homepage();
            return true;
        }

        foreach($routes as $route) {
            if($route['url'] == $this->route){
                if($route['method'] != $this->method) {
                    header("HTTP/1.1 405 Method not Allowed");
                    $controller = new UserController;
                    $controller->error404();
                    return false;
                }
                $className = $route['controllerClass'];
                $controller = new $className;
                $function = $route['function'];
                $controller->$function();

                return true;
            }
        }
        //si aucune route ne correspond on lui envoie une erreur 404
        header("HTTP/1.1 404 Content not Found");
        $controller = new UserController;
        $controller->error404();
        return false;
    }

    //  fonction qui récupère les routes concernées par la requête
    //  faire un json pour stocker toutes les routes
    private function getRoutes(){
        $filepath = './router/routes.json';
        $data = file_get_contents($filepath);

        return json_decode($data, true);
    }
}
