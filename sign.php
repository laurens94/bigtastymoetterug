<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
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
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	$naam = clean($_POST['naam']);
	$email = clean($_POST['email']);
	
	if($naam == '') {
		$errmsg_arr[] = 'Naam ontbreekt';
		$errflag = true;
	}
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errmsg_arr[] = 'Geldig e-mailadres ontbreekt';
		$errflag = true;
	}
		$errmsg_naam[] = $naam;
		$errmsg_email[] = $email;
	
	if($email != '') {
		$qry = "SELECT * FROM lijst WHERE email='$email'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {

				$qry2 = "SELECT * FROM lijst WHERE email='$email' AND confirmed='1'";
				$result2 = mysql_query($qry2);
				if($result2) {
					if(mysql_num_rows($result2) > 0) {
						$errmsg_arr[] = '<b>E-mailadres is al ingeschreven!</b>';
						$errflag = true;
					}else{

$select = "SELECT * FROM lijst WHERE email = '$email'";
$query = mysql_query($select)or die(mysql_error());

while($list = mysql_fetch_object($query)){

$naam = "$list->naam";
$random_id = "$list->random_id";

			$to  = $email;
			$from  = 'noreply@bigtastymoetterug.nl';
			$subject = 'Bevestiging e-mailadres';
			$message = 'Beste '.$naam.',<br/><br/>';
			$message.= 'Je ontvangt deze e-mail omdat je de petitie hebt getekend op <a href="http://www.bigtastymoetterug.nl">bigtastymoetterug.nl</a> om de Big Tasty terug op de menukaart van McDonald&lsquo;s Nederland te krijgen.<br/><br/>';
			$message.= '<b>Klik op onderstaande link om dit te bevestigen:</b><br/>';
			$message.= '<a href="http://www.bigtastymoetterug.nl/bevestig.php?id='.$random_id.'&email='.$email.'">http://www.bigtastymoetterug.nl/bevestig.php?id='.$random_id.'&email='.$email.'</a><br/><br/>';
			$message.= 'Dankjewel!';
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers.= 'To: <'.$to.'>'."\r\n";
			$headers.= 'From: <'.$from.'>' . "\r\n";
			
			mail($to, $subject, $message, $headers);

		header("location: index.php?send=1");
		exit();


					}}
					@mysql_free_result($result2);
				}else {
					die("Query failed");
				}
			}
			@mysql_free_result($result);
		}else {
			die("Query failed");
		}
	}
	
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		$_SESSION['ERRMSG_NAAM'] = $errmsg_naam;
		$_SESSION['ERRMSG_EMAIL'] = $errmsg_email;
		session_write_close();
		header("location: index.php");
		exit();
	}

    srand((double)microtime()*rand(1000000,9999999));
    $arrChar=array();
    $uId = '';
     
    for($i=65;$i<90;$i++) 
    { 
        array_push($arrChar,chr($i));
        array_push($arrChar,strtolower(chr($i)));
    } 
    for($i=48;$i<57;$i++) 
    { 
        array_push($arrChar,chr($i));
    } 
    for($i=0;$i<20;$i++) 
    { 
        $uId.=$arrChar[rand(0,count($arrChar))];
    } 
    $random_id = $uId;

$datum = date("Y-m-d H:i:s");
$ip = getenv("REMOTE_ADDR");

	$qry = "INSERT INTO lijst(naam, email, confirmed, random_id, datum, ip) VALUES('$naam','$email','0','$random_id', '$datum', '$ip')";
	$result = @mysql_query($qry);
	
	if($result) {

			$to  = $email;
			$from  = 'noreply@bigtastymoetterug.nl';
			$subject = 'Bevestiging e-mailadres';
			$message = 'Beste '.$naam.',<br/><br/>';
			$message.= 'Je ontvangt deze e-mail omdat je de petitie hebt getekend op <a href="http://www.bigtastymoetterug.nl">bigtastymoetterug.nl</a> om de Big Tasty terug op de menukaart van McDonald&lsquo;s Nederland te krijgen.<br/><br/>';
			$message.= '<b>Klik op onderstaande link om dit te bevestigen:</b><br/>';
			$message.= '<a href="http://www.bigtastymoetterug.nl/bevestig.php?id='.$random_id.'&email='.$email.'">http://www.bigtastymoetterug.nl/bevestig.php?id='.$random_id.'&email='.$email.'</a><br/><br/>';
			$message.= 'Dankjewel!';
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers.= 'To: <'.$to.'>'."\r\n";
			$headers.= 'From: <'.$from.'>' . "\r\n";
			
			mail($to, $subject, $message, $headers);

		header("location: index.php?send=1");
		exit();
	}else {
		die("Query failed");
	}
?>