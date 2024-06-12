<?php

interface Animal{
    public function makeSound();
    public function eat();
}

class Dog implements Animal {
    public function makeSound() {
        return "Woof!";
    }

    public function eat() {
        return "The dog is eating.";
    }
}

// Przykładowe użycie:
$dog = new Dog();
echo $dog->makeSound() . "\n";
echo $dog->eat() . "\n";
?>
