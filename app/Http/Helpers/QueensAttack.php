<?php


class QueensAttack
{

    function __construct() {
        
    }

    public static function queensAttack($n,$k,$rq,$cq,$obstacles)
    {
        //adecuando las entradas
        $rq = $n - $rq;
        $cq = $cq - 1;
        for ($i = 0; $i < $k; $i = $i + 1) {
            $obstacles[$i][0] = $n - $obstacles[$i][0];
            $obstacles[$i][1] = $obstacles[$i][1] - 1;
        }

        $count = 0;
        $board = [];


        //Fill the board
        for ($i = 0; $i < $n; $i = $i + 1) {
            for ($j = 0; $j < $n; $j = $j + 1) {
                $board[$i][$j] = 0;
                for ($l = 0; $l < $k; $l = $l + 1) {
                    if ($obstacles[$l][0] == $i && $obstacles[$l][1] == $j) {
                        $board[$i][$j] = 1;
                    }
                }
            }
        }

        //Analyze the obstacles on the board
        //To Up
        $stop = false;
        for ($i = $rq - 1; $i >= 0; $i = $i - 1) {
            if (!$stop) {
                if ($board[$i][$cq] == 1) {
                    $stop = true;
                } else {
                    $count = $count + 1;
                }
            }
        }

        //To Down
        $stop = false;
        for ($i = $rq + 1; $i < $n; $i = $i + 1) {
            if (!$stop) {
                if ($board[$i][$cq] == 1) {
                    $stop = true;
                } else {
                    $count = $count + 1;
                }
            }
        }

        //To Left
        $stop = false;
        for ($i = $cq - 1; $i >= 0; $i = $i - 1) {
            if (!$stop) {
                if ($board[$rq][$i] == 1) {
                    $stop = true;
                } else {
                    $count = $count + 1;
                }
            }
        }

        //To Right
        $stop = false;
        for ($i = $cq + 1; $i < $n; $i = $i + 1) {
            if (!$stop) {
                if ($board[$rq][$i] == 1) {
                    $stop = true;
                } else {
                    $count = $count + 1;
                }
            }
        }

        //To Up Left
        $stop = false;
        for ($i = $rq - 1; $i >= 0; $i = $i - 1) {
            if (!$stop && $cq - 1 >= 0) {
                if ($board[$i][$cq - $i] == 1) {
                    $stop = true;
                } else {
                    $count = $count + 1;
                }
            }
        }

        //To Up Right
        $stop = false;
        for ($i = $rq - 1; $i >= 0; $i = $i - 1) {
            if (!$stop && $cq + 1 < $n) {
                if ($board[$i][$cq + $i] == 1) {
                    $stop = true;
                } else {
                    $count = $count + 1;
                }
            }
        }

        //To Down Left
        $stop = false;
        $j = 1;
        for ($i = $rq + 1; $i < $n; $i = $i + 1) {
            if (!$stop && $cq - $j >= 0) {
                if ($board[$i][$cq - $j] == 1) {
                    $stop = true;
                } else {
                    $count = $count + 1;
                }
            }
            $j = $j + 1;
        }

        //To Down Right
        $stop = false;
        $j = 1;
        for ($i = $rq + 1; $i < $n; $i = $i + 1) {
            if (!$stop && $cq + $j < $n) {
                if ($board[$i][$cq + $j] == 1) {
                    $stop = true;
                } else {
                    $count = $count + 1;
                }
            }
            $j = $j + 1;
        }

        return $count;
    }
}
