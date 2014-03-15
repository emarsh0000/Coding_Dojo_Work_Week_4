<?php 


Class Car
{
	var $price; //these are to say that they exist.
	var $speed;
	var $fuel;
	var $mileage;
	var $tax;

	function __construct($price, $speed, $fuel, $mileage) //these will be filled below by the user.
	{
		$this->price = $price; //these tell the value to be what is put in above.
	    $this->speed = $speed;
		$this->fuel = $fuel;
		$this->mileage = $mileage;

		if ($price > 10000) //if car is over 10,000 do...
		{
			$this->tax = (0.15); 
		}
		else
		{
			$this->tax = (0.12);
		}
		$this->display_all();

	}
	function display_all()
	{
		echo "Price: " . $this->price;
		echo "<br>";
		echo "Max Speed: " . $this->speed . "mph";
		echo "<br>";
		echo "Fuel: " . $this->fuel;
		echo "<br>";
		echo "Mileage: " . $this->mileage . "mpg";
		echo "<br>";
		echo "Tax: " . $this->tax;
		echo "<br>";
		echo "<br>";
	}
}

$car1 = new Car(12000, 180, "Full", 44);  //examples of filled in instances.
$car2 = new Car(900, 99, "Half Full", 199);
$car3 = new Car(250, 78, "Empty", 284);
$car4 = new Car(33000, 270, "Full", 11);
$car5 = new Car(21000, 240, "Empty", 73);

 ?>