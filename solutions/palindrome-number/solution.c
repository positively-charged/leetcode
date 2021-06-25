#include <stdio.h>
#include <stdbool.h>
#include <limits.h>

bool isPalindrome( int x ) {
   int temp = x;
   int reversed_x = 0;
   while ( temp > 0 ) {
      // `x` is a palindrome if the reverse of `x` equals `x`. If we cannot
      // represent the reverse of `x` because it overflows, then it cannot
      // equal `x`. Therefore, `x` cannot be a palindrome.
      if ( reversed_x > INT_MAX / 10 ) {
         return false;
      }
      reversed_x *= 10;

      // Check for overflow.
      int rightmost_value = temp % 10;
      if ( reversed_x > INT_MAX - rightmost_value ) {
         return false;
      }
      reversed_x += rightmost_value;

      temp /= 10;
   }
   return ( reversed_x == x );
}

int main( void ) {
   int x = 0;
   bool result = isPalindrome( x );
   printf( "%d\n", result );
   return 0;
}

