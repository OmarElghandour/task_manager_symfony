<?php
namespace App\Factory;
use App\Entity\User;

class UserFactory
{
    public static function create(array $options): User
    {
        $user = new User();
        $user->setFirstName($options['firstName']);
        $user->setLastName($options['lastName']);
        $user->setEmail($options['email']);
        $user->setPassword($options['password']);
        return $user;
    }
}