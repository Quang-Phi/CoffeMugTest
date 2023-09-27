<?php
class Student extends Person {
    private $major;

    public function setMajor($major) {
        $this->major = $major;
    }

    public function getMajor() {
        return $this->major;
    }

    public function introduce() {
        return "Hi, my name is " . $this->getName() . " and I am " . $this->getAge() . " years old. I am majoring in " . $this->major;
    }
}

