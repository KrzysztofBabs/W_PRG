<?php

trait Speed{
    private $speed = 0;

    public function increaseSpeed($value){
        $this->speed += $value;
    }

    public function decreaseSpeed($value){
        $this->speed -= $value;
    }

    public function getSpeed(){
        return $this->speed;
    }
}

class Car{
    use Speed;

    public function start() {
        $this->speed = 0;
        $this->increaseSpeed(10);
    }
}


$car = new Car();
echo "Initial speed: " . $car->getSpeed() . "\n";

$car->start();
echo "Speed after start: " . $car->getSpeed() . "\n";

$car->increaseSpeed(20);
echo "Speed after increase: " . $car->getSpeed() . "\n";

$car->decreaseSpeed(15);
echo "Speed after decrease: " . $car->getSpeed() . "\n";
?>
