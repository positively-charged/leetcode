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
     * @return ListNode
     */
    function detectCycle($head) {
        $node = $head;
        $nodeTwoSteps = $head;
        while ( $nodeTwoSteps !== null ) {
            $node = $node->next;
            $nodeTwoSteps = $nodeTwoSteps->next;
            if ( $nodeTwoSteps !== null ) {
                $nodeTwoSteps = $nodeTwoSteps->next;
                if ( $nodeTwoSteps === $node ) {
                    return $this->findCycleStart( $head, $node );
                }
            }
        }
        return null;
    }
    
    function findCycleStart( $head, $startingLine ) {
        $node = $head;
        $runner = $startingLine;
        while ( $runner->next !== $node ) {
            $runner = $runner->next;
            if ( $runner === $startingLine ) {
                $node = $node->next;
            }
        }
        return $node;
    }
}
