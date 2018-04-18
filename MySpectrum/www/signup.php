<?php
  if (isset($_POST['signup'])) {
    $firstname = mysql_real_escape_string(htmlspecialchars(trim($_POST['firstname'])));
    $surname = mysql_real_escape_string(htmlspecialchars(trim($_POST['surname'])));
    $email = mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
    $password = mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
    $login = mysql_num_rows(mysql_query("select * from 'USER' where 'email' = '$email'"));

    if ($login != 0) {
      echo "exist";
    } else {
      $q = mysql_query("insert into 'USER' ('firstname', 'surname', 'email', 'password') values ('$firstname','$surname','$email','$password')");

      if ($q) {
        echo "success!";
      } else {
        echo "failed!";
      }
    }
    echo mysql_error();
  }
?>
