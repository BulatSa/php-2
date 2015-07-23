<?php
  function showSqlErrors ($functionName) {
    global $link;
    echo "Ошибка $functionName <br>"
      .mysqli_errno($link)
      . " : "
      .mysqli_error($link)."<br>";
  }

  function addItemToCatalog($title, $author, $pubyear, $price) {
    $sql = "INSERT INTO catalog (title, author, pubyear, price) VALUES ('$title', '$author', '$pubyear', '$price')";
    global $link;

    if (!$stmt = mysqli_prepare($link, $sql)) {
      showSqlErrors("addItemToCatalog");
      return false;
    }

    mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
  }

  function selectAllItems() { // Вывод всех товаров
    global $link;
    $sql = "SELECT id, title, author, pubyear, price FROM catalog";
    if (!$result = mysqli_query($link, $sql)) {
      showSqlErrors("selectAllItems");
      return false;
    }
    $items = mysqli_fetch_all($result, MYSQL_ASSOC);
    mysqli_free_result($items);
    return $items;
  }

  function saveBasket() { // Сохранение товаров в корзину
    global $basket;
    $basket = base64_encode(serialize($basket));
    setcookie('basket', $basket, 0x7FFFFFFF);
  }

  function basketInit() {
    global $basket, $count;
    if (!isset($_COOKIE['basket'])) {
      $basket = ['orderid' => uniqid()];
      saveBasket();
    } else {
      $basket = unserialize(base64_decode($_COOKIE['basket']));
      $count = count($basket) - 1;
    }
  }

  function add2Basket($id) {
    global $basket;
    $basket[$id] = 1;
    saveBasket();
  }