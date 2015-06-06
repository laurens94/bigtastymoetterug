<?php

	
	//Include database connection details
	require_once('config.php');
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	$totalnumber = mysql_query("SELECT * FROM lijst WHERE confirmed = 1"); 
	$num_rows = mysql_num_rows($totalnumber);
	$totalnumber2 = mysql_query("SELECT * FROM lijst WHERE confirmed = 1 AND mailsend = 1"); 
	$num_rows2 = mysql_num_rows($totalnumber2);
	echo $num_rows2.' / '.$num_rows;
	
	$res = mysql_query("SELECT * FROM lijst WHERE confirmed = 1 AND mailsend = 1 ORDER BY nummer ASC LIMIT 0,1"); 
	while ($arr = mysql_fetch_assoc($res)) { 
		$naam = $arr["naam"];
		$email = $arr["email"];
		$nummer = $arr["nummer"];
		
		echo '<br/><br/>'.$email.'';

$to  = $email;
$from  = 'contact@bigtastymoetterug.nl';
$subject = 'de McLaurens!';
$message = '

Hoi '.$naam.'!<br/>
<br/>
Ik heb de McLaurens gemaakt en ik heb jouw hulp nodig om de Bekendste Burger van Nederland te worden. Hiervoor heb ik stemmen nodig en ik wil jou vragen om op mij te stemmen zodat ik door kan gaan naar de volgende ronde.<br/>
<br/>
Klik op de link hieronder en stem op mijn McLaurens<br/>
<br/>
<a href="http://www.debekendsteburger.nl/burger/7741ebf806b1235c328c519eada08c0a43eedef3">Stem op mijn Burger!<br/>
http://www.debekendsteburger.nl/burger/7741ebf806b1235c328c519eada08c0a43eedef3</a><br/>
<br/>
Bedankt!<br/>
Laurens<br/><br/>
(als je geen soortgelijke e-mails meer wilt ontvangen, <a href="http://bigtastymoetterug.nl/remove.php">klik hier</a>!)
';
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers.= 'From: Laurens <'.$from.'>' . "\r\n";

mail($to, $subject, $message, $headers);

mysql_query("UPDATE lijst SET mailsend = '2' WHERE nummer = '$nummer'");
	}
	mysql_free_result($res); 
	?>
<meta http-equiv="refresh" content="0">