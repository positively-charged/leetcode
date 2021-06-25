<?php

class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        $i = 0;
        $prev = 0;
        $length = count( $flowerbed );
        while ( $i < $length && $n > 0 ) {
            if ( $prev == 0 && $flowerbed[ $i ] == 0 &&
                ( $i + 1 == $length || $flowerbed[ $i + 1 ] == 0 ) ) {
                --$n;
                ++$i;
            }
            else {
                $prev = $flowerbed[ $i ];
            }
            ++$i;
        }
        return ( $n <= 0 );
    }
}

$s = new  Solution();
var_dump( explode( '1', implode( '',[0,1,0,0,1]

 ) ) );
