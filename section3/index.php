<?php
require './Persion.php';
require './Student.php';

$student = new Student();
$student->setName("John");
$student->setAge(20);
$student->setMajor("Computer Science");
echo $student->introduce();
