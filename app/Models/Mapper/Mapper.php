<?php

namespace App\Models\Mapper;

use App\Models\Entity\Admin;
use App\Models\Entity\Application;
use App\Models\Entity\Candidate;
use App\Models\Entity\Category;
use App\Models\Entity\Offer;
use App\Models\Entity\Recruiter;
use App\Models\Entity\Tag;

class Mapper
{
    public static function mapUser(array $data)
    {
        if (isset($data['title'])) {
            if ($data['title'] == 'admin') {
                $mappingResult = new Admin($data['name'], $data['email']);
                $mappingResult->setId($data['id']);
                $mappingResult->setPassword($data['password']);
            } elseif ($data['title'] == 'candidate') {
                $mappingResult = new Candidate($data['name'], $data['email'], $data['current_job'], $data['profile_picture']);
                $mappingResult->setId($data['id']);
                $mappingResult->setPassword($data['password']);
            } elseif ($data['title'] == 'recruiter') {
                $mappingResult = new Recruiter($data['name'], $data['email'], $data['company_name'], $data['company_logo']);
                $mappingResult->setId($data['id']);
                $mappingResult->setPassword($data['password']);
            }
        }
        return $mappingResult ?? null;
    }

    public static function mapApplication(array $data)
    {
        if (isset($data['title'])) {
            $mappingResult = new Application(self::mapUser($data['candidate_id']), self::mapOffer($data['offer_id']), $data['status'], $data['response']);
            $mappingResult->setId($data['id']);
        }
        return $mappingResult ?? null;
    }

    public static function mapOffer(array $data)
    {
        if (isset($data['title'])) {
            $mappingResult = new Offer($data['title'], $data['location'], $data['salary'], self::mapCategory($data['category_id']), $data['recruiter_id']);
            $mappingResult->setId($data['id']);
        }
        return $mappingResult ?? null;
    }

    public static function mapCategory(array $data)
    {
        if (isset($data['title'])) {
            $mappingResult = new Category($data['title']);
            $mappingResult->setId($data['id']);
        }
        return $mappingResult ?? null;
    }

    public static function mapTag(array $data)
    {
        if (isset($data['title'])) {
            $mappingResult = new Tag($data['title']);
            $mappingResult->setId($data['id']);
        }
        return $mappingResult ?? null;
    }

    public static function mapSkill(array $data)
    {
        if (isset($data['title'])) {
            $mappingResult = $data['title'];
        }
        return $mappingResult ?? null;
    }
}
