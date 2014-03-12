<?php

//Given two arrays, write a function to return an associative array where the array becomes
// the keys and the other array the values. —— i.e., make_assoc_array([“ann”, “ted”, “sam”], [3, 5, 2])

// returns: (“ann” => 3,  “ted” => 5, “sam” => 3)

// SECOND PART
// ------

// Given 2 numbers, a and b, create a function that returns the last number produced by a to the bth.  (i.e., get last_number (2, 5) —> 2

// 2*2*2*2*2 = 32 so you return the 2 in 32.

?>
<?php

$A = array("hello", "root", "bike"); //2 non-associative arrays
$B = array(1, 5, 8);


function combined_array($array1, $array2)
{
	if (count($array1) == count($array2))
	{
		$assocArray = array();
		for ($i = 0; $i < count($array1); $i++) 
		{ 
			$assocArray[$array1[$i]] = $array2[$i];
		}
		return $assocArray;
	}
}
$result = combined_array($A, $B);
var_dump($result);

?>

<?php

$a = 2

$b = 5

$c = pow(2, 5);

echo "string";

function last_number()
{
	$pow_number = pow($x, $y);

	$new_array = str_split($pow_number);

}


// pow($base,$power) % 10 = $last_digit  Wrap function around this and its all you need.
// echo $last_digit

?>