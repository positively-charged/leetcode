struct ListNode {
    int val;
    ListNode *next;
    ListNode( int x ) : val( x ), next( 0 ) {}
};

/**
 * Definition for singly-linked list.
 * struct ListNode {
 *     int val;
 *     ListNode *next;
 *     ListNode(int x) : val(x), next(NULL) {}
 * };
 */
class Solution {
public:
    ListNode *mergeTwoLists( ListNode *l1, ListNode *l2 ) {
        if ( l1 ) {
            if ( l2 ) {
                ListNode* head = l1;
                ListNode* prev = l1;
                if ( l2->val < l1->val ) {
                    ListNode* next = l2->next;
                    l2->next = 0;
                    head = l2;
                    prev = l2;
                    l2 = next;
                }
                else {
                    ListNode* next = l1->next;
                    l1->next = 0;
                    l1 = next;
                }
                while ( l1 && l2 ) {
                    if ( l1->val < l2->val ) {
                        ListNode* next = l1->next;
                        l1->next = 0;
                        prev->next = l1;
                        prev = l1;
                        l1 = next;
                    }
                    else {
                        ListNode* next = l2->next;
                        l2->next = 0;
                        prev->next = l2;
                        prev = l2;
                        l2 = next;
                    }
                }
                if ( l1 ) {
                    prev->next = l1;
                }
                if ( l2 ) {
                    prev->next = l2;
                }
                return head;
            }
            else {
                return l1;
            }
        }
        else {
            return l2;
        }
    }
};
