
<head>
  <link href='style.css' rel='stylesheet' type='text/css'>
  <title>REGISTRATION</title>
</head>


<?php

    if (isset($_POST['username'])) { $username = $_POST['username']; if ($username == '') { unset($username);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
	if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($username) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("<br /> <br /><h3>Вы ввели не всю информацию, вернитесь назад и заполните все поля!</h3>");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
	$email = stripslashes($email);
    $email = htmlspecialchars($email);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $username = trim($username);
	$email = trim ($email);
    $password = trim($password);
 // подключаемся к базе
    include ("include/connected.php");
 // проверка на существование пользователя с таким же логином
    $result = mysqli_query($db, "SELECT id FROM usersdata WHERE username='$username'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("<br /> <br /><h3>Извините, введённый вами логин <p class=\"error\">уже зарегистрирован.</p> Введите другой логин.</h3>");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysqli_query ($db,"INSERT INTO usersdata (username, email, password) VALUES('$username','$email','$password')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "<br /> <br /><h3>Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='intropage.php'><br/>Главная страница</a></h3>";
    }
 else {
    echo "<br /> <br /><h3 class=\"error\">Ошибка! Вы не зарегистрированы.<h3>";
    }
    ?>