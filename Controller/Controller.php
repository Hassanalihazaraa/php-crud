<?php
declare(strict_types=1);
require_once 'Controller/AddStudent.php';

class Controller
{
    public function render()
    {

        $addController = new AddStudent();
        $addController->render();

        require_once 'View/HomePage.php';
    }
}