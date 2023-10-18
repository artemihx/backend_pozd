<html>
<head>
    <title>Форма входа</title>
</head>
<body>
<form action="/phpBasic/login.php" method="post">
    <label>
        Логин <input type="text" name="login">
    </label>
    <br>
    <label>
        Пароль <input type="password" name="password">
    </label>
    <br>
    <input type="submit" value="Войти">
</form>
</body>
</html>

<?php 
//На вход подается строка из чисел, разделенных пробелами.
//Найдите все числа, встречающиеся 2 и более раз. Выведите их в любом порядке, разделяя пробелами.

$str = '3 2 5 2 1 3';
echo '<br>'. $str;
$array = explode(' ', $str);
$duplicate = [];

echo '<br>';
foreach($array as $el)
{
    if(!isset($duplicate[$el]))
    {
        $duplicate[$el] = 1;
    }
    else
    {
        $duplicate[$el]++;
    }

    if($duplicate[$el] === 2)
    {
        echo $el . ' ';
    }
}

//На вход подается строка из чисел, разделенных пробелами.
//Найдите максимальное произведение двух чисел из этой строки.

$str = '1 2 3 4';
$nums = explode(' ', $str);

$max = 0;
foreach($nums as $i => $num1)
{
    foreach($nums as $j => $num2)
    {
        if($i === $j)
        {
            continue;
        }
        if(($num1 * $num2) > $max)
        {
            $max = $num1 * $num2;
        }
    }
}

echo '<br>';
echo 'максимальное произведение: ' . $max;
?>