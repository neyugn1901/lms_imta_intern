<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserCategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userRepository;
    protected $userCategoryRepository;

    public function __construct(UserRepositoryInterface $userRepository, UserCategoryRepositoryInterface $userCategoryRepository)
    {
        $this->userRepository = $userRepository;
        $this->userCategoryRepository = $userCategoryRepository;
    }

    public function index()
    {
        $template = 'admin.users.index';
        $users = $this->userRepository->all();
        $userCategories = $this->userCategoryRepository->all();
        return view('admin.layout', compact('template', 'users', 'userCategories'));
    }

    public function create()
    {
        $template = 'admin.users.create';
        $userCategories = $this->userCategoryRepository->all();
        return view('admin.layout', compact('template', 'userCategories'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'fullname' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'sex' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4128',
            'users_category_id' => 'nullable|exists:users_categories,id',
        ]);

        $validated['password'] = Hash::make($request->password);

        $validated['image'] = $this->handleImageUpload($request);

        $this->userRepository->create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Người dùng được tạo thành công.');
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'Người dùng không tồn tại.');
        }

        $template = 'admin.users.edit';
        $userCategories = $this->userCategoryRepository->all();
        return view('admin.layout', compact('template', 'user', 'userCategories'));
    }

    public function update(Request $request, $id)
{
    // Lấy thông tin người dùng
    $user = $this->userRepository->find($id);
    if (!$user) {
        return redirect()->route('admin.users.index')->with('error', 'Người dùng không tồn tại.');
    }

    $validated = $request->validate([
        'username' => 'required|string|max:50|unique:users,username,' . $id,
        'fullname' => 'nullable|string|max:100',
        'phone' => 'nullable|string|max:20',
        'dob' => 'nullable|date',
        'address' => 'nullable|string|max:255',
        'sex' => 'nullable|string',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8|confirmed',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4128',
        'users_category_id' => 'nullable|exists:users_categories,id',
    ]);

    // Nếu password không rỗng thì mã hóa
    if ($request->filled('password')) {
        $validated['password'] = Hash::make($request->password);
    }

    // Xử lý upload ảnh và thay thế ảnh cũ (nếu có)
    $validated['image'] = $this->handleImageUpload($request, $user->image);

    // Cập nhật thông tin người dùng
    $updated = $this->userRepository->update($id, $validated);

    return redirect()->route('admin.users.index')->with('success', 'Người dùng được cập nhật thành công.');
}

    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return redirect()->route('admin.users.index')->with('success', 'Người dùng được xóa thành công.');
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'Người dùng không tồn tại.');
        }

        $template = 'admin.users.show';
        return view('admin.layout', compact('template', 'user'));
    }

    protected function handleImageUpload(Request $request, $currentImagePath = null)
    {
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($currentImagePath) {
                Storage::disk('public')->delete($currentImagePath);
            }

            $image = $request->file('image');
            return $image->store('user/image', 'public');
        }
        return $currentImagePath;
    }
    
}
