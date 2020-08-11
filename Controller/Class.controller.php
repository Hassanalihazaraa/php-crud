<?php
declare(strict_types=1);
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

class ClassController
{
    public function render()
    {
        if (empty($_POST['class'])) {
            $classLoader = new ClassLoader();
            $classes = $classLoader->getClass();
        }
        if ($_POST['submit'] === "create") {
            $className = htmlspecialchars(trim($_POST['name']));
            $location = htmlspecialchars(trim($_POST['location']));
            $teacherId = (int)$_POST['teacher_id'];
            $classes = new ClassModel($className, $location, $teacherId);
            if ($teacherId !== 0) {
                $classes->setClassId($teacherId);
            }
            $classes->saveClass(DatabaseConnection::connect());
        }
        require_once 'View/student.view.php';
    }}