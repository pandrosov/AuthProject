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
   <form method="POST" id="ajax_form" action="" >

    <div class="form-group col-lg-6">      

        <label>Login</label>
        <input type="login" class="form-control" name="login" id="exampleInputLogin" placeholder="Login" value="<?php @ $_POST['login'];?>">

        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        
        <label>Confirm password</label>
        <input type="password" class="form-control" name="conf_password" placeholder="Confirm password">
            
        <label>Email</label>
        <input type="text" class="form-control" name="email" id="exampleInputEmail" placeholder="Email" value="<?php @ $_POST['login'];?>">

        <label>Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputText" placeholder="Name" value="<?php @ $_POST['login'];?>">
        </br>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default btn-login" id="btn">Sign up</button>
            
            <button type="reset" class="btn btn-default">Reset</button>

            </br>
            </br>
            </br>
            
            <div id="result_form"><div> 


        </div>


     </div>
    </form>


 <br>

 
</body>
</html>

