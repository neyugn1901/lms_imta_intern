<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{
    protected $model;

    public function __construct(Course $course)
    {
        $this->model = $course;
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
        $course = $this->find($id);
        if ($course) {
            $course->update($data);
            return $course;
        }
        return null;
    }

    public function delete($id)
    {
        $course = $this->find($id);
        if ($course) {
            return $course->delete();
        }
        return false;
    }
}
