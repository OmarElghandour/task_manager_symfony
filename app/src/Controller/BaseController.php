<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BaseController extends AbstractController
{
    private SerializerInterface $serializer;

    private ValidatorInterface $validator;
    protected EntityManagerInterface $entityManager;

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator,EntityManagerInterface $entityManager)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->entityManager = $entityManager;
    }

    public function validateParams(Request $request, $validationClass): object
    {
        $dto = $this->serializer->deserialize($request->getContent(), $validationClass, 'json');
        $errors = $this->validator->validate($dto);
        if (count($errors) > 0) {
            throw new BadRequestHttpException((string) $errors);
        }

       return $dto;
    }
}