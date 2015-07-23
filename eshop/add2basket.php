<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	$id = $_GET['id']; // ID добавл€емого товара
	add2Basket($id);
	header('Location: catalog.php');

