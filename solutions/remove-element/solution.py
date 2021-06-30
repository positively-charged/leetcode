class Solution:
    def removeElement( self, nums: list[ int ], val: int ) -> int:
        try:
            index = 0
            while True:
                index = nums.index( val, index )
                nums[ index ] = nums[ len( nums ) - 1 ]
                del nums[ len( nums ) - 1 ]
        except ValueError:
            return len( nums )

assert Solution().removeElement(
    nums := [ 3, 2, 2, 3], 3 ) == 2 and \
    sorted( nums ) == [ 2, 2 ]
assert Solution().removeElement(
    nums := [ 0, 1, 2, 2, 3, 0, 4, 2], 2 ) == 5 and \
    sorted( nums ) == [ 0, 0, 1, 3, 4 ]
