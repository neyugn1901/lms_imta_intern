<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;

use App\Repositories\InstructorRepositoryInterface;

class HomeController extends Controller
{
    protected $categoryRepository;
    protected $courseRepository;
    protected $instructorRepository;
    

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        CourseRepositoryInterface $courseRepository,
        InstructorRepositoryInterface $instructorRepository,
       
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->courseRepository = $courseRepository;
        $this->instructorRepository = $instructorRepository;
        
    }

    public function index()
    {    
        $categories = $this->categoryRepository->all();
        $courses = $this->courseRepository->all();
        $instructors = $this->instructorRepository->all();
        

        $template = 'homepage.home.index';
        return view('homepage.layout', compact('template', 'categories', 'courses', 'instructors'));
    }

    public function showDashboard()
    {
        $student = Auth::student(); // Lấy thông tin người dùng đã đăng nhập
        return view('home.index', compact('template','student'));
    }

}


