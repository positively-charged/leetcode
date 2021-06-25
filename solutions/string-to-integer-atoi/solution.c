#include <stdio.h>
#include <stdbool.h>
#include <ctype.h>
#include <limits.h>

// `s` assumed to be non-NULL.
int myAtoi( char* s ) {
   // Skip whitespace (only spaces).
   while ( *s != '\0' && *s == ' ' ) {
      ++s;
   }

   // Negative or positive sign.
   bool negative = false;
   switch ( *s ) {
   case '-':
      negative = true;
      ++s;
      break;
   case '+':
      ++s;
      break;
   default:
      break;
   }

   int value = 0;

   // Digits of number.
   bool overflowed = false;
   while ( isdigit( *s ) && ! overflowed ) {
      // The current value must fit into INT_MAX at least 10 times, because
      // we'll be multiplying the value by 10 to move the value one place to
      // the left to make room for the current digit.
      if ( INT_MAX / 10 >= value ) {
         value *= 10;
         int digit = *s - '0';
         if ( INT_MAX - value >= digit ) {
            value += digit;
         }
         else {
            overflowed = true;
         }
      }
      else {
         overflowed = true;
      }
      ++s;
   }

   if ( overflowed ) {
      // In the above loop, we are using INT_MAX as the limit for overflow,
      // because we are using the positive range of the integer type to store
      // our value.
      // 
      // Even though INT_MIN is a valid number in our problem, when it is
      // negated (-INT_MIN), it is not representable in the positive range of
      // the integer type. 
      //
      // If the user passes "INT_MIN", the loop above will trigger an overflow
      // condition. But since the problem requires us to return INT_MIN when we
      // overflow in the negative direction, whether the user passed "INT_MIN"
      // or something even smaller, we will still be returning INT_MIN in any
      // of these cases.
      //
      // So even though "INT_MIN" overflows in our loop above, we will still be
      // returning INT_MIN, which is the correct answer even if our loop above
      // did not overflow.
      if ( negative ) {
         value = INT_MIN;
      }
      else {
         value = INT_MAX;
      }
   }
   else {
      if ( negative ) {
         value = -value;
      }
   }
   
   return value;
}

int main( void ) {
   //{ char* s = "42"; }
   //{ char* s = "-2147483647"; }
   // char* s = "   -42";
   // char* s = "4193 with words";
   // char* s = "words and 987";
   char* s = "-91283472332";
   int result = myAtoi( s );
   printf( "%d\n", result );
   printf( "%d\n", INT_MIN );
   printf( "%d\n", INT_MAX );
   return 0;
}
