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
    
        $categories = $this->categoryRepository->all();
        return view('admin.layout', compact('template', 'courses', 'categories'));
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
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:9128',
        ]);

        $validated['image'] = $this->handleImageUpload($request);
        $validated['video'] = $this->handleVideoUpload($request);
        $validated['file'] = $this->handleFileUpload($request);

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
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:9128',
        ]);

        $course = $this->courseRepository->find($id);

        if (!$course) {
            return redirect()->route('admin.courses.index')->with('error', 'Khóa học không tồn tại.');
        }

        $validated['image'] = $this->handleImageUpload($request, $course->image);
        $validated['video'] = $this->handleVideoUpload($request, $course->video);
        $validated['file'] = $this->handleFileUpload($request, $course->file);

        $updated = $this->courseRepository->update($id, $validated);

        if (!$updated) {
            return redirect()->route('admin.courses.index')->with('error', 'Không thể cập nhật khóa học.');
        }

        return redirect()->route('admin.courses.index')->with('success', 'Khóa học được cập nhật thành công.');
    }

    public function destroy(int $id)
    {
        $this->courseRepository->delete($id);

        return redirect()->route('admin.courses.index')->with('success', 'Khoá học được xóa thành công.');
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
    
    protected function handleImageUpload(Request $request, $currentImagePath = null)
    {
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($currentImagePath) {
                Storage::disk('public')->delete($currentImagePath);
            }

            $image = $request->file('image');
            return $image->store('course/image', 'public');
        }
        return $currentImagePath;
    }
    protected function handleVideoUpload(Request $request, $currentVideoPath = null)
    {
        if ($request->hasFile('video')) {
            // Xóa ảnh cũ nếu có
            if ($currentVideoPath) {
                Storage::disk('public')->delete($currentVideoPath);
            }

            $video = $request->file('video');
            return $video->store('course/video', 'public');
        }
        return $currentVideoPath;
    }
    protected function handleFileUpload(Request $request, $currentFilePath = null)
    {
        if ($request->hasFile('file')) {
            // Xóa ảnh cũ nếu có
            if ($currentFilePath) {
                Storage::disk('file')->delete($currentFilePath);
            }

            $file = $request->file('file');
            return $file->store('course/file', 'public');
        }
        return $currentFilePath;
    }

}
