<?php
class Person
{
    private $name;
    private $age;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function introduce()
    {
        return "Hi, my name is " . $this->name . " and I am " . $this->age . " years old.";
    }
}
