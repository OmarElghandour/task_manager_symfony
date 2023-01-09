<?php

namespace App\Factory;
use App\Entity\Task;
use App\Repository\UserRepository;

class TaskFactory
{

    public static function create(array $options): Task
    {

        $task = new Task();
        $task->setTitle($options['title']);
        $task->setdescription($options['description']);
        $task->setStartAt(new \DateTime($options['startAt']));
        $task->setEndAt(new \DateTime($options['endAt']));
        $task->setUserId($options['userId']);
        $task->setCategoryId($options['categoryId'] ?? null);
        return $task;
    }
}