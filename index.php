<?php
declare(strict_types=1);

require_once 'Model/DatabaseConnection.php';
require_once 'Controller/Controller.php';
require_once 'Controller/AddStudent.php';

$controller = new Controller();
$controller->render();

