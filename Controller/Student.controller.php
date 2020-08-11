<?php
declare(strict_types=1);
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

class StudentController
{
    public function render()
    {
        if (empty($_POST['class'])) {
            $classLoader = new ClassLoader();
            $classes = $classLoader->getClass();
        }
        if (isset($_POST['submit'])) {
            $fullName = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $classId = (int)$_POST['class'];
            $students = new Student($fullName, $email, $classId);
            if ($classId !== 0) {
                $students->setClassId($classId);
            }
            $students->save(DatabaseConnection::connect());
        }
        require_once 'View/student.view.php';
    }
}