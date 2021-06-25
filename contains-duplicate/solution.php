<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        return ( count( array_count_values( $nums ) ) < count( $nums ) );
    }
}
