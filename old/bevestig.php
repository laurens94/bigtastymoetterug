<?php

	//Start session
	session_start();
	
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

$id = $_GET['id'];
$email = $_GET['email'];
$datum = date("Y-m-d H:i:s");
$ip = getenv("REMOTE_ADDR");

if($id != ''){
    $find_id = mysql_query("SELECT random_id FROM lijst WHERE random_id = '$id' AND email = '$email'");
    $duplicate_id = mysql_num_rows($find_id);  
    if ($duplicate_id > 0 ) { 
      $find_confirmed = mysql_query("SELECT confirmed FROM lijst WHERE random_id = '$id' AND email = '$email'");
      while(list($confirmed) = mysql_fetch_row($find_confirmed)){
         if ($confirmed == 0) { 
           mysql_query("UPDATE lijst SET confirmed = '1' WHERE random_id = '$id' AND email = '$email'");
           mysql_query("UPDATE lijst SET datum_confirmed = '$datum' WHERE random_id = '$id' AND email = '$email'");
           mysql_query("UPDATE lijst SET ip_confirmed = '$ip' WHERE random_id = '$id' AND email = '$email'");
           mysql_query("UPDATE lijst SET random_id = '' WHERE random_id = '$id' AND email = '$email'");

		header("location: index.php?bevestigd=1");
		exit();

         }else{header("location: index.php");exit();}
      }}else{header("location: index.php");exit();}
}else{header("location: index.php");exit();}
?>

