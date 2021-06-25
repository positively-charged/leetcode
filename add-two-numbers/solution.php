<?php

/**
  Definition for a singly-linked list.
*/
  class ListNode {
      public $val = 0;
      public $next = null;
      function __construct($val = 0, $next = null) {
          $this->val = $val;
          $this->next = $next;
      }
  }
 
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $carry = 0;
        $head = null;
        $tail = null;
        while ( $l1 !== null || $l2 !== null ) {
            $lside = ( $l1 !== null ) ? $l1->val : 0;
            $rside = ( $l2 !== null ) ? $l2->val : 0;
            $sum = $lside + $rside + $carry;
            $carry = intdiv( $sum, 10 );
            $digit = $sum % 10;
            $node = new ListNode( $digit );
            if ( $head === null ) {
                $head = $node;
                $tail = $head;
            }
            else {
                $tail->next = $node;
                $tail = $node;
            }
            $l1 = ( $l1 !== null ) ? $l1->next : null;
            $l2 = ( $l2 !== null ) ? $l2->next : null;
        }
        if ( $carry > 0 ) {
            $node = new ListNode( $carry );
            $tail->next = $node;
        }
        return $head;
    }
}

$l2 = new ListNode( 1, new ListNode( 2, new ListNode( 3 ) ) );
$l1 = new ListNode( 5, new ListNode( 6, new ListNode( 7, new ListNode( 2 ) ) ) );

$s = new Solution();
var_dump( $s->addTwoNumbers( $l1, $l2 ) );
