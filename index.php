<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title></title>
</head>
<body>
<?php
	session_start();

	if(empty($_COOKIE['username'])){

?>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

 		<li><a href="login.php">Авторизация<?php ?></a></li>
  		<li><a href="signup.php">Регистрация</a></li>
      </ul>
  </div>
<?php
}
else{
	?>

	<p>Welcome to web-page, <?php echo $_COOKIE['username'] ?></br> <a href="logout.php">Exit</a></p>
<?php	
}
?>

</body>
</html>

