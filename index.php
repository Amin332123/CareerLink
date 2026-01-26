<?php

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\AdminController;



session_start();


require_once __DIR__ . '/vendor/autoload.php';

$router = new Router();

$router->get('login',[AuthController::class,'showLogin']);
$router->post('login',[AuthController::class,'login']);

$router->get('signup',[AuthController::class,'showRegister']);
$router->post('register',[AuthController::class,'register']);
$router->post('addRecruiter',[AuthController::class,'register']);

$router->get('logout',[AuthController::class,'logout']);

$router->get('admin/dashboard', [AdminController::class, 'adminDashboard']);
$router->get('admin/candidats', [UserController::class, 'listAllCandidates']);
$router->get('admin/recruteur', [UserController::class, 'listAllRecruiers']);
$router->get('admin/offfres', [AdminController::class, 'listAllOffers']);


// $router->get('recruiter/dashboard', [RecruiterController::class, 'recruiterDashboard']);
// $router->get('candidate/dashboard', [CandidateController::class, 'candidateDashboard']);
$router->post('app/Views/CreateCategory', [AdminController::class, 'CreateCategory']);
$router->get('app/Views/GetCategory', [AdminController::class, 'DisplayCatergories']);
$router->post('app/Views/DeleteCategory', [AdminController::class, 'DeleteCategory']);

$router->get('admin/dashboard', [UserController::class, 'adminDashboard']);
$router->get('recruiter/dashboard', [UserController::class, 'recruiterDashboard']);
$router->get('candidate/dashboard', [UserController::class, 'candidateDashboard']);
$router->post('app/Views/CreateCategory', [AdminController::class, 'CreateCategory']);
$router->get('app/Views/GetCategory', [AdminController::class, 'DisplayCatergories']);
$router->post('app/Views/DeleteCategory', [AdminController::class, 'DeleteCategory']);
$router->post('app/Views/CreateTag', [AdminController::class, 'CreateTag']);
$router->get('app/Views/GetTags', [AdminController::class, 'DisplayTags']);
$router->post('app/Views/DeleteTags', [AdminController::class, 'DeleteTag']);


$Uri = $_SERVER['REQUEST_URI'];

$path = str_replace('/CareerLink/','',$Uri);
$path = parse_url($path, PHP_URL_PATH);
$path = trim($path,'/');
$router->dispatch($path, $_SERVER['REQUEST_METHOD']);
