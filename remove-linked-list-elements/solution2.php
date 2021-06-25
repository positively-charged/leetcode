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
        if ( $head !== null ) {
            // Remove from middle of list.
            $tail = $head;
            $node = $head->next;
            while ( $node !== null ) {
                if ( $node->val == $val ) {
                    $tail->next = $node->next;
                }
                else {
                    $tail = $node;
                }
                $node = $node->next;
            }
            $tail->next = null;
            // Remove from front of list.
            if ( $head->val == $val ) {
                $head = $head->next;
            }
        }
        return $head;
    }
}
