<?php

class A {
    public static function test(int $x)
    {
        return 'x = ' . $x;
    }
}

echo A::test(5);

class User
{
    private $role;

    private $name;

    public function __construct(string $role, string $name)
    {
        $this->role = $role;
        $this->name = $name;
    }

    public static function createAdmin(string $name)
    {
        return new self('admin', $name);
    }
}

$admin = new User('admin', 'Иван');

$admin = User::createAdmin('Иван');
var_dump($admin);

class B
{
    public static $x;

    public function getX()
    {
        return self::$x;
    }
}

B::$x = 5;
$b = new B();
var_dump($b::$x); // 5
var_dump($b->getX());

class Human
{
    private static $count = 0;

    public function __construct()
    {
        self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }
}

echo '<br>';
echo 'Людей уже ' . Human::getCount(); 


$human1 = new Human();
$human2 = new Human();
$human3 = new Human();
echo '<br>';
echo 'Людей уже ' . Human::getCount();