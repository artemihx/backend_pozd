<?php
$login = !empty($_GET['login']) ? $_GET['login'] : '';
$password = !empty($_GET['password']) ? $_GET['password'] : '';
$responce = '';

if ($login === 'admin') {
    if($password === 'Pa$$w0rd')
    {
        $isAuthorized = true;
        $responce = 'Логин и пароль верные!';
    }
    else
    {
        $responce = 'Неверный пароль!';
    }
} else {
    $responce = 'Пользователь не найден!';
    $isAuthorized = false;
}
?>
<html>
<head>
    <title>Результат авторизации</title>
</head>
<body>
<p>
    <?= $responce ?>
</p>
</body>
</html>


