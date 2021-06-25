#include <stdio.h>

int findPaths( int m, int n, int maxMove, int startRow, int startColumn ) {
            //printf( "\n" );
    int num_path = 0;
   // printf( "%d, %d (moves: %d)", startRow, startColumn, maxMove );
    if (
        startRow < 0     || // Going outside top edge of grid.
        startColumn >= n || // Going outside right edge of grid.
        startRow >= m    || // Going outside bottom edge.
        startColumn < 0     // Going outside left edge.
        ) {
        num_path = 1;
        //printf( " hit" );
    }
    // Skip fruitless paths.
    else if (
        startRow - maxMove < 0     || // Try going outside top edge.
        startColumn + maxMove >= n || // Try going outside top edge.
        startRow + maxMove >= m || // Try going outside top edge.
        startRow - maxMove < 0  // Try going outside top edge.
        ) {
        // Try going outside top edge, but only if it's fruitful.
        if ( startRow - ( maxMove - 1 ) < 0 ) {
            num_path += findPaths( m, n, maxMove - 1, startRow - 1, startColumn ); // Up.
        }

        if ( maxMove > 0 ) {
            num_path += findPaths( m, n, maxMove - 1, startRow - 1, startColumn ); // Up.
            num_path += findPaths( m, n, maxMove - 1, startRow, startColumn + 1 ); // Right.
            num_path += findPaths( m, n, maxMove - 1, startRow + 1, startColumn ); // Down.
            num_path += findPaths( m, n, maxMove - 1, startRow, startColumn - 1 ); // Left.
        }
    }
    
    return num_path;
}


int main( void ) {
   printf( "\n%d\n", findPaths( 2, 2, 2, 0, 0 ) );
   printf( "\n%d\n", findPaths( 1, 3, 3, 0, 1 ) );
   //printf( "\n%d\n", findPaths( 50, 50, 31, 25, 25 ) );
   printf( "\n%d\n", findPaths( 2, 2, 25, 0, 0 ) );
   return 0;
}

