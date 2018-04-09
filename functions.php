<?php

session_start();


function sanitizeString($var) {
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = trim($var);
   	$var = htmlentities($var);    
    return $var;
 }

 function hashPassword($password){
 	$hash1 = md5($password);           // Хешируем первоначальный пароль
  	$salt = 'gadsgfgjrtgr';            // Соль
  	$saltedHash = md5($hash1 . $salt); // Складываем старый хеш с солью и пропускаем через функцию md5()
  	return $saltedHash;

 }




?>