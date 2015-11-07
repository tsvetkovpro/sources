<?php

$visitCounter = 0;
if (isset($_COOKIE['visitCounter']) && is_numeric($_COOKIE['visitCounter'])) {
	$visitCounter = $_COOKIE['visitCounter'] *1;
}
$visitCounter++;

if (isset($_COOKIE['lastVisit'])) {
	$lastVisit = stripslashes(trim(htmlspecialchars($_COOKIE['lastVisit'], ENT_QUOTES)));
}

setcookie('visitCounter', $visitCounter, 0x7FFFFFFF);
setcookie('lastVisit', date('d/m/Y H:i:s'), 0x7FFFFFFF);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Последний визит</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<h1>Последний визит</h1>

<?php
if ($visitCounter == 1) {
	print '<h2>Welcome</h2>';
}else{

	print <<<HTML
	<h2>Вы здесь уже $visitCounter раз</h2>
	<p>Последнее посещение: $lastVisit</p>
HTML;
}
?>

</body>
</html>