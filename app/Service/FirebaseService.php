<?php 

namespace App\Service;

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;

class FirebaseService {
    private $firebase;
    private $db;
    private $auth;

    public function __construct()
    {
        $this->firebase = (new Factory)->withServiceAccount('../Key/configfirebase.json')
            ->withDatabaseUri('https://app-chat-17c53-default-rtdb.firebaseio.com/');
        $this->db = $this->firebase->createDatabase();
        $this->auth = $this->firebase->createAuth();
    }

    public function getMessages()
    {
        $ref = $this->db->getReference('/messages');
        $data = $ref->getValue();

        return $data;
    }

    public function sendMessage($data)
    {
        $ref = $this->db->getReference('/messages');
        $ref->push($data);
    }

    public function registration($data)
    {
        $this->auth->createUser($data);
    }

    public function login($email, $password)
    {
        return $this->auth->signInWithEmailAndPassword($email, $password);
    }
}