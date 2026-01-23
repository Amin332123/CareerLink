<?php

namespace App\Controllers;

use App\Models\Services\AuthService;

class AuthController
{
    private $Authservice;
    public function __construct()
    {
        $this->Authservice = new AuthService();
    }
    public function showLogin()
    {
        require_once 'app/Views/public/Auth/login.php';
    }

    public function showRegister()
    {
        require_once "app/Views/public/Auth/signup.php";
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
            require_once "app/Views/public/Auth/login.php";
            exit;
        }
        $user = $this->Authservice->authenticate($email, $password);
        if ($user) {
            $_SESSION["role"] = $user->getRole();
            $_SESSION["user_id"] = $user->getId();
            if ($_SESSION["role"] == "admin") {
                require_once "app/Views/public/Admin/Dashboard.php";
            }
            if ($_SESSION["role"] == "candidate") {
                require_once "app/Views/public/Candidate/Dashboard.php";
            }
            if ($_SESSION["role"] == "recruiter") {
                require_once "app/Views/public/Admin/Dashboard.php";
            }
        }
    }
    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if (empty($name) || empty($email) || empty($password)) {
            $error = "name,Email and Password are required.";
        }
        if (strlen($password) < 6) {
            $error = "Password must be at least 6 characters long.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "this email is not a valid email address";
        }
        if (isset($error)) {
            require_once "app/Views/public/Auth/register.php";
            exit;
        }
        if ($role == 'candidate') {
            $image = $_POST['image'];
            $jobRole = $_POST['jobRole'];
            $skills = json_decode($_POST['skills']);
            $user = $this->Authservice->register($name, $email, $role, $password,$jobRole,$image,$skills);
        } elseif ($role == 'recruiter'){
            $companyName = $_POST['companyName'];
            $companyImage = $_POST['companyImage'];
            $user = $this->Authservice->register($name, $email, $role, $password,$jobRole,$image);
        }
        if (strpos($user,'exists')) {
            require_once "app/Views/public/Auth/login.php";
            echo '<script>alert("email already exists")</script>';
        }else if($user){
            require_once "app/Views/public/Auth/login.php";
            echo '<script>alert("user created successfully")</script>';

        }else{
            echo '<script>alert("Register Error")</script>';
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        require_once "app/Views/public/Auth/login.php";
    }
}
