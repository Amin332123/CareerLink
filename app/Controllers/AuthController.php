<?php

namespace App\Controllers;

use App\Controllers\Controller;

class AuthController extends Controller
{
    public function showLogin()
    {
        require_once "app\Views\public\Auth\login.php";
    }
    public function showRegister()
    {
        require_once "app\Views\public\Auth\register.php";

    }

    public function login()
    {
        
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        require_once "app\Views\public\Auth\login.php";
    }
}
