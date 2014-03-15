<?php

Class Bike
{
	var $price; //this says these now exist.
	var $max_speed;
	var $miles;

	function set_info($price, $max_speed, $miles = 0) //miles has a default of 0.
	{
		$this->price = $price;
		$this->max_speed = $max_speed;
		$this->miles = $miles;
	}
	function displayInfo()
	{
		echo "Bike = $" . $this->price;
		echo "<br>";
		echo "Max Speed = " . $this->max_speed . "mph";
		echo "<br>";
		echo "Miles Driven = " . $this->miles;
		echo "<br>";
		echo "<br>";
	}
	function drive()  //when invoked, this will happen.
	{
		echo "Driving...";
		echo "<br>";
		echo $this->miles += 10;
		echo "<br>";
	}
	function reverse() //when invoked, this will happen.
	{
		if ($this->miles < 5) //so that there are no negative values. You can't drive -mph!
		{
			$this->miles = 0;
			echo "Your car can't go less than 0mph. Your car is now stopped.";
			echo "<br>";
		}
		else
		{
			echo "Reversing...";
			echo "<br>";
			echo $this->miles -= 5;
			echo "<br>";
		}
		
	}
}

$bike1 = new Bike(); //now this is created.

$bike1->set_info(200, 18); //here's its set info.
$bike1->drive();  //function called.
$bike1->drive();
$bike1->drive();
$bike1->reverse();
echo "<br>";
$bike1->displayInfo();
echo "<br>";

$bike2 = new Bike();

$bike2->set_info(175, 15);
$bike2->drive();
$bike2->drive();
$bike2->reverse();
$bike2->reverse();
echo "<br>";
$bike2->displayInfo();
echo "<br>";

$bike3 = new Bike();

$bike3->set_info(350, 20);
$bike3->reverse();
$bike3->reverse();
$bike3->reverse();
echo "<br>";
$bike3->displayInfo();

?>