class Solution {
public:
    int trap(int A[], int n) {
        int water = 0;
        int start = 0;
        while ( start < n ) {
            int i = start + 1;
            int end = i;
            int height = i;
            while ( i < n ) {
                if ( A[ i ] >= A[ start ] ) {
                    height = start;
                    end = i;
                    break;
                }
                if ( A[ i ] > A[ height ] ) {
                    height = i;
                    end = i;
                }
                ++i;
            }
            i = start + 1;
            while ( i < end ) {
                water += A[ height ] - A[ i ];
                ++i;
            }
            start = end;
        }
        return water;
    }
};
