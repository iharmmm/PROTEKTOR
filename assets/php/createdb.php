<?php
function createTableIfNotExists($connection, $tableName) {
    $query = "SELECT 1 FROM information_schema.tables WHERE table_name = '$tableName' LIMIT 1";
    $result = mysqli_query($connection, $query);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        phone_number VARCHAR(20) NOT NULL,
        email VARCHAR(50) NOT NULL,
        message TEXT,
        PRIMARY KEY (id)
    )";

    $result = mysqli_query($connection, $createTableQuery);
    if (!$result) {
        echo "Ошибка при создании таблицы: " . mysqli_error($connection);
    }
}
function createAdminIfNotExists($connection, $tableAdmin)
{
    $query = "SELECT 1 FROM information_schema.tables WHERE table_name = '$tableAdmin' LIMIT 1";
    $result = mysqli_query($connection, $query);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS $tableAdmin (
    id INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
    )";

    $result = mysqli_query($connection, $createTableQuery);
    if($result)
    {
        $password = '12345';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $resultAdminAdd = mysqli_query($connection, "INSERT INTO `admin_user` (`email`, `password`) VALUES ('admin@admin.ru', '$hashedPassword')");
        if(!$resultAdminAdd)
        {
            echo "Ошибка при создании администратора: " . mysqli_error($connection);
        }
    } else {
        echo "Ошибка при создании таблицы: " . mysqli_error($connection);
    }
}
?>
