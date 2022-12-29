<?php

namespace App\Dto;
use Symfony\Component\Validator\Constraints as Assert;
class RegisterUserInput
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     */
    public string $firstName;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     */
    public string $lastName;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     * @Assert\Email()
     */
    public string $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="255")
     */
    public string $password;

}