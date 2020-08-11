<?php
declare(strict_types=1);

class Student
{
    protected ?int $id;
    private string $name;
    private string $email;
    private ?int $class_id;

    public function __construct(?int $id, string $name, string $email, ?int $class_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->class_id = $class_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getClassId(): ?int
    {
        return $this->class_id;
    }

    public function setClassId(?int $class_id): void
    {
        $this->class_id = $class_id;
    }

    //create students
    public function createStudent(DatabaseConnection $data)
    {
        $handle = $data->connect()->prepare('INSERT INTO student(name, email, class_id) VALUES (:name, : email, :class_id)');
        $handle->bindValue('name', $this->getName());
        $handle->bindValue('email', $this->getEmail());
        $handle->bindValue('class_id', $this->getClassId());
        $handle->execute();
        $this->id = (int)$data->lastInsertId();
    }

    //save students
    public function saveStudent()
    {
        (empty($this->getId())) ? $this->createStudent(DatabaseConnection::connect()) : $this->editStudent(DatabaseConnection::connect());
    }

    //edit students
    public function editStudent(DatabaseConnection $data)
    {
        $handle = $data->connect()->prepare('UPDATE student SET name = :name, email = : email, class_id = :class_id WHERE id = :id');
        $handle->bindValue('name', $this->getName());
        $handle->bindValue('email', $this->getEmail());
        $handle->bindValue('class_id', $this->getClassId());
        $handle->bindValue('id', $this->getId());
        $handle->execute();
    }

    //delete students
    public function deleteStudent(DatabaseConnection $data)
    {
        $handle = $data->connect()->prepare('DELETE FROM student WHERE id = :id');
        $handle->bindValue('id', $this->getId());
        $handle->execute();
    }
}