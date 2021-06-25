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
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val) {
        // Remove from front of list.
        while ( $head !== null && $head->val == $val ) {
            $head = $head->next;
        }
        // Remove from remaining list.
        if ( $head !== null ) {
            $tail = $head;
            $node = $head->next;
            while ( $node !== null ) {
                if ( $node->val != $val ) {
                    $tail->next = $node;
                    $tail = $node;
                }
                $node = $node->next;
            }
            $tail->next = null;
        }
        return $head;
    }
}
