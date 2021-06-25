<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        $node = $head;
        $nodeTwoSteps = $head;
        while ( $nodeTwoSteps !== null ) {
            $node = $node->next;
            $nodeTwoSteps = $nodeTwoSteps->next;
            if ( $nodeTwoSteps !== null ) {
                $nodeTwoSteps = $nodeTwoSteps->next;
                if ( $nodeTwoSteps === $node ) {
                    return true;
                }
            }
        }
        return false;
    }
}
