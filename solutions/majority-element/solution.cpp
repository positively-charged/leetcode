#include <vector>

using std::vector;

class Solution {
   public:

   int majorityElement( vector<int> &num ) {
      if ( num.size() > 1 ) {
         int marker = num[ 0 ];
         int majority = 0;
         int majority_count = 1;
         int i = 1;
         while ( i < num.size() ) {
            if ( num[ i ] == marker ) {
               num[ i ] = marker;
               ++majority_count;
            }
            ++i;
         }
         i = 1;
         while ( i < num.size() ) {
            if ( num[ i ] != marker ) {
               int count = 1;
               int k = i + 1;
               while ( k < num.size() ) {
                  if ( num[ k ] == num[ i ] ) {
                     num[ k ] = marker;
                     ++count;
                  }
                  ++k;
               }
               if ( count > majority_count ) {
                  majority = i;
                  majority_count = count;
               }
            }
            ++i;
         }
         return num[ majority ];
      }
      else {
         return num[ 0 ];
      }
   }
};
