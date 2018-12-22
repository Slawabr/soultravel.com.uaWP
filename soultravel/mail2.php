<?php

//Script Foreach
$c = true;

$project_name = "Турагенство г. Харьков";
$admin_email  = "info@soultravel.com.ua";
// $admin_email  = "soultravelua@gmail.com";
$form_subject = "Заполнение формы";
$email = trim($_POST['xinemail']);
$name = trim($_POST['xinname']);
$destination = trim($_POST['xindestination']);
$min_price = trim($_POST['min_price']);
$max_price = trim($_POST['max_price']);
$tel = trim($_POST['xinphone']);
$date1 = trim($_POST['xindate']);
$adults = trim($_POST['xinadults']);
$childs = trim($_POST['xinchilds']);
$star = trim($_POST['xinstar']);
$food = trim($_POST['xinfood']);

$ref = trim($_SERVER['HTTP_REFERER']);

$message = "
<b>Имя</b> - $name	<br>
<b>E-mail</b> - $email <br>
<b>Телефон</b> - $tel  <br>
<b>Куда</b> - $destination <br>
<b>Дата вылета</b> - $date1  <br>
<b>Цена от</b> - $min_price<b>$</b> <br>
<b>Цена до</b> - $max_price<b>$</b> <br>
<b>Взрослых</b> - $adults	 <br>
<b>Детей</b> - $childs	 <br>
<b>Звезд</b> - $star  <br>
<b>Тип питания</b> - $food	 <br>
<b>источник</b> - $ref	 <br>
";

function adopt($text) {
	return '=?UTF-8?B?'.base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );
