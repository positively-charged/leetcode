<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        $zeros = 0;
        $ones = 0;
        $twos = 0;
        foreach ( $nums as $num ) {
            switch ( $num ) {
            case 0: ++$zeros; break;
            case 1: ++$ones; break;
            case 2: ++$twos; break;
            }
        }
        $i = 0;
        while ( $zeros > 0 ) {
            $nums[ $i ] = 0;
            --$zeros;
            ++$i;
        }
        while ( $ones > 0 ) {
            $nums[ $i ] = 1;
            --$ones;
            ++$i;
        }
        while ( $twos > 0 ) {
            $nums[ $i ] = 2;
            --$twos;
            ++$i;
        }
    }
}

//for ( $i = 0; $i < 1000000; ++$i ) {
    $nums = [2,0,2,1,1,0];
    //$nums = [0,1,1,1,2];
    //var_dump( $nums );
    $solution = new Solution();
    $solution->sortColors( $nums );
    var_dump( $nums );
//}
