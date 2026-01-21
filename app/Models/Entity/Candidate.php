<?php
namespace App\Models\Entity;
use App\Models\Entity\User;

class Candidate extends User{

    private string $picture;
    private array $skills;

    public function __construct($name,$email,$picture)
    {
        parent::__construct($name,$email,self::CANDIDATE);
        $this->picture=$picture;
    }

    public function getSkills():array{ return $this->skills;}
    public function getPicture():string{ return $this->picture;}

    public function setSkills(array $skills):void{ $this->skills = $skills;}
    public function setPicture(string $picture):void{ $this->picture = $picture;}


}

