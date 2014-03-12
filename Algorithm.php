<!-- Add all values between 100 + 4,000,000 inclusively that are multiples of 3 or 5, but not 3 and 5. --> 

<?php


function algorithm()
{
	$sum = 0;

	for ($i = 100; $i < 4000001; $i++) //inclusively says we want to include the starting and ending numbers in the range.
	{ 
		if (($i % 3 == 0 || $i % 5 == 0) && ($i % 15 != 0))
		{
			$sum = $sum + $i;
		}
	}	
	return $sum;
}	

echo algorithm();  //calling the function so this will run.

?>
