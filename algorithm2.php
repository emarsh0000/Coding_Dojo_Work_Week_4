<!-- Create a 10x10 array and randomly fill each cell with the letter "A" or the letter "Z". 
Make this a function where the size of the array is variable (give it a parameter, $size) -->
<?php





function gridmaker($size)
{
	$grid = array();

	for ($i = 0; $i < $size; $i++) 
	{ 
		for ($j = 0; $j < $size; $j++) 
			{ 
				$grid[$i][$j] = rand(0,1)? "A": "Z"; //this takes the grid and inserts random letters A and Z into grid.
			}
	}
	return $grid;
}
	var_dump(gridmaker(10));  //calling the function.




		// for ($j = 0; $j < $size ; $j++) 
		// { 
		// 	$random_number = rand(0, 1)

		// 	if $random_number == 0
		// 	{
		// 		(array[0][$i] = 'Z';
		// 	}
		// 	else
		// 	{
		// 		(array[0][$i] = 'A';
		// 	}
		// }




?>