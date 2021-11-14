<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->with('childCategories.childCategories')
            ->get();
        return view('admin.category-index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->with('childCategories')
            ->get();
        return view('admin.category_add-index', compact('categories'));
    }


    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated() + ['slug' => Str::slug($request->title)]);
        return redirect()->route('master.category.index')->with('status', 'Новая категория успешно добавлена');
    }


    public function show(Category $category)
    {
        $category->load('childCategories.childCategories', 'parentCategory');
        return view('admin.admin-category_show', compact('category'));
    }


    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')
            ->with('childCategories')
            ->get();
        return view('admin.category-edit', compact('category', 'categories'));
    }


    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated() + ['slug' => Str::slug($request->title)]);
        return redirect()->route('master.category.index')->with('status', "Категория $category->title успешно обновлена");
    }


    public function destroy(Category $category)
    {
        if ($category->childCategories->count() == 0 && $category->products->count() == 0) {
            $category->delete();
            return redirect()->route('master.category.index')->with('status', "Категория $category->title успешно удалена");
        } else {
            return back()->with('status', 'Данную категорию нельзя удалить, так как в ней есть вложенности');
        }


    }
}

