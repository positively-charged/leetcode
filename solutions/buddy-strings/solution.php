<?php

class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return Boolean
     */
    function buddyStrings($a, $b) {
        $i = strlen( $a ) - 1;
        if ( $i == strlen( $b ) - 1 ) {
            $mismatches = [];
            while ( $i >= 0 ) {
                if ( $a[ $i ] != $b[ $i ] ) {
                    array_push( $mismatches, $i );
                }
                --$i;
            }
            if ( count( $mismatches ) == 0 ) {
                $spotted = [];
                $i = strlen( $a ) - 1;
                while ( $i >= 0 ) {
                    if ( array_key_exists( $a[ $i ], $spotted ) ) {
                        return true;
                    }
                    $spotted[ $a[ $i ] ] = true;
                    --$i;
                }
            }
            else if ( count( $mismatches ) == 2 ) {
                list( $i, $j ) = $mismatches;
                return ( $a[ $i ] == $b[ $j ] &&
                    $a[ $j ] == $b[ $i ] );
                
            }
        }
        return false;
    }
}
