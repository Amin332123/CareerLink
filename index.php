<?php

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\AdminController;
use App\Models\Entity\Recruiter;

session_start();

require_once __DIR__ . '/vendor/autoload.php';

$router = new Router();

$router->get('login',[AuthController::class,'showLogin']);
$router->post('login',[AuthController::class,'login']);

$router->get('signup',[AuthController::class,'showRegister']);
$router->post('addCandidate',[AuthController::class,'register']);
$router->post('addRecruiter',[AuthController::class,'register']);

$router->get('logout',[AuthController::class,'logout']);

$router->get('admin/dashboard', ["UserController", 'adminDashboard']);
$router->get('recruiter/dashboard', ["UserController", 'recruiterDashboard']);
$router->get('candidate/dashboard', ["UserController", 'candidateDashboard']);
$router->post('app/Views/CreateCategory', ["AdminController", 'CreateCategory']);
$router->get('app/Views/GetCategory', ["AdminController", 'DisplayCatergories']);
$router->post('app/Views/DeleteCategory', ["AdminController", 'DeleteCategory']);
$router->post('app/Views/CreateTag', ["AdminController", 'CreateTag']);
$router->get('app/Views/GetTags', ["AdminController", 'DisplayTags']);
$router->post('app/Views/DeleteTags', ["AdminController", 'DeleteTag']);


$Uri = $_SERVER['REQUEST_URI'];

$path = str_replace('/CareerLink/','',$Uri);
$path = parse_url($path, PHP_URL_PATH);
$path = trim($path,'/');
$router->dispatch($path, $_SERVER['REQUEST_METHOD']);
