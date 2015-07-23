<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	$goods = selectAllItems();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?= $count?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<?foreach($goods as $item) {?>
<tr>
	<th>Название: <?= $item[title]?></th>
	<th>Автор: <?=$item[author]?></th>
	<th>Год издания: <?=$item[pubyear]?></th>
	<th>Цена, руб.: <?=$item[price]?></th>
	<th><a href="add2basket.php?id=<?=$item[id]?>">В корзину</a></th>
</tr>
<?php
}
?>
</table>
</body>
</html>