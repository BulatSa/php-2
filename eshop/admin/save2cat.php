<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require_once "../inc/config.inc.php";
	require_once "../inc/lib.inc.php";

	if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['price'])) {
		$title = trim(strip_tags($_POST['title']));
		$author = trim(strip_tags($_POST['author']));
		$pubyear = (int)trim(strip_tags($_POST['pubyear']));
		$price = (int)trim(strip_tags($_POST['price']));
		if (!addItemToCatalog($title, $author, $pubyear, $price)) {
			echo 'Произошла ошибка при добавлении товара в каталог<br>'
			.mysqli_errno($link)
			. " : "
			.mysqli_error($link);
		} else {
			header("Location: add2cat.php");
			exit;
		}
	}