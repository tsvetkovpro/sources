<?php
// В виде костант храним правильные значения имени пользователя и md5-хэша пароля (p@$$w0rd)
define('login','admin');
define('pass','b7463760284fd06773ac2a48e29b0acf');

// Инициализируем переменные для хранения логина и пароля, которые введет пользователь
// Еслп пользователь ввел какие-либо данные, сохраняем их в эти переменные
$login = '';
$pass = '';
if(isset($_SERVER['PHP_AUTH_USER'])) $login = $_SERVER['PHP_AUTH_USER'];
if(isset($_SERVER['PHP_AUTH_PW'])) $pass = $_SERVER['PHP_AUTH_PW'];

// Проверяем введенные данные
if($login != login || md5($pass) != pass){
	// Первый запрос страницы, либо пользователь ввел неверные данные
	// Отправляем соответствующие заголовки
	header('HTTP/1.0 401 Unauthorized');
	header('WWW-Authenticate: Basic realm="Мой секретный сайт"');
	// Выводим информацию при вводе неправильных данных
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Доступ запрещен</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>Доступ запрещен</h1>

<p>Вы пытаетесь получить доступ к секретно части сайта. Для этого нужно знать логин и пароль.</p>

</body>
</html>


<?
}else{
	// Пользователь ввел корректные данные
	// Выводим секретную информацию
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Базовая аутентификация</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>Базовая аутентификация RFC-2617</h1>

<p>
Ваш логин: <?php echo $login; ?><br />
Ваш пароль: <?php echo $pass; ?>
</p>

</body>
</html>

<?php
}
?>