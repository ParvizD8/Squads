<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member;
use App\Models\Team;
use App\Models\Toss;
use App\Usecases\Divide;
use Illuminate\Support\Facades\Exception;

class TossController extends Controller
{
    public function __construct(
        private readonly Divide $divide,
        private readonly Member $member,
        private readonly Team $team,
        private Toss $toss
    ) {
    }

    public function create(Category $category)
    {
        $tossExists = $this->toss->where('category_id', $category->id)->doesntExist();
        $tossCount = $this->toss->where('category_id', $category->id)->count();
        $memberCount = $this->member->where('category_id', $category->id)->count();

        if ($tossExists) {
            $this->creatingRecord($category);
        }
        
        elseif ($memberCount > $tossCount) {
            $this->toss->where('category_id', $category->id)->delete();

            $this->creatingRecord($category);
        }

        else
            throw new \Exception('Ошибка валидации: для перераспределения необходимо добавить новых участников');

        return back();
    }

    protected function tossResult($category)
    {
        $categoryMembers = $this->member
            ->where('category_id', $category->id)
            ->where('active', 1)
            ->orderBy('level', 'desc')
            ->get();

        $categoryTeams = $this->team
            ->where('category_id', $category->id)
            ->get()
            ->toArray();

        return $this->divide->getDivideResult($categoryMembers, $categoryTeams);
    }

    protected function creatingRecord($category)
    {
        $tossResult = $this->tossResult($category);

        foreach ($tossResult as $value) {
            $this->toss->create([
                'category_id' => $value['category_id'],
                'member_id' => $value['id'],
                'team_id' => $value['team_id']
            ]);
        }
    }
}
