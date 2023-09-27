<?php
class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return M_PI * pow($this->radius, 2);
    }
}