<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public static function twoSum($nums, $target) {
        $needed = [];
        $length = count( $nums );
        for ( $i = 0; $i < $length; ++$i ) {
            $needed[ $target - $nums[ $i ] ] = $i; 
        }
        for ( $j = 0; $j < $length; ++$j ) {
            if ( isset( $needed[ $nums[ $j ] ] ) &&
                $j != $needed[ $nums[ $j ] ] ) {
                return [ $needed[ $nums[ $j ] ], $j ];
            }
        }
/*
        $length = count( $nums );
        for ( $i = 0; $i < $length; ++$i ) {
            if ( ( $target >= 0 && $nums[ $i ] <= $target ) ||
                ( $target < 0 && $nums[ $i ] > $target ) ) {
                for ( $j = $i + 1; $j < $length; ++$j ) {
                    if ( $nums[ $i ] + $nums[ $j ] == $target ) {
                        return [ $i, $j ];
                    }
                }
            }
        }
*/
    }

    public static function twoSum_Original($nums, $target) {
        $below_target = [];
        $length = count( $nums );
        for ( $i = 0; $i < $length; ++$i ) {
            if ( $nums[ $i ] < $target ) {
                $below_target[] = $nums[ $i ];
            }
        }
        sort( $nums );
        
print_r( $nums );
        for ( $i = 0; $i < count( $nums ); ++$i ) {
            for ( $j = $i + 1; $j < count( $nums ); ++$j ) {
                if ( $nums[ $i ] + $nums[ $j ] == $target ) {
                    return [ $i, $j ];
                }
            }
        }   
    }
}

var_dump( Solution::twoSum( [2,7,11,15], 9 ) );
var_dump( Solution::twoSum( [7,11,15,2], 9 ) );
var_dump( Solution::twoSum( [3,2,4], 6 ) );
var_dump( Solution::twoSum( [0,4,3,0], 0 ) );
var_dump( Solution::twoSum( [-1,-2,-3,-4,-5], -8 ) );
var_dump( Solution::twoSum( [-3,4,3,90], 0 ) );
var_dump( Solution::twoSum( [0], 0 ) );
