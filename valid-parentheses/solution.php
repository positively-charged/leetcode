<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $leftParens = [];
        $length = strlen( $s );
        for ( $i = 0; $i < $length; ++$i ) {
            switch ( $s[ $i ] ) {
            case '(':
            case '[':
            case '{':
                array_push( $leftParens, $s[ $i ] );
                break;
            default:
                $expected = '(';
                switch ( $s[ $i ] ) {
                case ']': $expected = '['; break;
                case '}': $expected = '{'; break;
                default: break;
                }
                if ( $expected !== array_pop( $leftParens ) ) {
                    return false;
                }
                break;
            }
        }
        return empty( $leftParens );
    }
}

$s = new Solution();
var_dump( $s->isValid( "[" ) );
