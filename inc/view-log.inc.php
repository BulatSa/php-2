<?
  $f = fopen("../log/" . PATH_LOG, "r") or die("Не удалось прочитать файл!" );
  $lines = [];
  $i = 0;
  while ($lines[] = fgets($f)) {
    echo $lines[$i];
    $i++;
  }
  fclose($f);