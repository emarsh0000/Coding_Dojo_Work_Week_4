<!-- Given a string, write a function that reverses the string exactly, including spaces and punctuation.
ie, "Coding Dojo: it rocks!" --> 
<!-- "!skcor ti :ojoD gnidoC"  NOTE: Don't use strrev()! -->
<?php

$string = "Coding Dojo: it rocks!"; //this is the value that doesn't change.

function string_reverse($string)
{
	$new_string = strlen($string); //this makes a new variable = the length of it.

	for ($i = ($new_string - 1); $i >= 0; $i--) //take the length and make i = length of string backwards. Then interate -1 each time.
	{
		echo $new_string = $string[$i]; //this will take each string piece and echo it until the full length is written.
	}
}

string_reverse($string); //calling the function

?>