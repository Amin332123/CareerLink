<?php 
require_once '../../../vendor/autoload.php';
use App\Models\Services\AdminService;

$service = new AdminService();
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);
$categoryName = $data['categoryName'] ?? '';

$service->createCategory($categoryName);



