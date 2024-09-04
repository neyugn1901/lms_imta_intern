<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $categoryRepository;

    public function __construct(CourseRepositoryInterface $courseRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $template = 'admin.courses.index';
    
        $courses = $this->courseRepository->all()
            ->when($search, function ($query, $search) {
                return $query->where('course_name', 'like', "%{$search}%");
            });
    
        return view('admin.layout', compact('template', 'courses'));
    }
    
    public function create()
    {
        $template = 'admin.courses.create';
        $categories = $this->categoryRepository->all();
        return view('admin.layout', compact('template', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'level' => 'required|in:beginner,intermediate,advanced',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
            'video' => 'nullable|file|mimes:mp4,mov,avi,flv|max:51200',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('image', $imageName, 'public');
            $validated['image'] = $imagePath;
        }

        if ($request->hasFile('video')) {
            $videoName = Str::random(10) . '.' . $request->file('video')->getClientOriginalExtension();
            $videoPath = $request->file('video')->storeAs('video', $videoName, 'public');
            $validated['video'] = $videoPath;
        }

        if ($request->hasFile('file')) {
            $fileName = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs('file', $fileName, 'public');
            $validated['file'] = $filePath;
        }

        $this->courseRepository->create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Khóa học được tạo thành công.');
    }

    public function edit(int $id)
    {
        $course = $this->courseRepository->find($id);
        $categories = $this->categoryRepository->all();

        if (!$course) {
            return redirect()->route('admin.courses.index')->with('error', 'Khóa học không tồn tại.');
        }

        $template = 'admin.courses.edit';
        return view('admin.layout', compact('template', 'course', 'categories'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'level' => 'required|in:beginner,intermediate,advanced',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
            'video' => 'nullable|file|mimes:mp4,mov,avi,flv|max:51200',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $course = $this->courseRepository->find($id);

        if (!$course) {
            return redirect()->route('admin.courses.index')->with('error', 'Khóa học không tồn tại.');
        }

        if ($request->hasFile('image')) {
            if ($course->image && Storage::disk('public')->exists($course->image)) {
                Storage::disk('public')->delete($course->image);
            }
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('image', $imageName, 'public');
            $validated['image'] = $imagePath;
        }

        if ($request->hasFile('video')) {
            if ($course->video && Storage::disk('public')->exists($course->video)) {
                Storage::disk('public')->delete($course->video);
            }
            $videoName = Str::random(10) . '.' . $request->file('video')->getClientOriginalExtension();
            $videoPath = $request->file('video')->storeAs('video', $videoName, 'public');
            $validated['video'] = $videoPath;
        }

        if ($request->hasFile('file')) {
            if ($course->file && Storage::disk('public')->exists($course->file)) {
                Storage::disk('public')->delete($course->file);
            }
            $fileName = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs('file', $fileName, 'public');
            $validated['file'] = $filePath;
        }

        $updated = $this->courseRepository->update($id, $validated);

        if (!$updated) {
            return redirect()->route('admin.courses.index')->with('error', 'Không thể cập nhật khóa học.');
        }

        return redirect()->route('admin.courses.index')->with('success', 'Khóa học được cập nhật thành công.');
    }

    public function destroy(int $id)
    {
        $course = $this->courseRepository->find($id);

        if (!$course) {
            return redirect()->route('admin.courses.index')->with('error', 'Khóa học không tồn tại.');
        }

        if ($course->image && Storage::disk('public')->exists($course->image)) {
            Storage::disk('public')->delete($course->image);
        }
        if ($course->video && Storage::disk('public')->exists($course->video)) {
            Storage::disk('public')->delete($course->video);
        }
        if ($course->file && Storage::disk('public')->exists($course->file)) {
            Storage::disk('public')->delete($course->file);
        }

        $deleted = $this->courseRepository->delete($id);

        if (!$deleted) {
            return redirect()->route('admin.courses.index')->with('error', 'Không thể xóa khóa học.');
        }

        return redirect()->route('admin.courses.index')->with('success', 'Khóa học được xóa thành công.');
    }

    public function show(int $id)
    {
        $course = $this->courseRepository->find($id);

        if (!$course) {
            return redirect()->route('admin.courses.index')->with('error', 'Khóa học không tồn tại.');
        }

        $template = 'admin.courses.show';
        return view('admin.layout', compact('template', 'course'));
    }
}
