<?php

class Rectangle
{
    private $x;
    private $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}

class Square implements CalculateSquare
{
    private $x;

    public function __construct(float $x)
    {
        $this->x = $x;
    }

    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }
}

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Circle implements CalculateSquare
{
    const PI =  3.1416;

    private $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float
    {
        $pi = 3.1416;
        return self::PI * ($this->r ** 2);
    }
}

$circle1 = new Circle(2.5);
var_dump($circle1 instanceof Circle);

echo '<br>';

$circle1 = new Circle(2.5);
var_dump($circle1 instanceof Rectangle);

echo '<br>';

$circle1 = new Circle(2.5);
var_dump($circle1 instanceof CalculateSquare);

echo '<br>';

$objects = [
    new Square(5),
    new Rectangle(2, 4),
    new Circle(5)
];

foreach ($objects as $object) {
    if ($object instanceof CalculateSquare) {
        echo 'Объект реализует интерфейс CalculateSquare. Площадь: ' . $object->calculateSquare() . ' .Это объект класса: ' . get_class($object);
        echo '<br>';
    }
    else
    {
        echo 'Объект класса '.  get_class($object) .  ' не реализует интерфейс CalculateSquare.';
        echo '<br>';
    }
}

echo '<br>';

echo get_class($circle1);