<?php

require_once('Car.php');

class Mercedes extends Car
{



    public function getModel(): string
    {
        return 'Mercedes';
    }
}

$car1 = new Mercedes('m', 'black', 300, 2019);
echo $car1->getFullName();