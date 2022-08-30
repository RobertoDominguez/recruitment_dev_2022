<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StringValueController extends Controller
{
    public function stringValue(Request $request)
    {

        $t = $request->t;
        $max = 0;
        $x = 0;
        for ($i = 1; $i <= strlen($t); $i = $i + 1) {
            for ($j = 0; $j <= strlen($t) - ($i); $j = $j + 1) {
                $s = substr($t, $j, $i);
                $x = $this->f($s, $t);
                if ($max < $x*strlen($s)) {
                    $max = $x*strlen($s);
                }
            }
        }
        return $max;
    }

    public function f($s, $t)
    {
        $count = 0;
        $len=strlen($s);

        for ($i = 0; $i < strlen($t); $i = $i + 1) {
            if ($s == substr($t, $i, $len)) {
                $count=$count+1;
            }
        }

        return $count;
    }
}
