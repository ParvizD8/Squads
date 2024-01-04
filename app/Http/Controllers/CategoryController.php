<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use App\Models\Team;
use App\Models\Toss;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;

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
        $teamsWithMembers = Team::with(['members'])->where('category_id', $category->id)->get();

        return view('category.show', [
            'category' => $category,
            'teamsWithMembers' => $teamsWithMembers,
            'tossExists' => Toss::where('category_id', $category->id)->exists()

        ]);
    }

    public function showTeams(Category $category)
    {
        $teams = Team::where('category_id', $category->id)->paginate(5);
        return view('category.show-teams', [
            'teams' => $teams,
            'category' => $category
        ]);
    }

    public function showMembers(Category $category)
    {
        $members = Member::where('category_id', $category->id)->paginate(15);
        return view('category.show-members', [
            'members' => $members,
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
        Category::create($this->validateCategory());

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
