<?php

class Solution {

    /**
     * @param Integer $columnNumber
     * @return String
     */
    function convertToTitle($columnNumber) {
        $result = [];
        $startCode = ord( 'A' );
        while ( $columnNumber > 0 ) {
            $digit = chr( $startCode + ( $columnNumber - 1 ) % 26 );
            array_unshift( $result, $digit );
            $columnNumber = intdiv( $columnNumber - 1, 26 );
        }
        return implode( '', $result );
    }
}

$s = new Solution();
var_dump( $s->convertToTitle(  28 ) );
