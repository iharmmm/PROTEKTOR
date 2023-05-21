<?php
function addToDataBase($connection, $name, $email, $message, $phone)
{
    $result = mysqli_query($connection, "INSERT INTO `feedback` (`name`, `phone_number`, `email`, `message`) VALUES ('$name', '$phone', 
                       '$email', '$message')");

    if (!$result) {
        echo "Ошибка при добавление записи: " . mysqli_error($connection);
    }
    else {
        mysqli_close($connection);
        header("Location: ../../index.html");
    }
    
}
?>