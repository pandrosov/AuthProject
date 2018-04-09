<?php
  unset($_COOKIE['username']);
  setcookie('username','', time()-(60*60*24*7));
  session_start();  
  unset($_SESSION['logged_user']);
  unset($_SESSION['logged_name']);
  header('Location: index.php'); 

?>