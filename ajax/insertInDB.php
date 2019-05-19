<?php
require_once('../DB.php');

$db = new DB('localhost', 'natnetApp', 'root', "");

$name = $_POST['name'];
$second_name = $_POST['second_name'];
$age = $_POST['age'];

$sql = "INSERT INTO users_table (id, name, second_name, age) VALUES (NULL, '$name', '$second_name', '$age')";

$db->openConnect();

$db->createQuery($sql);

$db->closeConnect();

?>