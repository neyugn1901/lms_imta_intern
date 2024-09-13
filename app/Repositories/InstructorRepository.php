<?php

namespace App\Repositories;

use App\Models\Instructor;

class InstructorRepository implements InstructorRepositoryInterface
{
    protected $model;

    public function __construct(Instructor $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $instructor = $this->find($id);
        $instructor->update($data);
        return $instructor;
    }

    public function delete($id)
    {
        $instructor = $this->find($id);
        return $instructor->delete();
    }
}

