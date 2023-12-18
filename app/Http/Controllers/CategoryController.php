<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use App\Usecases\Divide;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'categories' => Category::paginate(5)
        ]);
    }

    public function show(Category $category)
    {
        return view('category.show', [
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
        Category::create(request()->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
        ]));
        
        return redirect('/');
    }

    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category)
    {
        $category->update($this->validateCategory($category));

        return redirect('/');

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }

    public function validateCategory(?Category $category = null): array
    {
        $category ??= new Category();

        return request()->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
        ]);
    }
}
