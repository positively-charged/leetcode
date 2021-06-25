<?php

class Solution {
    const MIN_LENGTH = 6;
    const MAX_LENGTH = 20;
    const REPETITION_LENGTH = 3;

    /**
     * @param String $password
     * @return Integer
     */

    function strongPasswordChecker($password) {
        $pos = 0;
        $numLower = 0;
        $numUpper = 0;
        $numDigit = 0;
        $numRepeated = 0;
        $repetitions = 0;
        $length = strlen( $password );
        $prevCh = -1;
        while ( $pos < $length ) {
            $code = ord( $password[ $pos ] );
            $numLower += ( int ) ctype_lower( $code );
            $numUpper += ( int ) ctype_upper( $code );
            $numDigit += ( int ) ctype_digit( $code );
            if ( $code == $prevCh ) {
                ++$numRepeated;
                if ( $numRepeated == self::REPETITION_LENGTH ) {
                    ++$repetitions;
                    $numRepeated = 0;
                }
            }
            else {
                $prevCh = $code;
                $numRepeated = 1;
            }
            ++$pos;
        }
        
        $steps = 0;
        $available = self::MAX_LENGTH - $pos;
        $excess = $length - $pos;
        $missing = self::MIN_LENGTH - $pos;
        $missingSpecials = (
            ( int ) ( $numLower == 0 ) + 
            ( int ) ( $numUpper == 0 ) +
            ( int ) ( $numDigit == 0 ) );
printf( "repetitions " ); var_dump( $repetitions );
printf( "missing " ); var_dump( $missing );
printf( "available " ); var_dump( $available );
printf( "missingSpecials " ); var_dump( $missingSpecials );
printf( "excess " ); var_dump( $excess );
        
        while ( $missingSpecials > 0 ) {
            // Replace character.
            if ( $repetitions > 0 ) {
                --$repetitions;
                ++$steps;
            }
            // Insert character.
            else if ( $missing > 0 ) {
                --$missing;
                ++$steps;
            }
            // Insert character.
            else if ( $available > 0 ) {
                --$available;
                ++$steps;
            }
            // Delete and insert character.
            else {
                $steps += 2;
            }
            --$missingSpecials;
        }

        // Insert any missing characters (1 step per missing character).
        while ( $missing > 0 ) {
            // Insert missing character between repeated characters.
            if ( $repetitions > 0 ) {
                --$repetitions;
            }
            ++$steps;
            --$missing;
        }

printf( "\n" ); 
printf( "repetitions " ); var_dump( $repetitions );
printf( "missing " ); var_dump( $missing );
printf( "available " ); var_dump( $available );
printf( "missingSpecials " ); var_dump( $missingSpecials );
printf( "excess " ); var_dump( $excess );
        // Replace last character of each repetition (1 step per repetition).
        $steps += $repetitions;
        // Delete excess characters (1 step per excess character).
        $steps += $excess;
        
        return $steps;
    }

/*

    function strongPasswordChecker($password) {
        $pos = 0;
        $numLower = 0;
        $numUpper = 0;
        $numDigit = 0;
        $numRepeated = 0;
        $repetitions = 0;
        $length = strlen( $password );
        $prevCh = -1;
        while ( $pos < $length ) {
            $code = ord( $password[ $pos ] );
            $numLower += ( int ) ctype_lower( $code );
            $numUpper += ( int ) ctype_upper( $code );
            $numDigit += ( int ) ctype_digit( $code );
            if ( $code == $prevCh ) {
                ++$numRepeated;
                if ( $numRepeated == self::REPETITION_LENGTH ) {
                    ++$repetitions;
                    $numRepeated = 0;
                }
            }
            else {
                $prevCh = $code;
                $numRepeated = 1;
            }
            ++$pos;
        }

        $missingRequired = (
            ( int ) ( $numLower == 0 ) + 
            ( int ) ( $numUpper == 0 ) +
            ( int ) ( $numDigit == 0 ) );

        if ( $pos < self::MIN_LENGTH ) {
            while ( $missingRequired ) {

            }
            while ( $pos < self::MIN_LENGTH ) {
                // Insert missing character between repeated characters.
                if ( $repetitions > 0 ) {
                    --$repetitions;
                    // Insert one of the required characters.
                    if ( $missingRequired > 0 ) {
                        --$missingRequired;
                    }
                }
                // Insert one of the required characters.
                else if ( $missingRequired > 0 ) {
                    --$missingRequired;
                    ++$steps;
                    ++$pos;
                }
                else {
                    ++$steps;
                    ++$pos;
                }
            }
        }
        else if ( $length > self::MAX_LENGTH ) {

        }
        else {

        }
    }

    function checkLessThanMin( $password ) {
        $pos = 0;
        $length = strlen( $password );
        while ( $pos < $length ) {
            ++$pos;
        }
            $this->checkLessThanMin( $password );

        while ( $pos < $length ) {
            $code = $password[ $pos ];
            if ( ctype_digit( $code ) ) {
                $step = STEP_INSERT;
                if ( $pos < self::MAX_LENGTH ) {

                }
                else {

                }
            }
            else {
                $steps += STEP_DELETE_CHAR;
            }

            switch ( $step ) {
            case STEP_INSERT:
            case STEP_DELETE:
            case STEP_REPLACE:
                ++$steps;
                break;
            }

            if (
                $numChars >= self::MIN_LENGTH &&
                $numChars <= self::MAX_LENGTH &&
                $numLower > 0 &&
                $numUpper > 0 &&
                $numDigit > 0 &&
                $repetitions == 0 ) {

            }

            if ( $pos < self::MAX_LENGTH ) {
                switch ( 
            }
        }
    }*/
}

$s = new Solution();
var_dump( $s->strongPasswordChecker( "ABABABABABABABABABABa1"

 ) );
