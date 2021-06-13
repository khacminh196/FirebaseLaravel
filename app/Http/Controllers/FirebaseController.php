<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\FirebaseService;

class FirebaseController extends Controller
{
    protected $firebaseService;
    
    public function __construct(FirebaseService $service)
    {
        $this->firebaseService = $service;
    }

    public function index()
    {
        $data = $this->firebaseService->getMessages();
        
        return $data;
    }

    public function sendMess()
    {
        $data = [
            "email" => "minh@gmail.com",
            "password" => bcrypt(12345)
        ];
        $this->firebaseService->sendMessage($data);
    }

    public function registration()
    {
        $userProperties = [
            'email' => 'admin@gmail.com',
            'emailVerified' => false,
            'phoneNumber' => '+84988888888',
            'password' => '123456',
            'displayName' => 'Admin'
        ];
        $this->firebaseService->registration($userProperties);
    }

    public function login()
    {
        $params = [
            'email' => 'admin@gmail.com',
            'password' => '123456'
        ];

        $user = $this->firebaseService->login($params['email'], $params['password']);
        return $user->data();
    }
}
