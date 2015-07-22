<?php
/* Основные настройки */
  define('DB_HOST', 'localhost');
  define('DB_LOGIN', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'php-2');
  $link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
/* Основные настройки */

/* Сохранение записи в БД */
  if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['msg'])) {
    //$name = mysqli_real_escape_string($link, trim(strip_tags($_POST['name'])));
    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags($_POST['email']));
    $msg = trim(strip_tags($_POST['msg']));
    $sql = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
    //echo DB_HOST;
    $result = mysqli_query($link, $sql);
    if (!$result) {
      echo 'Ошибка! '
        .mysqli_errno($link)
        .':'
        .mysqli_error($link);
    }
  }
/* Сохранение записи в БД */

/* Удаление записи из БД */
  if (!empty($_GET[del]) and !empty($_GET[id])) {
    $del = trim(strip_tags($_GET['del']));
    $id = trim(strip_tags($_GET['id']));
    $delSql = "DELETE FROM msgs WHERE id = $del";
    //echo "Запрос на удалени" . $delSql;
    mysqli_query($link, $delSql);
  }
/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
  Имя: <br /><input type="text" name="name" /><br />
  Email: <br /><input type="text" name="email" /><br />
  Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

  <input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
  $outSql = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime)
                 as dt
                 FROM msgs
                 ORDER BY id DESC";
  $outResult = mysqli_query($link, $outSql);
  $row_count = mysqli_num_rows($outResult);
  mysqli_close($link);
/* Вывод записей из БД */
?>
<p>Всего записей в гостевой книге: <?= $row_count ?></p><hr>
<?
//$row = mysqli_fetch_assoc($outResult);
//print_r ($row);
  while ($row = mysqli_fetch_assoc($outResult)) {
    $timeMsg = $row[dt];
    echo "<p><a href='mailto:$row[email]'>$row[name]</a> "
      .date('d-m-Y', $timeMsg)
      ." в "
      .date('H:i', $timeMsg)
      ." написал:<br> $row[msg]</p>";
    echo "<p align='left'><a href='/index.php?id=gbook&del=$row[id]'>Удалить</a></p><hr>";
  }
?>
<p></p>
