<?php 


header('Content-Type: application/json');

$db = new PDO('mysql:host=localhost;dbname=ajax', 'root', '12341234');
$data = json_decode(file_get_contents(filename: "php://input"), true);

$name = $data['name'] ?? '';
$email = $data['email']??'';


try {
    $query = "INSERT INTO users (name , email) values (:name , :email);";
    $stmt = $db->prepare($query);
    $stmt->bindParam('name', $name);
    $stmt->bindParam('email', $email);
    $stmt->execute();

    echo 'Sign up went good';


} catch (\Throwable $th) {
   echo 'sign up did not go good'. $th->getMessage();
}