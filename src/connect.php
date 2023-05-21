<?php
require_once 'createdb.php';

$hostname = 'localhost';
$username = '';
$password = '';
$database = '';

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

$tableName = 'feedback';
$query = "SHOW TABLES LIKE '$tableName'";
$result = mysqli_query($connection, $query);

$result && mysqli_num_rows($result) > 0 ?: createTableIfNotExists($connection, $tableName);

$tableAdmin = 'admin_user';
$queryAdmin = "SHOW TABLES LIKE '$tableAdmin'";
$resultAdmin = mysqli_query($connection, $queryAdmin);

$resultAdmin &&  mysqli_num_rows($resultAdmin) > 0 ?: createAdminIfNotExists($connection, $tableAdmin);

?>