<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Usecases\Divide;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function test(Member $member)
    {
        $request = array('category' => 1, 'count' => 3);

        // $result = Member::divide($request['category'])->get();

        $query = $member
                    ->where('category_id', 1)
                    ->where('active', 1)
                    ->orderBy('level','desc')
                    ->get();
        
        (new Divide())->getDivideResult($query, $request['count']);
    }
}
