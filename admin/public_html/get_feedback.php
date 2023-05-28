<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once 'assets/php/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = mysqli_query($connection, "SELECT * FROM `feedback` WHERE id = '$id'");
    $feedback = mysqli_fetch_assoc($sql);

    $jsonResponse = json_encode($feedback);
    
    echo $jsonResponse;
}
?>