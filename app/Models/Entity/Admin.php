<?php
namespace App\Models\Entity;
use App\Models\Entity\User;

class Admin extends User{


    public function __construct($name,$email)
    {
        parent::__construct($name,$email,self::ADMIN);
    }

}

