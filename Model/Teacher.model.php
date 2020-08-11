<?php
declare(strict_types=1);

class Teacher extends Student
{
    //create teachers
    public function createTeacher(DatabaseConnection $data)
    {
        $handle = $data->connect()->prepare('INSERT INTO teacher(name, email) VALUES (:name, : email)');
        $handle->bindValue('name', $this->getName());
        $handle->bindValue('email', $this->getEmail());
        $handle->execute();
        $this->id = (int)$data->lastInsertId();
    }

    //save teachers
    public function saveTeacher()
    {
        (empty($this->getId())) ? $this->createTeacher(DatabaseConnection::connect()) : $this->editTeacher(DatabaseConnection::connect());
    }

    //edit teachers
    public function editTeacher(DatabaseConnection $data)
    {
        $handle = $data->connect()->prepare('UPDATE teacher SET name = :name, email = : email WHERE id = :id');
        $handle->bindValue('name', $this->getName());
        $handle->bindValue('email', $this->getEmail());
        $handle->bindValue('id', $this->getId());
        $handle->execute();
    }

    //delete teachers
    public function deleteTeacher(DatabaseConnection $data)
    {
        $handle = $data->connect()->prepare('DELETE FROM teacher WHERE id = :id');
        $handle->bindValue('id', $this->getId());
        $handle->execute();
    }
}