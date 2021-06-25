#include <stdio.h>
#include <stdbool.h>
#include <string.h>

char* longestCommonPrefix( char** strs, int strsSize ) {
   int prefix_pos = 0;

   if ( strsSize > 0 ) {
      while ( strs[ 0 ][ prefix_pos ] != '\0' ) {
         int str = 0;
         while ( str < strsSize &&
            strs[ str ][ prefix_pos ] == strs[ 0 ][ prefix_pos ] ) {
            ++str;
         }
         if ( str == strsSize ) {
            ++prefix_pos;
         }
         else {
            break;
         }
      }
   }

   // Maximum length of prefix specified in the problem constraints.
   static char prefix[ 200 ];
   memcpy( prefix, strs[ 0 ], prefix_pos );
   prefix[ prefix_pos ] = '\0';
   return prefix;
}

int main( void ) {
   char* strs[] = { "flower","flow","flight" };
   const char* prefix = longestCommonPrefix( strs, sizeof( strs ) /
      sizeof( strs[ 0 ] ) );
   printf( "%s\n", prefix );
   return 0;
}
