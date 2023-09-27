<?php
require './Config.php';
require './Connection.php';
require './Database.php';
//1.
$db = new Database();
$data = $db->query('SELECT * FROM users');
echo '<pre>';
print_r($data);


//2.
$user = array(
    array("name" => "Người 1", "email" => "nguoi1@example.com"),
    array("name" => "Người 2", "email" => "nguoi2@example.com"),
    array("name" => "Người 3", "email" => "nguoi3@example.com"),
    array("name" => "Người 4", "email" => "nguoi4@example.com"),
    array("name" => "Người 5", "email" => "nguoi5@example.com"),
    array("name" => "Người 6", "email" => "nguoi6@example.com"),
    array("name" => "Người 7", "email" => "nguoi7@example.com"),
    array("name" => "Người 8", "email" => "nguoi8@example.com"),
    array("name" => "Người 9", "email" => "nguoi9@example.com"),
    array("name" => "Người 10", "email" => "nguoi10@example.com")
);

$db->insert($user);
