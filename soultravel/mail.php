<?php

//Script Foreach
$c = true;

$project_name = "Турагенство г. Харьков";
$admin_email  = "info@soultravel.com.ua";
$form_subject = "Заявка на подбор";
//$email = trim($_POST['email']);
$tel = trim($_POST['tel']);
$name = trim($_POST['name']);
$mes = trim($_POST['message']);
$ref = trim($_SERVER['HTTP_REFERER']);
$page = trim(getUrl());
$message = "
<b>Имя</b> - $name	<br> 
<b>Телефон</b> - $tel  <br> 
<b>Коментарий</b> - $mes	 <br>
<b>источник</b> - $ref	 <br>";
	function adopt($text) {
		return '=?UTF-8?B?'.base64_encode($text).'?=';
	}

	$headers = "MIME-Version: 1.0" . PHP_EOL .
	"Content-Type: text/html; charset=utf-8" . PHP_EOL .
	'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
	'Reply-To: '.$admin_email.'' . PHP_EOL;

	mail($admin_email, adopt($form_subject), $message, $headers );

function getUrl() {
    $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
    $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
    $url .= $_SERVER["REQUEST_URI"];
    return $url;
}