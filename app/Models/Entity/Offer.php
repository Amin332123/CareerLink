<?php
namespace App\Models\Entity;

class Offer{
    private int $id;
    private string $title;
    private string $location;
    private float $salary;
    private int $recruiterId;
    private Category $category;
    private array $tags;


    public function __construct(string $title,string $location,float $salary,Category $category,int $recruiterId)
    {
        $this->title = $title;
        $this->location = $location;
        $this->salary = $salary;
        $this->recruiterId = $recruiterId;
        $this->category = $category;
    }

    public function getId():int{ return $this->id;}
    public function getRecruiterId():int{ return $this->recruiterId;}
    public function getTitle():string{ return $this->title;}
    public function getLocation():string{ return $this->location;}
    public function getSalary():float{ return $this->salary;}
    public function getCategory():Category{ return $this->category;}
    public function getTags():array{ return $this->tags;}

    public function setId(int $id):void { $this->id = $id;}
    public function setRecruiterId($recruiterId):void{ $this->recruiterId = $recruiterId;}
    public function settitle(string $title):void { $this->title = $title;}
    public function setlocation(string $location):void { $this->location = $location;}
    public function setSalary(float $salary):void{ $this->salary = $salary;}
    public function setCategory(Category $category):void{ $this->category = $category;}
    public function addTag(string $tag):void{ $this->tags[] = $tag;}
    public function setTags(array $tags):void{ $this->tags = $tags;}

}