<?php
require_once('connect.php');
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM admin_user WHERE email = '$email'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        
        header('Location: ../../index.php');
        mysqli_close($connection);
        exit();
    } else {
        session_start();
        $_SESSION['message'] = 'Не верный email или пароль';
        header('Location: ../../login.php');
    }
} else {
    session_start();
    $_SESSION['message'] = 'Не верный email или пароль';
    header('Location: ../../login.php');
}

mysqli_close($connection);
?>