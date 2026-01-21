<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Router;
use App\Controllers\UserController;

$router = new Router();

$router->get('login', ["AuthController", 'showLogin']);
$router->post('login', ["AuthController", 'login']);
$router->get('logout', ["AuthController", 'logout']);

$router->get('admin/dashboard', [UserController::class, 'adminDashboard']);
$router->get('recruiter/dashboard', [UserController::class, 'recruiterDashboard']);
$router->get('candidate/dashboard', [UserController::class, 'candidateDashboard']);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/CAREERLINK', '', $uri);
$uri = $uri === '' ? 'login' : $uri;

$router->dispatch($uri, $_SERVER['REQUEST_METHOD']);
