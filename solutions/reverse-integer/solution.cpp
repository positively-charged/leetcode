#include <climits>

class Solution {
   public:
   
   int reverse( int x ) {
      bool negative = false;
      if ( x < 0 ) {
         if ( x == INT_MIN ) {
            return 0;
         }
         x = -x;
         negative = true;
      }
      int result = 0;
      while ( x ) {
         // Overflow.
         if ( result > ( INT_MAX / 10 ) ) {
            return 0;
         }
         result *= 10;
         result += x % 10;
         x /= 10;
      }
      if ( negative ) {
         result = -result;
      }
      return result;
   }
};
