<?php

namespace App\Usecases;

use Hamcrest\Arrays\IsArray;
use Illuminate\Database\Eloquent\Model;

class Divide
{
    public function getDivideResult($members, $teams)
    {
        $countOfTeams = count($teams);

        foreach ($teams as &$item) {
            $item['level'] = '0';
        }

        $roundI = intval(count($members)/$countOfTeams);

        for ($i=0; $i < $roundI; $i++) {
            for ($u=0; $u < $countOfTeams; $u++) {
                $roundU = $i * $countOfTeams + $u;
                $members[$roundU] ['team_id'] = $teams[$u] ['id'];
                $teams[$u] ['level'] += $members[$roundU] ['level'];
            }
            usort($teams, function($a, $b) {
                return $a["level"] - $b["level"];
            });
        }
        return $members;
    }
}