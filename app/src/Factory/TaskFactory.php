<?php

namespace App\Factory;
use App\Entity\Task;

class TaskFactory
{
    public static function create(array $options): Task
    {
        $task = new Task();
        $task->setTitle($options['title']);
        $task->setdescription($options['description']);
        $task->setStartAt($options['startAt']);
        $task->setEndAt($options['endAt']);
        $task->setUserId($options['userId']);
        $task->setCategoryId($options['categoryId']);
        return $task;
    }
}