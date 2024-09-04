<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\UserCategoryRepositoryInterface;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    protected $userCategoryRepository;

    public function __construct(UserCategoryRepositoryInterface $userCategoryRepository)
    {
        $this->userCategoryRepository = $userCategoryRepository;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $template = 'admin.user_category.index';

        $userCategories = $this->userCategoryRepository->all()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            });

        return view('admin.layout', compact('template', 'userCategories'));
    }

    public function create()
    {
        $template = 'admin.user_category.create';
        return view('admin.layout', compact('template'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users_categories',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
        ]);

        $this->userCategoryRepository->create($validated);

        return redirect()->route('admin.user_category.index')->with('success', 'Loại người dùng được tạo thành công.');
    }

    public function edit(int $id)
    {
        $userCategory = $this->userCategoryRepository->find($id);

        if (!$userCategory) {
            return redirect()->route('admin.user_category.index')->with('error', 'Loại người dùng không tồn tại.');
        }

        $template = 'admin.user_category.edit';
        return view('admin.layout', compact('template', 'userCategory'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users_categories,name,' . $id,
            'description' => 'nullable|string',
            'active' => 'required|boolean',
        ]);

        $updated = $this->userCategoryRepository->update($id, $validated);

        if (!$updated) {
            return redirect()->route('admin.user_category.index')->with('error', 'Cập nhật loại người dùng thất bại.');
        }

        return redirect()->route('admin.user_category.index')->with('success', 'Loại người dùng được cập nhật thành công.');
    }

    public function destroy(int $id)
    {
        $deleted = $this->userCategoryRepository->delete($id);

        if (!$deleted) {
            return redirect()->route('admin.user_category.index')->with('error', 'Xóa loại người dùng thất bại.');
        }

        return redirect()->route('admin.user_category.index')->with('success', 'Loại người dùng được xóa thành công.');
    }
}
