<?php

namespace App\Usecases;

use Illuminate\Database\Eloquent\Model;


class Divide
{
    public function getDivideResult($query, $membersCount)
    {
        $roundI = count($query)/$membersCount;

        $teamByLevel = array(
            array('team_id' => 1, 'level' => '0'),
            array('team_id' => 2, 'level' => '0'),
            array('team_id' => 3, 'level' => '0')
        );

        for ($i=0; $i < $roundI; $i++) {
            for ($u=0; $u < $membersCount; $u++) {
                $roundU = $i * 3 + $u;
                $query[$roundU] ['team_id'] = $teamByLevel[$u] ['team_id'];
                $teamByLevel[$u] ['level'] += $query[$roundU] ['level'];
            }
            usort($teamByLevel, function($a, $b) {
                return $a["level"] - $b["level"];
            });
        }

        foreach ($query as $key => $value) {
            echo'<pre>';
            print_r("{$value['level']} . ':'");
            print_r($value['team_id']);
            echo'<pre>';
        }
    }
}