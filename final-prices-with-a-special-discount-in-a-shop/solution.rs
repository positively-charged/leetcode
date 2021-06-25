struct Solution;

fn main() {
    let r = Solution::final_prices( vec![8,4,6,2,3] );
    println!( "{:?}", r );
    let r = Solution::final_prices( vec![1,2,3,4,5] );
    println!( "{:?}", r );
    let r = Solution::final_prices( vec![10,1,1,6] );
    println!( "{:?}", r );
}

impl Solution {
    pub fn final_prices(mut prices: Vec<i32>) -> Vec<i32> {
        for i in 0 .. prices.len() {
            for j in i + 1 .. prices.len() {
                if prices[ j ] <= prices[ i ] {
                    prices[ i ] -= prices[ j ];
                    break;
                }
            }
        }
        prices
    }
}
