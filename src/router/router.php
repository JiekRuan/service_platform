<?php

namespace MyApp\Router;

class Router {

    use MyApp\Controllers\ApartmentController;
    use MyApp\Controllers\ReservationController;
    use MyApp\Controllers\UserController;

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

        if($this->route[0] == '/'){
            array_shift($this->route);
        }
    }


    //  routage
    public function dispatch() {

        //je récupère les routes
        $routes = $this->getRoutes();

        if($routes == []) {
            //  require la homepage
            //
            //
            return true;
        }

        foreach($routes as $route) {
            if($route['url'] == $this->route){
                if($route['method'] != $this->method) {
                    header("HTTP/1.1 405 Method not Allowed");
                    $controller = new userController;
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
    }

    //  fonction qui récupère les routes concernées par la requête
    //  faire un json pour stocker toutes les routes
    private function getRoutes(){
        $filename = 'routes.json';
        $data = file_get_contents($filename);

        return json_decode($data);
    }
}
