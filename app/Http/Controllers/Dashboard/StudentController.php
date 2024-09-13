<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $template = 'admin.student.index';
        $students = $this->studentRepository->all();
        return view('admin.layout', compact('template', 'students'));
    }

    public function create()
    {
        $template = 'admin.student.create';
        return view('admin.layout', compact('template'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:students',
            'fullname' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'sex' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4128',
            'level' => 'required|in:beginner,intermediate,advanced',
        ]);

        $validated['password'] = Hash::make($request->password);

        $validated['image'] = $this->handleImageUpload($request);

        $this->studentRepository->create($validated);

        return redirect()->route('admin.student.index')->with('success', 'Sinh viên được tạo thành công.');
    }

    public function edit($id)
    {
        $student = $this->studentRepository->find($id);
        if (!$student) {
            return redirect()->route('admin.student.index')->with('error', 'Sinh viên không tồn tại.');
        }

        $template = 'admin.student.edit';
        return view('admin.layout', compact('template', 'student'));
    }

    public function update(Request $request, $id)
    {
        $student = $this->studentRepository->find($id);
        if (!$student) {
            return redirect()->route('admin.student.index')->with('error', 'Sinh viên không tồn tại.');
        }

        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:students,username,' . $id,
            'fullname' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'sex' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:students,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4128',
            'level' => 'required|in:beginner,intermediate,advanced',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $validated['image'] = $this->handleImageUpload($request, $student->image);

        $this->studentRepository->update($id, $validated);

        return redirect()->route('admin.student.index')->with('success', 'Sinh viên được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $student = $this->studentRepository->find($id);
        if ($student && $student->image) {
            Storage::disk('public')->delete($student->image);
        }

        $this->studentRepository->delete($id);

        return redirect()->route('admin.student.index')->with('success', 'Sinh viên được xóa thành công.');
    }

    public function show($id)
    {
        $student = $this->studentRepository->find($id);
        if (!$student) {
            return redirect()->route('admin.student.index')->with('error', 'Sinh viên không tồn tại.');
        }

        $template = 'admin.student.show';
        return view('admin.layout', compact('template', 'student'));
    }

    protected function handleImageUpload(Request $request, $currentImagePath = null)
    {
        if ($request->hasFile('image')) {
            if ($currentImagePath) {
                Storage::disk('public')->delete($currentImagePath);
            }

            $image = $request->file('image');
            return $image->store('student/image', 'public');
        }
        return $currentImagePath;
    }
}
