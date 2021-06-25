struct Solution;

fn main() {
    let r = Solution::sum_of_unique( vec![1,2,3,2] );
    println!( "{:?}", r );
    let r = Solution::sum_of_unique( vec![1,1,1,1,1] );
    println!( "{:?}", r );
    let r = Solution::sum_of_unique( vec![1,2,3,4,5] );
    println!( "{:?}", r );
    let r = Solution::sum_of_unique( vec![1,] );
    println!( "{:?}", r );
}

impl Solution {
    pub fn sum_of_unique(mut nums: Vec<i32>) -> i32 {
        nums.sort_unstable();
        let mut sum = 0;
        let mut i = 0;
        while i < nums.len() {
            let mut j = i + 1;
            while j < nums.len() && nums[ i ] == nums[ j ] {
                j += 1;
            }
            if j - i == 1 {
                sum += nums[ i ];
                i += 1;
            }
            else {
                i = j;
            }
        }
        sum
    }
}
