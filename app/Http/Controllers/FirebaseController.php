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

    public function loginWithIdToken()
    {
        $token = 'eyJhbGciOiJSUzI1NiIsImtpZCI6ImRjNGQwMGJjM2NiZWE4YjU0NTMzMWQxZjFjOTZmZDRlNjdjNTFlODkiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiQWRtaW4iLCJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vYXBwLWNoYXQtMTdjNTMiLCJhdWQiOiJhcHAtY2hhdC0xN2M1MyIsImF1dGhfdGltZSI6MTYyMzU4MDQ1OCwidXNlcl9pZCI6InNrczB3eGg2bHBOY0NCWFp0TlBJVnBYMEFaMTIiLCJzdWIiOiJza3Mwd3hoNmxwTmNDQlhadE5QSVZwWDBBWjEyIiwiaWF0IjoxNjIzNTgwNDU4LCJleHAiOjE2MjM1ODQwNTgsImVtYWlsIjoiYWRtaW5AZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJwaG9uZV9udW1iZXIiOiIrODQ5ODg4ODg4ODgiLCJmaXJlYmFzZSI6eyJpZGVudGl0aWVzIjp7InBob25lIjpbIis4NDk4ODg4ODg4OCJdLCJlbWFpbCI6WyJhZG1pbkBnbWFpbC5jb20iXX0sInNpZ25faW5fcHJvdmlkZXIiOiJwYXNzd29yZCJ9fQ.hLwNvdKOC3r-L8B3aK3lEmHzr1eeiepQfWHTOyc9_rCGE9NEDlS6OO5ho-tH4IcjltKHqaIV5smkV0pZM1XJ87xK0EIjoBgr7zEU-eg_BnFZpVTus5IkU8a6hCI2y-kRr9uz-LCfzBFY-RR_AtVYBgyje8Wd8qx_jlGNEPPjfqWqvn7PdFI5S2yimv4kXjcCWMOTC01SoU-MC4gdudmYzq6LF6WlQZvCR1YlZQsGH1Qwr04yE-SOAibuF8RaYCJYm-bvrf_8YowXuwcgRAUfi15tpvKMhohMB2R8tjZLu4X4MtoTaDngBGYBPIBBXRHF1vQdJaogGsLX-qtk6vsSIA';

        $user = $this->firebaseService->loginWithIdToken($token);
        return $user->data();
    }

    public function firestore()
    {
        $this->firebaseService->firestoreDb();
    }

    public function userInfo()
    {
        $uid = "sks0wxh6lpNcCBXZtNPIVpX0AZ12";
        $user = $this->firebaseService->getUserInfo($uid);
        
        return $user;
    }
}
