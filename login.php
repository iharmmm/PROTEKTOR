<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROTEKTOR | Вход</title>
</head>
<body>
  <form action="assets/php/auth.php" method="post" class='form'>
    <?php
      if ($_SESSION['message']) {
          echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
      }
      unset($_SESSION['message']);
    ?>
    <label>
      E-mail
      <input type="email" placeholder='E-mail' name='email' required>
    </label>
    <label>
      Пароль
      <input type="password" placeholder='Пароль' name='password' required>
    </label>
    <button type='submit'>Вход</button>
  </form>
</body>
</html>