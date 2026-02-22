<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Авторизация</title>
<link rel="stylesheet" href="/css/auth.css" />
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/footer.css">
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet" />
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>

<main class="auth-main">
  <div class="auth-container">
    <div class="auth-title">Регистрация</div>
    <form class="auth-form" action="/add.php" method="POST">
      <label class="auth-label" for="fio">Имя</label>
      <input class="auth-input" type="text" id="fio" name="fio" placeholder="Введите ваше имя пользователя" required />

      <label class="auth-label" for="login">Логин</label>
      <input class="auth-input" type="text" id="login" name="login" placeholder="Введите ваш логин" required />

      <label class="auth-label" for="email">Email</label>
      <input class="auth-input" type="email" id="email" name="email" placeholder="Введите ваш email" required />

      <label class="auth-label" for="password">Пароль</label>
      <input class="auth-input" type="password" id="password" name="password" placeholder="Введите ваш пароль" required />
      
      <label class="auth-label" for="repeatpassword">Повторить пароль</label>
      <input class="auth-input" type="password" id="repeatpassword" name="repeatpassword" placeholder="Повторите ваш пароль" required />

      <button class="auth-button" type="submit">Зарегистрироваться</button>
      <a class="auth-link" href="/auto">Уже есть аккаунт? Войти</a>
    </form>
  </div>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>

</body>
</html>