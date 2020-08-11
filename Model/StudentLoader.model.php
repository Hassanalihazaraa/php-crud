<?php
declare(strict_types=1);

class StudentLoader extends DatabaseConnection
{
    private array $student = [];

    public function __construct()
    {
        $handle = DatabaseConnection::connect()->prepare('SELECT student.id, student.name, student.email FROM student LEFT JOIN class ON student.class_id = class.id');
        $handle->execute();
        $students = $handle->fetchAll();
        foreach ($students as $student) {
            $this->student[$student['id']] = new Student((int)$student['id'], (string)$student['name'], (string)$student['email'], (int)$student['class_id']);
        }
    }

    public function getStudent(): array
    {
        return $this->student;
    }
}