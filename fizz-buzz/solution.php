<?php

class Solution {
    /**
     * @param Integer $n
     * @return String[]
     */
    public function fizzBuzz( int $n ): array {
        $answer = [];
        for ( $i = 1; $i <= $n; ++$i ) {
            if ( $i % 3 == 0 && $i % 5 == 0 ) {
                $answer[] = 'FizzBuzz';
            }
            else if ( $i % 3 == 0 ) {
                $answer[] = 'Fizz';
            }
            else if ( $i % 5 == 0 ) {
                $answer[] = 'Buzz';
            }
            else {
                $answer[] = ( string ) $i;
            }
        }
        return $answer;
    }

    public function fizzBuzz2( int $n ): array {
        $answer = [];
        for ( $i = 1; $i <= $n; ++$i ) {
            if ( $i % 3 == 0 ) {
                if ( $i % 5 == 0 ) {
                    $answer[] = 'FizzBuzz';
                }
                else {
                    $answer[] = 'Fizz';
                }
            }
            else if ( $i % 5 == 0 ) {
                $answer[] = 'Buzz';
            }
            else {
                $answer[] = ( string ) $i;
            }
        }
        return $answer;
    }
}

$st = hrtime( true );

$s = new Solution();
for ( $i = 0; $i < 1000_000; ++$i ) {
//var_dump( $s->fizzBuzz( 3 ) );
//var_dump( $s->fizzBuzz( 5 ) );
//var_dump( $s->fizzBuzz( 15 ) );
$s->fizzBuzz2( 15 );
}

printf( "%f\n", ( hrtime( true ) - $st ) / 1_000_000 );
