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
	$totalnumber2 = mysql_query("SELECT * FROM lijst WHERE confirmed = 1 AND mailsend = 0"); 
	$num_rows2 = mysql_num_rows($totalnumber2);
	echo $num_rows2.' / '.$num_rows;
	
	$res = mysql_query("SELECT * FROM lijst WHERE confirmed = 1 AND mailsend = 0 ORDER BY nummer ASC LIMIT 0,1"); 
	while ($arr = mysql_fetch_assoc($res)) { 
		$email = $arr["email"];
		$nummer = $arr["nummer"];
		
		echo '<br/><br/>'.$email.'';

$to  = $email;
$from  = 'contact@bigtastymoetterug.nl';
$subject = 'Big Tasty is terug!';
$message = '

<font size="1">Wordt deze e-mail niet goed weergegeven? Klik dan <b><a href="http://bigtastymoetterug.nl/terugmail/index.htm" target="_blank">hier</a></b>!<br/>
<a href="http://bigtastymoetterug.nl/terugmail/index.htm" target="_blank">http://bigtastymoetterug.nl/terugmail/index.htm</a></font><br/><br/>

<table border="0" cellpadding="0" cellspacing="0" width="584" style="display:inline-table;">

<tbody><tr><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="19" height="1" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="156" height="1" border="0" alt="" style="display:block"></td>

<td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="59" height="1" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="58" height="1" border="0" alt="" style="display:block"></td>

<td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="267" height="1" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="2" height="1" border="0" alt="" style="display:block"></td>

<td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="23" height="1" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="1" height="1" border="0" alt="" style="display:block"></td>

</tr><tr><td colspan="7"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r1_c1" src="http://bigtastymoetterug.nl/terugmail/images/index2_r1_c1.jpg" width="584" height="71" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="1" height="71" border="0" alt="" style="display:block"></td>

</tr><tr><td rowspan="6"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r2_c1" src="http://bigtastymoetterug.nl/terugmail/images/index2_r2_c1.jpg" width="19" height="804" border="0" alt="" style="display:block"></td><td colspan="5">

<a href="http://mi8.ly/bzdhde" target="_blank"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r2_c2" src="http://bigtastymoetterug.nl/terugmail/images/index2_r2_c2.jpg" width="542" height="199" border="0" alt="" style="display:block"></a></td>

<td rowspan="6"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r2_c7" src="http://bigtastymoetterug.nl/terugmail/images/index2_r2_c7.jpg" width="23" height="804" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="1" height="199" border="0" alt="" style="display:block"></td>

</tr><tr><td colspan="5"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r3_c2" src="http://bigtastymoetterug.nl/terugmail/images/index2_r3_c2.jpg" width="542" height="305" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="1" height="305" border="0" alt="" style="display:block"></td>

</tr><tr><td rowspan="4"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r4_c2" src="http://bigtastymoetterug.nl/terugmail/images/index2_r4_c2.jpg" width="156" height="300" border="0" alt="" style="display:block"></td><td colspan="2">

<a href="http://www.bigtastymoetterug.nl/" target="_blank"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r4_c3" src="http://bigtastymoetterug.nl/terugmail/images/index2_r4_c3.jpg" width="117" height="20" border="0" alt="www.bigtastymoetterug.nl" style="display:block"></a></td>

<td rowspan="2" colspan="2"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r4_c5" src="http://bigtastymoetterug.nl/terugmail/images/index2_r4_c5.jpg" width="269" height="180" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="1" height="20" border="0" alt="" style="display:block"></td>

</tr><tr><td colspan="2"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r5_c3" src="http://bigtastymoetterug.nl/terugmail/images/index2_r5_c3.jpg" width="117" height="160" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="1" height="160" border="0" alt="" style="display:block"></td>

</tr><tr><td rowspan="2"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r6_c3" src="http://bigtastymoetterug.nl/terugmail/images/index2_r6_c3.jpg" width="59" height="120" border="0" alt="" style="display:block"></td><td colspan="2">

<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=GQ9J4M48MPVK4" target="_blank"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r6_c4" src="http://bigtastymoetterug.nl/terugmail/images/index2_r6_c4.jpg" width="325" height="76" border="0" alt="" style="display:block"></a></td>

<td rowspan="2"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r6_c6" src="http://bigtastymoetterug.nl/terugmail/images/index2_r6_c6.jpg" width="2" height="120" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="1" height="76" border="0" alt="" style="display:block"></td>

</tr><tr><td colspan="2"><img name="13679a022753b3e2_13679a0101c63fa8_index2_r7_c4" src="http://bigtastymoetterug.nl/terugmail/images/index2_r7_c4.jpg" width="325" height="44" border="0" alt="" style="display:block"></td><td><img src="http://bigtastymoetterug.nl/terugmail/images/spacer.gif" width="1" height="44" border="0" alt="" style="display:block"></td>

</tr></tbody></table>
';
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers.= 'From: Laurens <'.$from.'>' . "\r\n";

mail($to, $subject, $message, $headers);

mysql_query("UPDATE lijst SET mailsend = '1' WHERE nummer = '$nummer'");
	}
	mysql_free_result($res); 
	?>
<meta http-equiv="refresh" content="0">