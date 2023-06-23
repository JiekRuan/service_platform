<?php
namespace MyApp;

require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn) {

        $conn->userName = $_COOKIE['userName'];
        $conn->userId = $_COOKIE['userId'];
        $this->clients->attach($conn);
        echo "Nouvelle connexion ! ({$conn->resourceId})\n";
//        echo $_SESSION['userName'];
//        var_dump($conn->userName,$conn->userId);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Parse le json
        $data = json_decode($msg, true);
        var_dump($data);
        // Récupère le nom de l'utilisateur émetteur
//        $userName = $from->userName;
//        $userId = $from->userId;

//        $data['userName'] = $userName;
//        $data['userId'] = $userId;



        // Vérifie si le message existe
        if (isset($data['message'])) {
            $message = json_encode($data);
//            echo json_encode($data);


            // Envoie le message au client
            foreach ($this->clients as $client) {
                if ($client !== $from) {

                    $client->send($message);
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connexion fermée ! ({$conn->resourceId})\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Erreur : {$e->getMessage()}\n";
        $conn->close();
    }
}

?>
