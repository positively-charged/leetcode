#include <string>

using std::string;

class Solution {
   public:
   
   string convert( string s, int nRows ) {
      if ( nRows > 1 ) {
         string result = "";
         int i = 0;
         while ( i < nRows ) {
            int k = i;
            while ( k < s.length() ) {
               result += s[ k ];
               if ( i > 0 && i + 1 < nRows ) {
                  int ofs = k + ( ( nRows - i ) + ( nRows - i - 2 ) );
                  if ( ofs < s.length() ) { 
                     result += s[ ofs ];
                  }
               }
               k += nRows + ( nRows - 2 );
            }
            ++i;
         }
         return result;
      }
      else {
         return s;
      }
   }
};
