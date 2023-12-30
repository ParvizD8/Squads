<?php

namespace App\Usecases;

use Illuminate\Database\Eloquent\Model;


class Divide
{
    public function getDivideResult($members, $teamsCount)
    {
        $roundI = count($members)/$teamsCount;

        $teamByLevel = array(
            array('team_id' => 1, 'level' => '0'),
            array('team_id' => 2, 'level' => '0'),
            array('team_id' => 3, 'level' => '0'),
            array('team_id' => 4, 'level' => '0'),
            array('team_id' => 5, 'level' => '0')
        );

        for ($i=0; $i < $roundI; $i++) {
            for ($u=0; $u < $teamsCount; $u++) {
                $roundU = $i * 5 + $u;
                $members[$roundU] ['team_id'] = $teamByLevel[$u] ['team_id'];
                $teamByLevel[$u] ['level'] += $members[$roundU] ['level'];
            }
            usort($teamByLevel, function($a, $b) {
                return $a["level"] - $b["level"];
            });
        }

        foreach ($members as $key => $value) {
            echo'<pre>';
            print_r("{$value['level']} . ':'");
            print_r($value['team_id']);
            echo'<pre>';
        }
    }
}