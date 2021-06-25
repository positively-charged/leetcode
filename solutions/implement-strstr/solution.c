#include <stdio.h>

int strStr( char* haystack, char* needle ) {
   // Empty needle returns a 0.
   if ( *needle == '\0' ) {
      return 0;
   }

   size_t haystack_pos = 0;
   while ( haystack[ haystack_pos ] != '\0' ) {
      size_t substr_pos = 0;
      while ( needle[ substr_pos ] != '\0' &&
         needle[ substr_pos ] == haystack[ haystack_pos + substr_pos ] ) {
         ++substr_pos;
      }
      if ( needle[ substr_pos ] == '\0' ) {
         return haystack_pos;
      }
      ++haystack_pos;
   }

   return -1;
}

int main( void ) {
   printf( "%d\n", strStr( "", "" ) );
   printf( "%d\n", strStr( "hello", "ll" ) );
   return 0;
}
