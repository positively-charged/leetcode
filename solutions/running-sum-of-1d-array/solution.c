#include <stdio.h>
#include <stdlib.h>

/**
 * Note: The returned array must be malloced, assume caller calls free().
 * Note: Overflow not checked.
 */
int* runningSum( int* nums, int numsSize, int* returnSize ) {
    int* running_sum = malloc( sizeof( running_sum[ 0 ] ) * numsSize );
    *returnSize = 0;
    if ( running_sum != NULL ) {
        int sum = 0;
        for ( int i = 0; i < numsSize; ++i ) {
            sum += nums[ i ];
            running_sum[ i ] = sum;
        }
        *returnSize = numsSize;
    }
    return running_sum;
}

int main( void ) {
    { int nums[] = { 1, 2, 3, 4 }; }
    { int nums[] = { 1,1,1,1,1 }; }
    int nums[] = { 3,1,2,10,1 };
    int return_size;
    int* running_sum = runningSum( nums, sizeof( nums ) / sizeof( nums[ 0 ] ),
        &return_size );
    printf( "return_size: %d\n", return_size );
    for ( int i = 0; i < return_size; ++i ) {
        printf( "running_sum[ %d ]: %d\n", i, running_sum[ i ] );
    }
    return 0;
}
