<?php 
require './Shape.php';
require './Rectangle.php';
require './Circle.php';
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

echo "Area of the circle: " . $circle->area() . PHP_EOL;
echo "Area of the rectangle: " . $rectangle->area() . PHP_EOL;