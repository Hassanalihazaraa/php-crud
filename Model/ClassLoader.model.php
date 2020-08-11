<?php
declare(strict_types=1);

class classLoader extends DatabaseConnection
{
    private array $class = [];

    public function __construct()
    {
        $handle = DatabaseConnection::connect()->prepare('SELECT * FROM class.id, class.name, class.location FROM class
                  LEFT JOIN teacher ON teacher_id = class.teacher_id');
        $handle->execute();
        $classes = $handle->fetchAll();
        foreach ($classes as $class) {
            $this->class[$class['id']] = new ClassModel((int)$class['id'], (string)$class['name'], (string)$class['location'], (int)$class['teacher_id']);
        }
    }

    public function getClass(): array
    {
        return $this->class;
    }
}