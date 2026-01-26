<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;

$router = new Router();
$router->get('login', ["AuthController", 'showLogin']);
$router->get('signup', ["AuthController", 'showRegister']);
$router->post('login', ["AuthController", 'login']);
$router->get('logout', ["AuthController", 'logout']);

$router->get('admin/dashboard', ["UserController", 'adminDashboard']);
$router->get('recruiter/dashboard', ["UserController", 'recruiterDashboard']);
$router->get('candidate/dashboard', ["UserController", 'candidateDashboard']);
$router->post('app/Views/CreateCategory', ["AdminController", 'CreateCategory']);
$router->get('app/Views/GetCategory', ["AdminController", 'DisplayCatergories']);
$router->post('app/Views/DeleteCategory', ["AdminController", 'DeleteCategory']);
$router->post('app/Views/CreateTag', ["AdminController", 'CreateTag']);
$router->get('app/Views/GetTags', ["AdminController", 'DisplayTags']);
$router->post('app/Views/DeleteTags', ["AdminController", 'DeleteTag']);


$request = $_SERVER['REQUEST_URI'];
$script_name = "/CareerLink/";

$url = str_replace($script_name, '', $request);

$url = parse_url($url, PHP_URL_PATH);

$url = trim($url, '/');


$router->dispatch($url, $_SERVER['REQUEST_METHOD']);