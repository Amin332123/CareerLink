<?php
namespace App\Models\Entity;

abstract class User{
    protected int $id;
    protected string $name;
    protected string $email;
    protected string $password;
    private string $role;

    protected const ADMIN = 'admin';
    protected const CANDIDATE = 'candidate';
    protected const RECRUITER = 'recruiter';

    public function __construct(string $name,string $email,$role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }

    public function getId():int{ return $this->id;}
    public function getName():string{ return $this->name;}
    public function getEmail():string{ return $this->email;}
    public function getPassword():string{ return $this->password;}
    public function getRole():string{ return $this->role;}

    public function setId(int $id):void { $this->id = $id;}
    public function setName(string $name):void { $this->name = $name;}
    public function setEmail(string $email):void { $this->email = $email;}
    public function setPassword(string $password):void { $this->password = $password;}


}

