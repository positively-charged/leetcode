#include <stdio.h>
#include <stdbool.h>

// `s` is assumed to be a valid Roman numeral.
int romanToInt( char* s ) {
   int value = 0;

   while ( *s != '\0' ) {
      switch ( *s ) {
      case 'X':
         value += 10;
         break;
      }
      ++s;
   }

   return value;
}

int main( void ) {
   char s[] = "XII";
   int result = romanToInt( s );
   printf( "%d\n", result );
   return 0;
}
