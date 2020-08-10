<?php
declare(strict_types=1);

class StudentModel extends Person
{
    private int $teacherId;
    private string $teacherName;
    private int $classId;
    private string $className;

    public function __construct(int $teacherId, string $teacherName, int $classId, string $className)
    {
        $this->teacherId = $teacherId;
        $this->teacherName = $teacherName;
        $this->classId = $classId;
        $this->className = $className;
    }

    public function getTeacherId(): int
    {
        return $this->teacherId;
    }


    public function setTeacherId(int $teacherId): void
    {
        $this->teacherId = $teacherId;
    }

    public function getTeacherName(): string
    {
        return $this->teacherName;
    }


    public function setTeacherName(string $teacherName): void
    {
        $this->teacherName = $teacherName;
    }


    public function getClassId(): int
    {
        return $this->classId;
    }

    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): void
    {
        $this->className = $className;
    }

    public function createStudent(PDO $pdo)
    {
        $handle = $pdo->prepare('INSERT INTO student(firstName, lastName, email, class_id) VALUES (:firstName, :lastName, : email, :class_id)');
        $handle->bindValue('firstName', $this->getFirstName());
        $handle->bindValue('lastName', $this->getLastName());
        $handle->bindValue('email', $this->getEmail());
        $handle->bindValue('class_id', $this->getClassId());
        $handle->execute();
        $pdo->lastInsertId();
    }

    public function editStudent(PDO $pdo)
    {
        $handle = $pdo->prepare('UPDATE student SET firstName = :firstName, lastName = :lastName, email = : email, class_id = :class_id WHERE id = :id');
        $handle->bindValue('firstName', $this->getFirstName());
        $handle->bindValue('lastName', $this->getLastName());
        $handle->bindValue('email', $this->getEmail());
        $handle->bindValue('class_id', $this->getClassId());
        $handle->execute();
    }

    public function deleteStudent(PDO $pdo)
    {
        $handle = $pdo->prepare('DELETE FROM student WHERE id = :id');
        $handle->bindValue('id', $this->setId($_POST['id']));
        $handle->execute();
    }
}

