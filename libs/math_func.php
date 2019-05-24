<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of math_func
 *
 * @author user
 */
class math_func {

    function __construct() {
        
    }

    function prime_factorization($param) {
        $mresult = array();

        $sss = $param;
        for ($i = 2; $i <= $sss; $i++) {


            $times = 1;
            while (TRUE) {


                if ($param % pow($i, $times) == 0) {

                    $times++;
                } else {
                    if ($times == 1) {
                        
                    } else {
                        array_push($mresult, array($i, $times - 1));
                        $param = $param / pow($i, $times - 1);
                    }


                    break;
                }
            }
        }

        return $mresult;
    }

}
