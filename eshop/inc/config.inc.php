<?php
  define('DB_HOST', 'localhost');
  define('DB_LOGIN', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'eshop');
  define('ORDERS_LOG', 'orders.log');

  $basket = []; // Корзина покупателя
  $count = 0; // Кол-во товаров в корзине

  $link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
  if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  }; //else echo 'Соединение установлено... ' . mysqli_get_host_info($link) . "<br>";

