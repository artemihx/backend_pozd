<?php

class A
{
    public function sayHello()
    {
        return 'Hello, I am A';
    }
}

$a = new A();

var_dump($a instanceof A); 

class B extends A
{
    public function sayHello()
    {
        return parent::sayHello() . '. It was joke, I am B :)';
    }
}

$b = new B();

var_dump($b instanceof B); 
var_dump($b instanceof A); 
var_dump($a instanceof B);

echo $b->sayHello();