<?php 
	require_once('config.php');
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

$totaal=mysql_num_rows(mysql_query("SELECT * FROM lijst WHERE confirmed=1"));

 $numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9"); 
 $imgs = array("<div class='nummer0'></div>", "<div class='nummer1'></div>", "<div class='nummer2'></div>", "<div class='nummer3'></div>", "<div class='nummer4'></div>", "<div class='nummer5'></div>", "<div class='nummer6'></div>", "<div class='nummer7'></div>", "<div class='nummer8'></div>", "<div class='nummer9'></div>");
 $phrase = sprintf ("%08.0f",$totaal);
 $show_totaal = str_replace($numbers, $imgs, $phrase); 

echo $show_totaal;

?>