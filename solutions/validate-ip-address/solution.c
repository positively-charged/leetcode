#include <stdio.h>
#include <stdbool.h>
#include <ctype.h>

struct check {
    const char* text;
};

static bool validDigitGroup( struct check* check, char separator ) {
    // Digit group must start with a valid digit. Leading zeroes not allowed.
    if ( isdigit( *check->text ) && ! ( *check->text == '0' &&
        isdigit( check->text[ 1 ] ) ) ) {
        int number = 0;
        int num_digits = 0;
        while ( num_digits < 3 && isdigit( *check->text ) ) {
            number *= 10; // Shift number to the left one place.
            number += check->text[ 0 ] - '0'; // Update rightmost place.
            ++check->text;
            ++num_digits;
        }
        if ( number <= 255 ) {
            if ( *check->text == separator ) {
                ++check->text;
                return true;
            }
        }
    }
    return false;
}

static bool validIp4( const char* ip ) {
    struct check check = { .text = ip };
    return
        validDigitGroup( &check, '.' ) &&
        validDigitGroup( &check, '.' ) &&
        validDigitGroup( &check, '.' ) &&
        validDigitGroup( &check, 0 );
}

static bool validHexDigitGroup( struct check* check, char separator ) {
    int num_digits = 0;
    while ( num_digits < 4 && isxdigit( *check->text ) ) {
        ++check->text;
        ++num_digits;
    }
    if ( num_digits > 0 ) {
        if ( *check->text == separator ) {
            ++check->text;
            return true;
        }
    }
    return false;
}

static bool validIp6( const char* ip ) {
    struct check check = { .text = ip };
    return
        validHexDigitGroup( &check, ':' ) &&
        validHexDigitGroup( &check, ':' ) &&
        validHexDigitGroup( &check, ':' ) &&
        validHexDigitGroup( &check, ':' ) &&
        validHexDigitGroup( &check, ':' ) &&
        validHexDigitGroup( &check, ':' ) &&
        validHexDigitGroup( &check, ':' ) &&
        validHexDigitGroup( &check, 0 );
}

char* validIPAddress( char* IP ) {
    if ( validIp4( IP ) ) {
        return "IPv4";
    }
    else if ( validIp6( IP ) ) {
        return "IPv6";
    }
    else {
        return "Neither";
    }
}

int main( void ) {
    printf( "%s\n", validIPAddress( "255.255.255.234" ) );
    printf( "%s\n", validIPAddress( "2001:0db8:85a3:0:0:8A2E:0370:7334" ) );
    printf( "%s\n", validIPAddress( "256.256.256.256" ) );
    printf( "%s\n", validIPAddress( "2001:0db8:85a3:0:0:8A2E:0370:7334:" ) );
    printf( "%s\n", validIPAddress( "1e1.4.5.6" ) );
    printf( "%s\n", validIPAddress( "0.0.0.0" ) );
    printf( "%s\n", validIPAddress( "0:0:0:0:0:0:0:0BCD" ) );
    return 0;
}
