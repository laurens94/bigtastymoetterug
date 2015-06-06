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
	$email = $_POST['email'];
		$res = mysql_query("SELECT * FROM lijst WHERE block = 0 AND email = '$email' AND confirmed = 1"); 
	while ($arr = mysql_fetch_assoc($res)) { 
		$email2 = $arr["email"];
		echo ''.$email2.'';
	mysql_query("UPDATE lijst SET block = '1' WHERE email = '$email' AND confirmed = 1");
	echo '<br/>Gelukt! Je zult geen e-mails meer ontvangen.<br/>';
	}
	mysql_free_result($res); 
	?>
	<br/>
	Vul hier het e-mailadres in wat je wilt verwijderen uit de e-maildatabase.<br/>
	<form action="remove.php" method="post">
	<input type="email" id="email" name="email"/>
	<input type="submit"/>
	</form>
	