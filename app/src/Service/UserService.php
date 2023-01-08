<?php

namespace App\Service;
use App\Factory\UserFactory;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class UserService
{
    private UserRepository $repository;
    private EntityManagerInterface $entityManager;
    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->repository = $userRepository;
        $this->entityManager = $entityManager;
    }


    /**
     * @throws Exception
     */
    public function create($userInput): void
    {
        try {
            $user = UserFactory::create($userInput);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

    }


    /**
     * @throws Exception
     */
    public function login($userInput): bool
    {
        $user = $this->repository->findOneBy(['email' => $userInput['email']]);
        if ($user) {
            if ($user->getPassword() === $userInput['password']) {
               return true;
            } else {
                throw new Exception('Password is incorrect');
            }
        } else {
            echo 'User not found';
        }

        return false;
    }


}