<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $template = 'admin.category.index'; 
    
        
        $categories = $this->categoryRepository->all()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            });
    
        return view('admin.layout', compact('template', 'categories'));
    }

 
    public function create()
    {
        $template = 'admin.category.create'; 
        return view('admin.layout', compact('template'));
    }
    

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
        ]);

        $this->categoryRepository->create($validated); 

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }

   
    public function edit(int $id)
    {
        $category = $this->categoryRepository->find($id); 

        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Category not found.');
        }

        $template = 'admin.category.edit'; 
        return view('admin.layout', compact('template', 'category'));
    }

 
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
            'active' => 'required|boolean',
        ]);

        $updated = $this->categoryRepository->update($id, $validated); 

        if (!$updated) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to update category.');
        }

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

   
    public function destroy(int $id)
    {
        $deleted = $this->categoryRepository->delete($id); 

        if (!$deleted) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to delete category.');
        }

        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
    public function showCategories()
    {
        $template = 'homepage.home.category';
        $categories = $this->categoryRepository->all(); 
     
        return view('homepage.layout', compact('template', 'categories')); 
    }
    
    


}
