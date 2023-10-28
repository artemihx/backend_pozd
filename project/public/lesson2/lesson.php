<?php

class Cat
{
    private $name;
    private $color;
    public $weight;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello()
    {
        echo 'Мяу! Я ' . $this->name . '.' .' Мой цвет - ' . $this->color;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function getColor(): string 
    {
        return $this->color;
    }
}

$cat1 = new Cat('Снежок', 'white');
$cat1->setName('Снежок');
$cat1->weight = 3.5;

$cat2 = new Cat('Кузьма', 'grey');
$cat2->setName('Кузьма');
$cat2->weight = 5.2;

$cat1->sayHello();
echo '<br>';
$cat2->sayHello();
echo '<br>';
echo $cat1->getName();
echo '<br>';
echo $cat2->getName();
echo '<br>';
echo $cat1->getColor();
echo '<br>';
echo $cat2->getColor();
$cat2->setColor('black');
echo ' ' . $cat2->getColor();


