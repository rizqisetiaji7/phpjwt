<?php 
use \Firebase\JWT\JWT;

class Session {
    public $username;
    public $role;
    public function __construct($username, $role) {
        $this->username = $username;
        $this->role = $role;
    }
}

class SessionManager {

    public static $SECRET_KEY = "skdjsdjhweoiqoakslS9mxbcweuwzzawqdksjd";

    public static function login($username, $password) {
        if($username == 'rizqi' && $password == 'rizqi') {
            // $_SESSION['username'] = $username;
            // $_SESSION['role'] = 'customer';

            // Menggunakan JWT
            $payload = ['username' => $username, 'role' => 'customer'];

            // Encode payload with JWT
            $jwt = JWT::encode($payload, self::$SECRET_KEY, 'HS256');

            // Save JWT token to cookie
            setcookie("RZQ-SESSION",$jwt,null,null,null,true); // true for HttpOnly
            return true;
        } else {
            return false;
        }
    }

    public static function getCurrentSession() {
        // if ($_SESSION['username']) {
        //     return new Session($_SESSION['username'], $_SESSION['role']);
        // } else {
        //     throw new Exception("User is not Login");
        // }
        
        // Check existing data
        if ($_COOKIE['RZQ-SESSION']) {
            $jwt = $_COOKIE['RZQ-SESSION'];
            
            try {
                $payloadData = JWT::decode($jwt, self::$SECRET_KEY, ['HS256']); // Return value is Object
                return new Session($payloadData->username, $payloadData->role);
            } catch(Exception $exc) {
                throw new Exception("User is not Login");
            }
        } else {
            throw new Exception("User is not Login");
        }
    }
}