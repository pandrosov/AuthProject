 <?php

	include 'functions.php';

	$filename = "users.xml";


	$data = $_POST;
	$errors = array();
	$status;
	$test;
	$flag = false;

	//проверка полей
	if( sanitizeString($data['login']) == '' ) {
		$errors = 'Write login!';
	}

	if( sanitizeString($data['email']) == '' ) {
		$errors = 'Write Email!';
	}

  	if( sanitizeString($data['name']) == '' ) {
		$errors = 'Write name!';
	}

	if( $data['password'] == '' ) {
		$errors = 'Write password!';
	}

	if( $data['conf_password'] != $data['password'] ) {
		$errors = 'Confirm pass is incorrect!';
	}
		
	$dom = new domDocument("1.0", "utf-8"); // Создаём XML-документ версии 1.0 с кодировкой utf-8

	if( empty($errors) ){

		if(file_exists($filename)){
  			$dom->load("users.xml"); // Загружаем XML-документ из файла в объект DOM
  			$root = $dom->documentElement; // Получаем корневой элемент
  			$childs = $root->childNodes; // Получаем дочерние элементы у корневого элемента
  			/* Перебираем полученные элементы */


  			for ($i = 0; $i < $childs->length; $i++) {
    			$user = $childs->item($i); // Получаем следующий элемент из NodeList
    			$lp = $user->childNodes; // Получаем дочерние элементы у узла "user"
    			$login = $lp->item(0)->nodeValue; 
    			$email = $lp->item(3)->nodeValue; 
    			
    			if( ($login == $_POST['login']) || ($email == $_POST['email']) ) {
					$flag = true;
					break;
    			}
    		}
    		if($flag){
    				$status = "User with such login or email already exists";
					$test = "NO";
    			}
    			else{
    				$user = $dom->createElement("user"); // Создаём узел "user"
					$login = $dom->createElement("login", sanitizeString($_POST['login'])); 
					$email = $dom->createElement("email", sanitizeString($_POST['email'])); 
					$name = $dom->createElement("name", sanitizeString($_POST['name'])); 
					$password = $dom->createElement("password", hashPassword($_POST['password'])); // Создаём узел "password" с текстом внутри
					$user->appendChild($login); 
					$user->appendChild($password);
					$user->appendChild($name);
					$user->appendChild($email);
					$root->appendChild($user); 
					 
					$dom->save("users.xml"); 

					$status = "Congratulations<a href=index.php>You are registered. Go to the link for authorize</a>"; 
					$test = "OK";
   				
    			}
	}
	else{

		$root = $dom->createElement("users"); // Создаём корневой элемент
 		$dom->appendChild($root);
  		$user = $dom->createElement("user"); // Создаём узел "user"
		$login = $dom->createElement("login", sanitizeString($_POST['login'])); // Создаём узел "login" с текстом внутри
		$email = $dom->createElement("email", sanitizeString($_POST['email'])); // Создаём узел "login" с текстом внутри
		$name = $dom->createElement("name", sanitizeString($_POST['name'])); // Создаём узел "login" с текстом внутри
		$password = $dom->createElement("password", hashPassword($_POST['password'])); // Создаём узел "password" с текстом внутри
		$user->appendChild($login); 
		$user->appendChild($password);
		$user->appendChild($name);
		$user->appendChild($email);
		$root->appendChild($user); 
			 
		$dom->save("users.xml"); 

    	$status ="Congratulations<a href=index.php>You are registered. Go to the link for authorize</a> ";
    	$test = "OK";

  	}

		
}
else
{
	 $status = $errors;
	 $test = "NO";
}

$result = array(
	'status' => $status,
	'test' => $test
);

echo json_encode($result);	
 


?>