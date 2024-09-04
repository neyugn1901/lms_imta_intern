<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find($id): ?Category
    {
        return $this->model->find($id);
    }

    public function create(array $data): Category
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): ?Category
    {
        $category = $this->find($id);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    public function delete($id): bool
    {
        $category = $this->find($id);
        if ($category) {
            return $category->delete();
        }
        return false;
    }
}
