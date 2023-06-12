<?php

require_once './controllers/userController.php';


// TODO faire les routes en objet
// gerer les param dans les fonctions
// avoir des param dynamique


class Router {

    public function __construct() {
        $this->request = $_SERVER['REQUEST_URI'];

        //on enlève le 'http://'
        $this->url = preg_replace('/^http:\/{2}/', '$0 --> $2 $1', $this->request);

        // on sépare l'url
        $decomposed_url = preg_split('/\//', $this->url);

        $this->domain = array_shift($decomposed_url);
        $this->route = $decomposed_url;
    }

    //  routage
    public function dispatch() {

        if($this->route == null) {
            //  require la homepage
            //
            //
            return true;
        }
        //je récupère le premier élément de route pour choisir les routes que j'appelle
        switch ($this->route[0]) {
            case 'users':
                //  require les routes des utilisateurs
                //
                //
                break;
            case 'apartments':
                //  require les routes des appartements
                //
                //
                break;
            case 'reservations':
                //  require les routes des réservations
                //
                //
                break;
            default:
                //  require error 404
                //
                //
                break;
        }
    }
}