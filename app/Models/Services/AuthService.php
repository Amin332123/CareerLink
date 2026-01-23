<?php
require_once "../../../vendor/autoload.php";
namespace App\Models\Service;

use App\Models\Entity\Candidate;

class AuthService
{
 public function authenticate($email, $password)
 {
    $test = new Candidate('ilyas','ilyas@gmail.com','image');
    return $test;
 }
 public function addCandidate()
 {
    $test = new Candidate('ilyas','ilyas@gmail.com','image');
    return $test;
 }
 public function addRecruiter()
 {
    $test = new Candidate('ilyas','ilyas@gmail.com','image');
    return $test;
 }
}