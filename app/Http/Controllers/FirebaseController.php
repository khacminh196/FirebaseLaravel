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
}
