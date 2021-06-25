#include <string>
#include <climits>

using std::string;

class Solution {
public:
    int lengthOfLongestSubstring( string s ) {
        int next[ UCHAR_MAX ] = { 0 };
        int longest_length = 0;
        int start = 0;
        int i = 0;
        while ( true ) {
            char ch = s[ i ];
            if ( ! ch ) {
                break;
            }
            if ( next[ ch ] > start ) {
               start = next[ ch ];
            }
            next[ ch ] = i + 1;
            ++i;
            if ( i - start > longest_length ) {
                longest_length = i - start;
            }
        }
        return longest_length;
    }
};
