<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Форма выгрузки</h1>
<form method="post" id="form" action="/ajax/insertInDB.php">
    <span>Имя</span>
    <input type="text" name="name" id="">
    <br>
    <span>Фамилия</span>
    <input type="text" name="second_name" id="">
    <br>
    <span>Возраст</span>
    <input type="text" name="age" id="">
    <br>
    <input type="submit" name="" id="" value="Сохранить">
    <button id="push">Выгрузить</button>
</form>
<footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="script.js"></script>
</footer>
</body>
</html>
