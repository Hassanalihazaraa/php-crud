<?php
declare(strict_types=1);
require_once 'Controller/Student.controller.php';
require_once 'Controller/Class.controller.php';

class HomeController
{
    public function render()
    {
        $studentController = new StudentController();
        $studentController->render();
        $classController = new ClassController();
        $classController->render();
        
        require_once 'View/HomePage.php';
    }
}