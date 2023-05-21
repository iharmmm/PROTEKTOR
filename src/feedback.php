<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
require_once 'assets/php/connect.php';
$id = $_GET['id'];
$sql = mysqli_query($connection, "SELECT * FROM `feedback` WHERE `id` = '$id'");
$feedback = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обращения №<?=$id?></title>
</head>
<body>
    <h1>Обращения №<?=$id?></h1>
    <ul>
        <li>
            <?=$feedback['name']?>
        </li>
        <li>
            <?=$feedback['phone_number']?>
        </li>
        <li>
            <?=$feedback['email']?>
        </li>
        <li>
            <?=$feedback['message']?>
        </li>
    </ul>
</body>
</html>