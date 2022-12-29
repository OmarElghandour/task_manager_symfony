<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/task', name: 'app_task', methods: ['GET'])]
    
    /**
     *
     */
    public function index(): JsonResponse
    {
        $test = 'some text';

//        dump($test);

        return $this->json([
            'message' => $test,
            'path' => 'src/Controller/TaskController.php',
        ]);
    }


    public function create(): JsonResponse
    {
//        $task = new Task();
//
//        $task->setTitle('test');
//        $task->setdescription('test');
//        $task->setStartAt(new \DateTime());
//        $task->setEndAt(new \DateTime());
//        $task->setUserId(1);
//        $task->setCategoryId(1);
        $test = 'some text';
    }
}
