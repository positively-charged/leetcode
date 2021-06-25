<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s) {
        $pos = 0;
        $length = strlen( $s );
        if ( $pos >= $length ) {
            return false;
        }
        
        // Sign.
        switch ( $s[ $pos ] ) {
        case '+':
        case '-':
            ++$pos;
            break;
        default:
            break;
        }
        
        // Whole part.
        $wholeLength = 0;
        while ( $pos < $length && ctype_digit( $s[ $pos ] ) ) {
            ++$wholeLength;
            ++$pos;
        }
        
        // Fractional part.
        if ( $pos < $length && $s[ $pos ] == '.' ) {
            ++$pos;
            $fractionLength = 0;
            while ( $pos < $length && ctype_digit( $s[ $pos ] ) ) {
                ++$fractionLength;
                ++$pos;
            }
            if ( ! ( $fractionLength > 0 || $wholeLength > 0 ) ) {
                return false;
            }
        }
        else {
            if ( ! ( $wholeLength > 0 ) ) {
                return false;
            }
        }
        
        // Exponent part.
        if ( $pos < $length ) {
            switch ( $s[ $pos ] ) {
            case 'e':
            case 'E':
                ++$pos;
                if ( $pos >= $length ) {
                    return false;
                }
                switch ( $s[ $pos ] ) {
                case '+':
                case '-':
                    ++$pos;
                    if ( $pos >= $length ) {
                        return false;
                    }
                    break;
                default:
                    break;
                }
                while ( $pos < $length &&
                    ctype_digit( $s[ $pos ] ) ) {
                    ++$pos;
                }
            }
        }
        
        return ( $pos == $length );
    }
}
