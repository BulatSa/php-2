<?php
  function addItemToCatalog($title, $author, $pubyear, $price) {
    $sql = "INSERT INTO catalog (title, author, pubyear, price) VALUES ('$title', '$author', '$pubyear', '$price')";
    $globalLink = $GLOBALS['link'];

    if (!$stmt = mysqli_prepare($globalLink, $sql)) {
        echo 'Ошибка lib <br>'
          .mysqli_errno($globalLink)
          . " : "
          .mysqli_error($globalLink);
      return false;
    }

    mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
    //    if (mysqli_query($globalLink, $sql)) {
    //      return true;
    //    } else {
    //        echo 'Ошибка lib <br>'
    //          .mysqli_errno($globalLink)
    //          . " : "
    //          .mysqli_error($globalLink);
    //        return false;
    //      }
  }