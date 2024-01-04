<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function show(Team $team)
    {
        $membersWithTeam = Team::with('members')->where('id', $team->id)->paginate(5);

        return view('team.show', [
            'membersWithTeam' => $membersWithTeam
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

    protected function validateTeam(?Team $team = null): array
    {
        $team ??= new team();

        return request()->validate([
            'name' => ['required', Rule::unique('teams', 'name')],
            'category_id' => 'required'
        ]);
    }
}
