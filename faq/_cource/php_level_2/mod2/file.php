<?php
/*
ЗАДАНИЕ 1
- Установите константу для хранения имени файла
- Проверьте, отправлялась ли форма и корректно ли отправлены данные из формы
- В случае, если форма была отправлена, отфильтруйте полученные значения
- Сформируйте строку для записи с файл
- Откройте соединение с файлом и запишите в него сформированную строку
- Выполните перезапрос текущей страницы (чтобы избавиться от данных, отправленных методом POST)
*/
define('filename', 'user.txt');

if (
	isset($_POST['fname']) && !empty($_POST['fname']) && 
	isset($_POST['lname']) && !empty($_POST['lname'])
) {
	$fname = stripslashes(trim(htmlspecialchars($_POST['fname'],ENT_QUOTES)));
	$lname = stripslashes(trim(htmlspecialchars($_POST['lname'],ENT_QUOTES)));

	$str = $fname . ' ' . $lname . "\r\n";

	$f = fopen(filename, 'a');
	if (is_resource($f)) {
		fputs($f, $str);
		fclose($f);
	}

	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Работа с файлами</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

Имя: <input type="text" name="fname" /><br />
Фамилия: <input type="text" name="lname" /><br />

<br />

<input type="submit" value="Отправить!" />

</form>

<?php
/*
ЗАДАНИЕ 2
- Проверьте, существует ли файл с информацией о пользователях
- Если файл существует, получите все содержимое файла в виде массива строк
- В цикле выведите все строки данного файла с порядковым номером строки
- После этого выведите размер файла в байтах.
*/
if (file_exists(filename)) {
	
	$lines = file(filename);
	
	if (is_array($lines)) {
		echo '<hr /><pre>';

		$i = 1;
		foreach ($lines as $line) {
			echo $i, ' ', $line, '<br />';
			$i++;
		}

		echo '</pre>';

	}
	echo '<p>File size: ', filesize(filename), ' baitikov</p>';
	echo "!";
}
?>

</body>
</html>