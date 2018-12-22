<?php

//Script Foreach
$c = true;

$project_name = "Турагенство г. Харьков";
$admin_email  = "info@soultravel.com.ua";
$form_subject = "Заполнение формы LP1";
$email = trim($_POST['email']);
$name = trim($_POST['name']);
$destination = trim($_POST['destination']);
$tel = trim($_POST['tel']);

$ref = trim($_SERVER['HTTP_REFERER']);

if ($email && filter_var($email, FILTER_VALIDATE_EMAIL))
{
 	$message = "
<b>Имя</b> - $name	</br>
<b>E-mail</b> - $email </br>
<b>Куда</b> - $destination </br>
<b>Телефон</b> - $tel  </br>

<b>источник</b> - $ref	 </br>
";


	function adopt($text) {
		return '=?UTF-8?B?'.base64_encode($text).'?=';
	}

	$headers = "MIME-Version: 1.0" . PHP_EOL .
	"Content-Type: text/html; charset=utf-8" . PHP_EOL .
	'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
	'Reply-To: '.$admin_email.'' . PHP_EOL;

	mail($admin_email, adopt($form_subject), $message, $headers );
}