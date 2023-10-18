<?php
if (!empty($_FILES['attachment'])) {
    $file = $_FILES['attachment'];
    
    $srcFileName = $file['name'];
    $newFilePath = __DIR__ . '/uploads/' . $srcFileName;

    $allowedExtensions = ['jpg', 'png', 'gif'];
    $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);
    if (!in_array($extension, $allowedExtensions)) {
        $error = 'Загрузка файлов с таким расширением запрещена!';
    } elseif ($_FILES['attachment']['size'] > 8000000){
        $error = 'Файл не должен превышать 8 МБ!'; 
    } elseif ($file['error'] !== UPLOAD_ERR_OK) {
        $error = 'Ошибка при загрузке файла.';
    } elseif (file_exists($newFilePath)) {
        $error = 'Файл с таким именем уже существует';
    } elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
        $error = 'Ошибка при загрузке файла';
    } elseif(getimagesize($newFilePath)[0] > 1280 || getimagesize($newFilePath)[1] > 720){
        $error = 'Размер картинки больше 1280x720';
    } else {
        $result = '/phpBasic/upload/uploads/' . $srcFileName;
    }
}
?>
<html>
<head>
    <title>Загрузка файла</title>
</head>
<body>
<?php if (!empty($error)): ?>
    <?= $error ?>
<?php elseif (!empty($result)): ?>
    <?= $result ?>
<?php endif; ?>
<br>
<form action="/phpBasic/upload/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment">
    <input type="submit">
</form>
</body>
</html>


<?php

//Все комбинации заданной длины не смог :(
$str = '1 2 3 4 5';
$array = explode(' ', $str);
$k = 2;

?>