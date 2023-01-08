<?php

namespace App\Controller;

use App\Dto\RegisterUserInput;
use App\Service\UserService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface as Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{

    /**
     * @throws Exception
     */
    #[Route('/signup', name: 'user_signup', methods: ['POST'])]
    public function createUser(Request $request, Serializer  $serializer, ValidatorInterface $validator,
    UserService $userService): JsonResponse
    {
        $dto = $serializer->deserialize($request->getContent(), RegisterUserInput::class, 'json');
        $errors = $validator->validate($dto);
        if (count($errors) > 0) {
            throw new BadRequestHttpException((string) $errors);
        }

        $userService->create(json_decode($request->getContent(), true));

      return  $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * @throws Exception
     */
    #[Route('/login', name: 'user_login', methods: ['POST'])]
    public function index(Request $request,UserService $userService): JsonResponse
    {
        $params = json_decode($request->getContent(), true);
        $user = $userService->login($params);

        if ($user) {
            return $this->json(['message' => 'user loggedIn successfully!']);
        }

        return $this->json(['message' => 'in valid credential!']);
    }




}
