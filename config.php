<?php
  $db_hostname = "localhost";
  $db_username = "db84843";
  $db_password = "sudo1234";
  $db_database = "84843_back";

  $mysql = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
 ?>
