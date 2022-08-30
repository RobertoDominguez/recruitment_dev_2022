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
        $words=[];

        for ($i = 1; $i <= strlen($t); $i = $i + 1) {
            for ($j = 0; $j <= strlen($t) - ($i); $j = $j + 1) {
                $s = substr($t, $j, $i);
                if (!in_array($s,$words)){
                    $x = $this->f($s, $t)*strlen($s);
                    if ($max < $x) {
                        $max = $x;
                    }
                    $words[]=$s;
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
