<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $pos = [ 0, 1, 2 ];
        $totalNums = count( $nums );
        $permutations = [];
        
        $src = 0;
        while ( $src < $totalNums ) {
            $j = 0;
            while ( $j < $totalNums - 1 ) {
                $dst = ( $src + $j + 1 ) % $totalNums;
printf( "%d %d\n", $src, $dst );
                $temp = $nums[ $src ];
                $nums[ $src ] = $nums[ $dst ];
                $nums[ $dst ] = $temp;
                $permutations[] = $nums;
                ++$j;
            }
            ++$src;
        }

        return $permutations;
    }
}

$s = new Solution();
var_dump( $s->permute( [ 1, 2, 3, 4 ] ) );

x = 6
