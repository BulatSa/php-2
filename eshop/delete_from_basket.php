<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	if (isset($_GET['id'])) {
		deleteItemFromBasket($_GET['id']);
		header("Location: basket.php");
	} else header("Location: catalog.php");
