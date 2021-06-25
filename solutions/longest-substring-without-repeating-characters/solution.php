<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $longest = 0; // Length of longest substring.
        $current = 0; // Length of current substring.
        $start = 0;   // Starting position of current substring.
        $spottedChars = [];
        $length = strlen( $s );
        for ( $pos = 0; $pos < $length; ++$pos ) {
            // Check for duplicate character within our substring.
            if ( array_key_exists( $s[ $pos ], $spottedChars ) &&
                $spottedChars[ $s[ $pos ] ] >= $start ) {
                $start = $spottedChars[ $s[ $pos ] ] + 1;
                $current = $pos - $start;
            }
            $spottedChars[ $s[ $pos ] ] = $pos;
            ++$current;
            if ( $current > $longest ) {
                $longest = $current;
            }
        }
        return $longest;
    }
}
