<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
require_once 'assets/php/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROTEKTOR | Dashboard</title>
</head>

<body>
  <div class='table__wrapper'>
    <div class='table_top'>
      <h1>Обращения</h1>
      <a href="assets/php/logout.php" class="logout">Выход</a>
    </div>
    <table border="1" class='table'>
      <caption>Таблица обращений</caption>
      <tr>
        <th class='table_id'>Номер обращения</th>
        <th>Почта</th>
        <th class='table_watch'>Просмотреть</th>
      </tr>
      <?php
        $sql = mysqli_query($connection, "SELECT * FROM `feedback`");
        $feedback = mysqli_fetch_all($sql);
        foreach($feedback as $item) {
      ?>
        <tbody>
          <td><?=$item[0]?></td>
          <td><?=$item[3]?></td>
          <td>
            <a href="feedback.php?id=<?=$item[0]?>">Просмотреть</a>
          </td>
        </tbody>
      <?php
        }
      ?>  
    </table>
  </div>
  <script src="about.js"></script>
</body>

</html>
