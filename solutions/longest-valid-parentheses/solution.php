<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s) {
        $longest = 0;  // Longest length.
        $current = 0;  // Current length.
        $parents = []; // Stack of current lengths.
        $sLength = strlen( $s );
        for ( $i = 0; $i < $sLength; ++$i ) {
            if ( $s[ $i ] == '(' ) {
                array_push( $parents, $current );
                $current = 0;
            }
            else {
                $parent = array_pop( $parents );
                if ( $parent !== null ) {
                    // Plus two characters, '(' and ')'.
                    $current = $parent + $current + 2;
                    if ( $current > $longest ) {
                        $longest = $current;
                    }
                }
                else {
                    $current = 0;
                }
            }
        }
        return $longest;
    }
    
    /*
    function longestValidParentheses($s) {
        $longest = 0;
        $current = 0;
        $leftParenStarts = [];
        $sLength = strlen( $s );
        for ( $pos = 0; $pos < $sLength; ++$pos ) {
            if ( $s[ $pos ] == '(' ) {
                array_push( $pos );
            }
            else {
                $start = array_pop( $leftParenStarts );
                if ( $start !== null ) {
                    $length = $current + ( $pos - $start + 1 );
                    if ( $length > $longest ) {
                        $longest = $length;
                    }
                }
                else {
                    $current = 0;
                }
            }
        }
        return $longest;
    }*/
}
