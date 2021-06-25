<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $left
     * @param Integer $right
     * @return ListNode
     */
    function reverseBetween($head, $left, $right) {
        $pos = 1;
        $node = $head;
        $leftTail = null;
        while ( $node != null && $pos < $left ) {
            $leftTail = $node;
            $node = $node->next;
            ++$pos;
        }
        
        $reversedHead = null;
        $reversedTail = $node;
        while ( $node != null && $pos <= $right ) {
            $next = $node->next;
            $node->next = $reversedHead;
            $reversedHead = $node;
            $node = $next;
            ++$pos;
        }
        
        if ( $reversedHead != null ) {
            $reversedTail->next = $node;
            if ( $leftTail != null ) {
                $leftTail->next = $reversedHead;
            }
            else {
                $head = $reversedHead;
            }
        }
        
        return $head;
    }
}
