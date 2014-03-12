<!--Given an array of numbers, write a function that returns true if each number is equal to or greater than 
	the one before. Otherwise, return false. HARD MODE: NO LOOPS! -->

<?php

function true_false($A)
{
	// $A = array(); //given array
	

	for ($i = 0; $i < count($A)-1; $i++) 
	{ 
		//$new_value = $i++;

		if ($A[$i] > $A[$i+1]) //if the last number/index is greater than the next one in the line...
		{
			return "False";
		}
		// else
		// {
		// 	echo "False";
		// }
	}
	return "True";
}
echo true_false([3, 44, -5, 33]);  //calling the function.


?>