<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function index(Category $category)
    {
        dd($category);
        $teams = Team::all()->where('category_id', $category->id);
        return view('team.index', [
            'teams' => $teams,
            'category' => $category
        ]);
    }

    public function show(TeamController $teamController)
    {
        return view('category.show', [
            'teamController' => $teamController
        ]);
    }

    public function create()
    {
        return view('team.create');
    }

    public function store()
    {
        Team::create($this->validateTeam());
        
        return redirect('/');
    }

    public function edit(Team $team)
    {
        return view('team.edit', [
            'team' => $team
        ]);
    }

    public function update(Team $team)
    {
        $team->update($this->validateTeam($team));

        return redirect('/');

    }

    public function destroy(Team $team)
    {
        $team->delete();

        return back();
    }

    public function validateTeam(?Team $team = null): array
    {
        $team ??= new team();

        return request()->validate([
            'name' => ['required', Rule::unique('teams', 'name')],
            'category_id' => 'required'
        ]);
    }
}
