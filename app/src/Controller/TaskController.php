<?php

namespace App\Controller;

use App\Dto\RegisterUserInput;
use App\Entity\Task;
use App\Factory\TaskFactory;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use function Symfony\Component\DependencyInjection\Loader\Configurator\param;
use Symfony\Component\Validator\Constraints as Assert;

class TaskController extends BaseController
{
    #[Route('/task', name: 'app_task', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $test = 'some text';
        return $this->json([
            'message' => $test,
            'path' => 'src/Controller/TaskController.php',
        ]);
    }

    #[Route('/task', name: 'app_create_task', methods: ['POST'])]
    public function create(Request $request, UserRepository $repository): JsonResponse
    {
        $params = json_decode($request->getContent(), true);
        $user = $repository->findOneBy(['id' => $params['userId']]);
        $this->validateParams( $request, Task::class);
        $params['userId'] = $user;
        $task = TaskFactory::create($params);
        $this->entityManager->persist($task);
        $this->entityManager->flush();
        return $this->json([
            'message' => $task->getTitle(),
            'path' => 'src/Controller/TaskController.php',
        ]);
    }
}
