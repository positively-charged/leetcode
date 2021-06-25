<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        $zeros = 0;
        $twos = count( $nums ) - 1;
        $i = 0;
        while ( $i <= $twos ) {
            switch ( $nums[ $i ] ) {
            case 0:
                $nums[ $i ] = $nums[ $zeros ];
                $nums[ $zeros ] = 0;
                ++$zeros;
                ++$i;
                break;
            case 1:
                ++$i;
                break;
            case 2:
                $nums[ $i ] = $nums[ $twos ];
                $nums[ $twos ] = 2;
                --$twos;
                break;
            }

/*


            switch ( $nums[ $i ] ) {
            case 0:
                $temp = $nums[ $zeros ];
                $nums[ $zeros ] = $nums[ $i ];
                $nums[ $i ] = $temp;
                ++$zeros;
                ++$i;
                break;
            case 1:
                ++$i;
                break;
            case 2:
                $temp = $nums[ $twos ];
                $nums[ $twos ] = $nums[ $i ];
                $nums[ $i ] = $temp;
                --$twos;
                break;
            }

            if ( $nums[ $i ] == 2 ) {
                $temp = $nums[ $twos ];
                $nums[ $twos ] = $nums[ $i ];
                $nums[ $i ] = $temp;
                --$twos;
            }

            if ( $nums[ $twos ] == 0 ) {
                $temp = $nums[ $zeros ];
                $nums[ $zeros ] = $nums[ $twos ];
                $nums[ $tows ] = $temp;
                ++$zeros;
            }

            ++$i;*/
        }
    }
}

//for ( $i = 0; $i < 1000000; ++$i ) {
    $nums = [2,0,2,1,1,0];
    //$nums = [1,0,0];
    //var_dump( $nums );
    $solution = new Solution();
    $solution->sortColors( $nums );
    var_dump( $nums );
//}
