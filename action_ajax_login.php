<?php
//аутентификация пользователя
	include 'functions.php';
	
	$filename = "users.xml";


	$data = $_POST;
	$errors = array();
	$status;
	$test;
	$location;
	$user_username = sanitizeString($data['login']);	


	
	//проверка полей
	if( $user_username == '' ) {
		$errors = 'Write login!';
	}

	if( $data['password'] == '' ) {
		$errors = 'Write password!';
	}

	$dom = new domDocument("1.0", "utf-8");

	if( empty($errors) ){
		  	$dom->load($filename); // Загружаем XML-документ из файла в объект DOM
  			$root = $dom->documentElement; // Получаем корневой элемент
  			$childs = $root->childNodes; // Получаем дочерние элементы у корневого элемента
  			/* Перебираем полученные элементы */
  			for ($i = 0; $i < $childs->length; $i++) {
    			$user = $childs->item($i); // Получаем следующий элемент из NodeList
    			$lp = $user->childNodes; // Получаем дочерние элементы у узла "user"
    			$login = $lp->item(0)->nodeValue; 
    			$password = $lp->item(1)->nodeValue;
    			$name = $lp->item(2)->nodeValue; 
    			
    			if( ($login == sanitizeString($data['login'])) && ($password == hashPassword($data['password'])) ) {
    				if(!isset($COOKIE['username'])){
    					setcookie('username',$name, time() + (60*60*24*7));
    					$_SESSION['logged_user'] = $login;
    					$_SESSION['logged_name'] = $name;
	    			}

					$status = "Data is correct. Please go to main web-page<a href=index.php>   Click   </a>";
					$test = "GO";
					break;
    			}
    			else{
    				$status = "Login or password is incorrect";
					$test = "NO";

    			}
    			
    		}
    		
	}
	else{
		$status = $errors;
		$test = "NO";
	}

	$result = array(
		'status' => $status,
		'test' => $test
	);

	echo json_encode($result);

?>