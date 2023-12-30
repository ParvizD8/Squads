<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use App\Usecases\Divide;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function __construct(private readonly Divide $divide) {}

    public function test(Member $member)
    {
        $request = array('category' => 1, 'count' => 5);

        // $result = Member::divide($request['category'])->get();

        $members = $member
                    ->where('category_id', 1)
                    ->where('active', 1)
                    ->orderBy('level','desc')
                    ->get();
        
        $this->divide->getDivideResult($members, $request['count']);
    }

    public function index(Category $category)
    {
        $members = Member::all()->where('category_id', $category->id);
        return view('team.index', [
            'members' => $members,
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('member.create');
    }

    public function store()
    {
        Member::create($this->validateTeam());

        return redirect('/');
    }

    public function edit(Member $member)
    {
        return view('member.edit', [
            'member' => $member
        ]);
    }

    public function update(Member $member)
    {
        $member->update($this->validateTeam($member));
        return redirect('/');

    }
    
    public function updateStatus(Member $member)
    {
        $member->update(request()->validate([
            'active' => 'required'
        ]));

        return back();
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return back();
    }

    public function validateTeam(?Member $member = null): array
    {
        $member ??= new Member();
        return request()->validate([
            'name' => ['required', Rule::unique('members', 'name')],
            'level' => 'required|numeric|between:1,10',
            'category_id' => 'required'
        ]);
    }
}
