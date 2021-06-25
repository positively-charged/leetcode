struct Solution;

fn main() {
    let r = Solution::sort_array_by_parity( vec![ 1, 1, 2, 2, 3, 4 ] );
    println!( "{:?}", r );
}

impl Solution {
    pub fn sort_array_by_parity(mut a: Vec<i32>) -> Vec<i32> {
        if a.len() > 0 {
            let mut end = a.len() - 1;
            let mut current = 0;
            while current < end {
                // If current number is odd, move it to the back of the array.
                if a[ current ] % 2 != 0 {
                    let odd_number = a[ current ];
                    a[ current ] = a[ end ];
                    a[ end ] = odd_number;
                    end -= 1;
                }
                else {
                    current += 1;
                }
            }
        }
        a
    }
}
