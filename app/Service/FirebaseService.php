<?php 

namespace App\Service;

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
// use Google\Cloud\Firestore\FirestoreClient;

class FirebaseService {
    private $firebase;
    // private $firestore;
    private $db;
    private $auth;

    public function __construct()
    {
        $this->firebase = (new Factory)->withServiceAccount('../Key/configfirebase.json')
            ->withDatabaseUri('https://app-chat-17c53-default-rtdb.firebaseio.com/');
        // $this->firestore = $this->firebase->createFirestore();
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

    public function loginWithIdToken($token)
    {
        return $this->auth->signInWithIdpAccessToken('custom', $token);
    }

    public function firestoreDb()
    {
        // dd(FirestoreClient::class);
        $database = $this->firestore->database();
        $testRef = $database->collection('User')->newDocument();
        $testRef->set([
            'firstName' => 'Abc',
            'lastName' => 'Bcd',
            'age' => '16'
        ]);
    }

    public function getUserInfo($uid)
    {
        return $this->auth->getUser($uid);
    }
}