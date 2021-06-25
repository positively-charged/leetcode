<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function thirdMax($nums) {
        rsort( $nums );
        $length = count( $nums );
        $prev = $nums[ 0 ];
        $maximum = 1;
        for ( $i = 1; $i < $length; ++$i ) {
           if ( $nums[ $i ] != $prev ) {
               $prev = $nums[ $i ];
               ++$maximum;
               if ( $maximum == 3 ) {
                   return $prev;
               }
           } 
        }
        return $nums[ 0 ];
    }
}

$s = new Solution();
var_dump( $s->thirdMax( [ 2, 3, 3, 2, 1 ] ) );
