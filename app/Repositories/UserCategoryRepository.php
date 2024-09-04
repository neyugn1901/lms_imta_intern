<?php

namespace App\Repositories;

use App\Models\UserCategory;

class UserCategoryRepository implements UserCategoryRepositoryInterface
{
    protected $model;

    public function __construct(UserCategory $userCategory)
    {
        $this->model = $userCategory;
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
        $userCategory = $this->find($id);
        if ($userCategory) {
            $userCategory->update($data);
            return $userCategory;
        }
        return null;
    }

    public function delete($id)
    {
        $userCategory = $this->find($id);
        if ($userCategory) {
            return $userCategory->delete();
        }
        return false;
    }
}
