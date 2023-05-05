<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['comment']; 
    $phone = $_POST['numberPhone'];


    $subject = "=?utf-8?B?".base64_encode("Вопрос по грузоперевозкам")."?=";
    $headers ="From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

    $to = "email";
    $success = mail($to, $subject,"Имя: ".$name.
    "<br>Номер телефона: ".$phone. "<br>Эл. почта: ". $email. "<br>Сообщение: ".$message, $headers);

    header("Location: ../../index.html");
    
?>