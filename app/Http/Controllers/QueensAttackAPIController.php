<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QueensAttack;

class QueensAttackAPIController extends Controller
{
    public function queensAttack(Request $request)
    {

        $n = $request->n;
        $k = $request->k;
        $rq = $request->rq;
        $cq = $request->cq;
        $obstacles = $request->obstacles;

        return QueensAttack::queensAttack($n,$k,$rq,$cq,$obstacles);
    }
}
