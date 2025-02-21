<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\InstructorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    protected $instructorRepository;

    public function __construct(InstructorRepositoryInterface $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;
    }

    public function index()
    {
        $template = 'admin.instructor.index';
        $instructors = $this->instructorRepository->all(); 
        
        return view('admin.layout', compact('template', 'instructors'));
    }

    public function create()
    {
        $template = 'admin.instructor.create';
        return view('admin.layout', compact('template'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:instructors',
            'fullname' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'sex' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:instructors',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4128',
        ]);

        
        $validated['password'] = Hash::make($request->password);

        
        $validated['image'] = $this->handleImageUpload($request);

        
        $this->instructorRepository->create($validated);

        return redirect()->route('admin.instructor.index')->with('success', 'Giảng viên được tạo thành công.');
    }

    public function edit($id)
    {
        
        $instructor = $this->instructorRepository->find($id);
        if (!$instructor) {
            return redirect()->route('admin.instructor.index')->with('error', 'Giảng viên không tồn tại.');
        }

        $template = 'admin.instructor.edit';
        return view('admin.layout', compact('template', 'instructor'));
    }

    public function update(Request $request, $id)
    {
        
        $instructor = $this->instructorRepository->find($id);
        if (!$instructor) {
            return redirect()->route('admin.instructor.index')->with('error', 'Giảng viên không tồn tại.');
        }

        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:instructors,username,' . $id,
            'fullname' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'sex' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:instructors,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4128',
        ]);

        
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        
        $validated['image'] = $this->handleImageUpload($request, $instructor->image);

        
        $this->instructorRepository->update($id, $validated);

        return redirect()->route('admin.instructor.index')->with('success', 'Giảng viên được cập nhật thành công.');
    }

    public function destroy($id)
    {
       
        $this->instructorRepository->delete($id);

        return redirect()->route('admin.instructor.index')->with('success', 'Giảng viên được xóa thành công.');
    }

    public function show($id)
    {
       
        $instructor = $this->instructorRepository->find($id);
        if (!$instructor) {
            return redirect()->route('admin.instructor.index')->with('error', 'Giảng viên không tồn tại.');
        }

        $template = 'admin.instructor.show';
        return view('admin.layout', compact('template', 'instructor'));
    }

    
    protected function handleImageUpload(Request $request, $currentImagePath = null)
    {
        if ($request->hasFile('image')) {
            
            if ($currentImagePath) {
                Storage::disk('public')->delete($currentImagePath);
            }

            
            $image = $request->file('image');
            return $image->store('instructor/image', 'public');
        }

        return $currentImagePath;
    }
}
