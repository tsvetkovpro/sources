<?php
// Инициализируем переменную для подсчета количества посещений
// Если соответствующие данные передавались через куки
// сохраняем их в эту переменную
$visit_counter = 0;
if(isset($_COOKIE['visitCounter']) && is_numeric($_COOKIE['visitCounter'])){
	$visit_counter = $_COOKIE['visitCounter'] * 1;
}
// Приращиваем счетчик посещений
$visit_counter++;

// Инициализируем переменную для хранения значения последнего посещения страницы
// Если соответствующие данные передавались из куки, сохраняем их в эту переменную
$last_visit = '';
if(isset($_COOKIE['lastVisit'])){
	$last_visit = stripslashes(trim(htmlspecialchars($_COOKIE['lastVisit'],ENT_QUOTES)));
}

// Устанавливаем куки
setcookie('visitCounter', $visit_counter, 0x7FFFFFFF);
setcookie('lastVisit', date('d/m/Y H:i:s'), 0x7FFFFFFF);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Последний визит</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>Последний визит</h1>

<?php
// Выводим информацию о количестве посещений и дате последнего посещения
if($visit_counter == 1){
	print '<h2>Добро пожаловать!</h2>';
}else{
	print <<<HTML
	<h2>Вы здесь уже $visit_counter раз</h2>
	<p>Последнее посещение: $last_visit</p>
HTML;
}
?>

</body>
</html>