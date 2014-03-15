<?php 

Class Animal
{
	var $name; //these exist now.
	var $health;

	function __construct($name, $health = 100) //these will be filled below by the user.
	{
		$this->name = $name; //these tell the value to be what is put in above.
	    $this->health = $health;
	}
	function walk()
	{
		echo "Health has become: " . $this->health -= 1;
		echo "<br>";
		return $this;
	} 
	function run()
	{
		echo "Health has become: " . $this->health -= 5;
		echo "<br>";
		return $this;
	}
	function displayHealth()
	{
		echo "Name is: " . $this->name;
		echo "<br>";
		echo "Current Health: " . $this->health;
		echo "<br>";
		return $this; //you only need this if you are going to string all calls of functions into ONE line like below.
	}

}

$animal = new Animal("Animal"); //now created this. And I filled in the 'name' parameter.

$animal->walk()->walk()->walk()->run()->run()->displayHealth();  //this is a string of the commands put into one line.
echo "<br>";            // end of Parent Class Animal

//--------------------------------------------------------------

Class Dog extends Animal
{
	function __construct($name, $health = 250) //these will be filled below by the user.
	{
		$this->name = $name; //these tell the value to be what is put in above.
	    $this->health = $health;
	}
	function pet()
	{
		echo "Health has become: " . $this->health += 5;
		echo "<br>";
		return $this;
	}

}

$dog = new Dog("Dog");

$dog->walk()->walk()->walk()->run()->run()->pet()->displayHealth();
echo "<br>";             //end of Class Dog

//-----------------------------------------------------------------------------

Class Dragon extends Animal
{
	function __construct($name, $health = 170) //these will be filled below by the user.
	{
		$this->name = $name; //these tell the value to be what is put in above.
	    $this->health = $health;
	}
	function fly()
	{
		echo "Health has become: " . $this->health -= 10;
		echo "<br>";
		return $this;
	}

}

$dragon = new Dragon("Dragon");

$dragon->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth(); //I checked passing these children functions into parent and there was an error as hoped! BUT changing a parent aspect DID affect the children! YAY!

 ?>