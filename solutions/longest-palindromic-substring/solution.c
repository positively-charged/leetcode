#include <stdio.h>
#include <stdbool.h>

// It is assumed we can modify the passed string. We will terminate the
// substring in-place instead of copying it into a new buffer.
char* longestPalindrome( char* s ) {
   // One of the constraints of the problem is that the given string cannot be
   // empty. Nonetheless, it is good practice to handle problematic cases.
   if ( s[ 0 ] == '\0' ) {
      return s;
   }

   size_t start = 1;
   size_t start_of_longest = 0;
   size_t longest = 1;

   while ( s[ start ] != '\0' ) {
      // Check for palindrome with even number of characters.
      size_t lside_chars_left = start;
      size_t lside = start - 1;
      size_t rside = start;
      while ( lside_chars_left > 0 && s[ lside ] == s[ rside ] ) {
         size_t length = ( rside + 1 ) - lside;
         if ( length > longest ) {
            start_of_longest = lside;
            longest = length;
         }
         --lside_chars_left;
         --lside;
         ++rside;
      }

      // Check for palindrome with odd number of characters.
      lside_chars_left = start;
      lside = start - 1;
      rside = start + 1;
      while ( lside_chars_left > 0 && s[ lside ] == s[ rside ] ) {
         size_t length = ( rside + 1 ) - lside;
         if ( length > longest ) {
            start_of_longest = lside;
            longest = length;
         }
         --lside_chars_left;
         --lside;
         ++rside;
      }

      ++start;
   }

   s[ start_of_longest + longest ] = '\0';
   return &s[ start_of_longest ];
}

int main( void ) {
//   printf( "%d\n", confirmPalindrome( "xaabacxcabaax", 0, 12 ) );
//return 0;
   char s[] = "accxxc";
   const char* result = longestPalindrome( s );
   printf( "%s\n", result );
   return 0;
}
