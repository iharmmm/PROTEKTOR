<?php

$hostname = 'localhost';
$username = 'cz97544_protect';
$password = 'LrVhRf2W';
$database = 'cz97544_protect';

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}
?>