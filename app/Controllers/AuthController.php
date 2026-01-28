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
        $user = $this->Authservice->login($email, $password);
        if ($user) {
            $_SESSION["role"] = $user->getRole();
            $_SESSION["user_id"] = $user->getId();
            if ($_SESSION["role"] == "admin") {
                require_once "app\Views\public\Admin\Dashboard.php";
            }
            if ($_SESSION["role"] == "candidate") {
                require_once "app\Views\public\Condidate\Dashboard.php";
            }
            if ($_SESSION["role"] == "recruiter") {
                require_once "app\Views\public\Admin\Dashboard.php";
            }
        } else {
            $error = "wrong credentials";
            require_once "app/Views/public/Auth/login.php";
            exit;
        }
    }

    public function uploadImage($file)
    {
        $uploadDir = 'app/Views/public_assets/images/';
        $targetFile = $uploadDir . basename($_FILES[$file]['name']);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES[$file]['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo 'size';
            $uploadOk = 0;
            exit;
        }
        if (file_exists($targetFile)) {
            echo 'exists';
            $uploadOk = 0;
            exit;
        }
        if ($fileType != 'jpg' && $fileType != 'jpeg' && $fileType != 'png') {
            echo 'type';
            $uploadOk = 0;
            exit;
        }
        if ($uploadOk === 0) {
            echo 'not okay';
            return false;
        } else {
            if (move_uploaded_file($_FILES[$file]['tmp_name'], $targetFile)) {
                return $targetFile;
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

            if (empty($name) || empty($email) || empty($password)) {
                $error = "name,Email and Password are required.";
            }
            if (strlen($password) < 6) {
                $error = "Password must be at least 6 characters long.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "this email is not a valid email address";
            }
        }

        if ($role == 'candidate') {
            $image = $this->uploadImage('image');
            $jobRole = $_POST['jobRole'];
            $skills = json_decode($_POST['skills']);
            if (!is_string($image)) {
                $error = "error uploading your image, please try again";
            } else {
                $user = $this->Authservice->register($name, $email, $role, $password, $jobRole, $image, $skills);
            }
        } elseif ($role == 'recruiter') {
            $companyName = $_POST['companyName'];
            $companyImage = $this->uploadImage('companyImage');
            if ($companyImage) {
                $error = "error uploading your image, please try again";
            } else {
                $user = $this->Authservice->register($name, $email, $role, $password, $companyName, $companyImage);
            }
        }
        if (isset($error)) {
            require_once "app/Views/public/Auth/signup.php";
            exit;
        }
        if (strpos($user, 'exists')) {
            require_once "app/Views/public/Auth/login.php";
            echo '<script>alert("email already exists")</script>';
        } else if ($user) {
            require_once "app/Views/public/Auth/login.php";
            echo '<script>alert("user created successfully")</script>';
        } else {
            echo '<script>alert("Register Error")</script>';
        }
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        require_once "app/Views/public/Auth/login.php";
        require_once "app/Views/public/Auth/login.php";
    }
}
