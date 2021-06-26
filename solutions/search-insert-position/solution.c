#include <stdio.h>

int searchInsert( int* nums, int numsSize, int target ) {
   int start = 0;
   int end = numsSize - 1;
   while ( start <= end ) {
      int segmentLength = end - start + 1;
      int midPoint = start + ( segmentLength / 2 );
      if ( nums[ midPoint ] == target ) {
         return midPoint;
      }
      // Shrink search segment from the right edge.
      else if ( nums[ midPoint ] > target ) {
         end = midPoint - 1;
      }
      // Shrink search segment from the left edge.
      else {
         start = midPoint + 1;
      }
   }
   return start;
}

int main( void ) {
   printf( "%d\n", searchInsert( ( int[] ) { 1, 3, 5, 6 }, 4, 5 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1, 3, 5, 6 }, 4, 2 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1, 3, 5, 6 }, 4, 7 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1, 3, 5, 6 }, 4, 0 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1 }, 1, 0 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1 }, 1, 2 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1, 3, 4 }, 3, 0 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1, 3, 4 }, 3, 2 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1, 3, 5 }, 3, 4 ) );
   printf( "%d\n", searchInsert( ( int[] ) { 1, 3, 5 }, 3, 6 ) );
   return 0;
}
