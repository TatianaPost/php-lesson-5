<?php 
	//echo "<strong>_POST array:</strong> <br>";
	//print_r($_POST);
	//echo "<br><br>";

	if (!empty($_POST)) {
		$message = "Вам пришло новое сообщение с сайта: \n" 
		. "Имя отправителя: " . $_POST['userName'] . "\n"
		. "Email отправителя: " . $_POST['userEmail'] . "\n"
		. "Сообщение:\n" . $_POST['message'];
        
		//Откуда пришло письмо
		$headers = "Наш сайт: formanum@webdev.ru";
		$resultMail = mail("tpostolova@gmail.com", "Сообщение с сайта", $message, $headers);	
		if ($resultMail) {
			header('Location: success.html');
			//echo "Сообщение отправлено успешно!";
		} else {
			echo "Ошибка! Письмо не отправлено. Проверьте правильность заполнения формы.";
		}
	}
	//Функция передачи письма. Необязательные параметры в [] скобках (здесь это доп заголовки и доп параметры)
	//bool mail (string to, string subject, string message [, string additional_headers [, string additional_parameters]])
 ?>

<form action="index.php" method="post">
 	<input type="text" name="userName" placeholder="Ваше имя"><br>
 	<input type="text" name="userEmail" placeholder="Ваш Email"><br>
 	<textarea name="message" id="" cols="30" rows="10" placeholder="Сообщение"></textarea><br>
 	<input type="submit" value="Отправить форму">
 </form>