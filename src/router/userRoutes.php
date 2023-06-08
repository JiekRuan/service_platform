<?php

require_once './controllers/userController.php';

$method = $_SERVER['REQUEST METHOD'];
$url = $_SERVER['REQUEST URI'];

switch ($url) {
    case 'value':
        # code...
        break;
    
    default:
        # code...
        break;
}

// TODO faire les routes en objet
// gerer les param dans les fonctions
// avoir des param dynamique
//