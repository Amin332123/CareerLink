<?php

namespace App\Controllers;
use App\Models\Service\AuthService;

class AuthController
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
        $email = $_POST['email'];
        $password  = $_POST['password'];
        if (empty($email) || empty($password)) {
            $error = "Email and Password are required.";
        }
        if (strlen($password) < 6) {
            $error = "Password must be at least 6 characters long.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "this email is not a valid email address";
        }
        if (isset($error)) {
            require_once "app\Views\public\Auth\login.php";
            exit;
        }
        $Authservice = new AuthService();
        $user = $Authservice->authenticate($email, $password);
        if($user){
            $_SESSION["role"] = $user->getRole();
            $_SESSION["user_id"] = $user->getId();
            if($_SESSION["role"] == "admin"){
            require_once "app\Views\public\Admin\Dashboard.php";
            }
            if($_SESSION["role"] == "candidate"){
            require_once "app\Views\public\Candidate\Dashboard.php";
            }
            if($_SESSION["role"] == "recruiter"){
            require_once "app\Views\public\Admin\Dashboard.php";
            }
        }
    }
    public function addCandidate()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $image = $_POST['image'];
        $skills = json_decode($_POST['skills']);
        if ( empty($name) || empty($email) || empty($password)) {
            $error = "name,Email and Password are required.";
        }
        if (strlen($password) < 6) {
            $error = "Password must be at least 6 characters long.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "this email is not a valid email address";
        }
        if (isset($error)) {
            require_once "app\Views\public\Auth\register.php";
            exit;
        }
        $Authservice = new AuthService();
        $user = $Authservice->addCandidate();
        if($user){
            require_once "app\Views\public\Auth\login.php";
        }
        echo "error register";
    }
    public function addRecruiter()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $companyName = $_POST['companyName'];
        $companyImage = $_POST['companyImage'];
        if ( empty($name) || empty($email) || empty($password)) {
            $error = "name,Email and Password are required.";
        }
        if (strlen($password) < 6) {
            $error = "Password must be at least 6 characters long.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "this email is not a valid email address";
        }
        if (isset($error)) {
            require_once "app\Views\public\Auth\register.php";
            exit;
        }
        $Authservice = new AuthService();
        $user = $Authservice->addRecruiter();
        if($user){
            require_once "app\Views\public\Auth\login.php";
        }
        echo "error register";
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        require_once "app\Views\public\Auth\login.php";
    }
}
