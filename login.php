<?php
    include 'functions.php';

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>  
    <script src="js/ajax.js"></script>  
    
	<title></title>
</head>
<body>

<form action="php/singup.php" method="POST" id="login_form">
 <div class="form-group col-lg-6" > 	 

      <label>Login</label>
        <input type="login" class="form-control" name="login" id="exampleInputLogin" placeholder="Login" value="<?php @ $_POST['login'];?>">

        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">

     <div class="btn-group" role="group">
        </br>
	   <button type="button" id="btn1" class="btn btn-default btn-login">Login</button>
    </br>
    </br>
    </br>
    
        <div id="result_form"><div> 

     </div>

 </div>
</form>

</body>
</html>

