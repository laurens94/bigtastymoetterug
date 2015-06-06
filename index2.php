<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="bigtasty, big, tasty, weg, verdwenen, terug, petitie, mcdonald, mcdonalds, nederland, eten, menu, assortiment, bacon, hamburger, 1955, american, classic, laurens, bruijn"/>
	<meta name="description" content="D&eacute; petitie om de overheerlijke Big Tasty met bacon terug te krijgen op de menukaart van McDonald's Nederland!" />
	<meta name="robots" content="index, follow"/>
	<meta name="revisit-after" content="2 days"/>
	<meta name="author" content="Laurens Bruijn"/>
	<meta name="copyright" content="Laurens Bruijn"/>
	<meta name="google" content="notranslate"/>
	<link rel="shortcut icon" href="favicon.ico"/>

	<title>GELUKT! De Big Tasty is terug! - Petitie</title>

	<?php if(!isset($_POST['email'])){echo '<link rel="stylesheet" href="keyframes.css"/>';}?>
	<link rel="stylesheet" href="style.css"/>
	
	<script src="prefixfree.js"></script>
	<script src="js/modernizr.custom.74242.js"></script>
	<script>
	Modernizr.load([
	{
		test: Modernizr.inputtypes.range,
		nope: [     
		  'css!css/fd-slider.css'       
		 ,'js/fd-slider.js'     
		],
		callback: function(id, testResult) {     
			if("fdSlider" in window && typeof (fdSlider.onDomReady) != "undefined") {
					try { fdSlider.onDomReady(); } catch(err) {};
			};
		}
	}
	]);
	</script>
	<script src="ajax.js"></script>
	
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
			<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-25583341-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	
	
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/nl_NL/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php

require "connect.php";

// Determining the URL of the page:
$url = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"]);

// Thanks message when received
if(isset($_POST['txn_id'])){
echo '
Donatie gelukt! Dankjewel!
';}

?>

<?php

if(isset($_POST['email'])){

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
		$errormsg = 'Vul een naam in.';
	}elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errormsg = 'Geldig e-mailadres ontbreekt';
		$focus = 'email';
	}else{
		$qry = "SELECT * FROM lijst WHERE email='$email'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$qry2 = "SELECT * FROM lijst WHERE email='$email' AND confirmed='1'";
				$result2 = mysql_query($qry2);
				if($result2) {
					if(mysql_num_rows($result2) > 0) {
						$errormsg = 'E-mailadres is al ingeschreven!';
						$focus = 'email';
					}else{
						$select = "SELECT * FROM lijst WHERE email = '$email'";
						$query = mysql_query($select)or die(mysql_error());

						while($list = mysql_fetch_object($query)){

							$naam = "$list->naam";
							$random_id = "$list->random_id";

							$to  = $email;
							$subject = 'Bevestiging e-mailadres';
							$message = '
							<table bgcolor="#AA1E1B" style="border: 2px dashed #FFF;background-image:url(http://www.bigtastymoetterug.nl/email/background.png);background-repeat: repeat-x;">
							<tr><td style="width: 580px; height: 50px;"></td></tr>
							<tr><td style="width: 580px; height: 100px; text-align: center;"><img src="http://www.bigtastymoetterug.nl/email/header.png" alt="Big Tasty moet terug!"/></td></tr>
							<tr><td style="width: 580px; height: 20px;"></td></tr>
							<tr><td style="width: 580px; height: 150px; text-align: center;"><img src="http://www.bigtastymoetterug.nl/email/klik.png" alt="Klik hier:"/></td></tr>
							<tr><td style="text-align: center;"><a href="http://www.bigtastymoetterug.nl/index.php?id='.$random_id.'&email='.$email.'"><img src="http://www.bigtastymoetterug.nl/email/button.png" alt="Bevestig e-mailadres" style="outline: none; border: 0px;"/></a></td></tr>
							<tr><td style="width: 580px; height: 10px;"></td></tr>
							</table><br/>

							<font style="font-size: 12px;" color="#333333"><b>Werkt de link niet? Klik hier:<br/>
							<a href="http://www.bigtastymoetterug.nl/index.php?id='.$random_id.'&email='.$email.'">http://www.bigtastymoetterug.nl/index.php?id='.$random_id.'&email='.$email.'</a></b></font>
							';

							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$headers .= 'From: BigTasty Petitie <noreply@bigtastymoetterug.nl>' . "\r\n";

							mail($to, $subject, $message, $headers);

							$petitieresponse = 'send';

							unset($naam);
							unset($email);
						}
					}
					@mysql_free_result($result2);
				}else {
					die("Query failed");
				}
			}else{
				srand((double)microtime()*rand(1000000,9999999));
				$arrChar=array();
				$uId = '';
				 
				for($i=65;$i<90;$i++){
					array_push($arrChar,chr($i));
					array_push($arrChar,strtolower(chr($i)));
				}
				for($i=48;$i<57;$i++){
					array_push($arrChar,chr($i));
				}
				for($i=0;$i<20;$i++){
					$uId.=$arrChar[rand(0,count($arrChar))];
				}
				$random_id = $uId;

				$datum = date("Y-m-d H:i:s");
				$ip = getenv("REMOTE_ADDR");

				$qry = "INSERT INTO lijst(naam, email, confirmed, random_id, datum, ip) VALUES('$naam','$email','0','$random_id', '$datum', '$ip')";
				$result = @mysql_query($qry);
				
				if($result) {
						$to  = $email;
						$subject = 'Bevestiging e-mailadres';
						$message = '
						<table bgcolor="#AA1E1B" style="border: 2px dashed #FFF;background-image:url(http://www.bigtastymoetterug.nl/email/background.png);background-repeat: repeat-x;">
						<tr><td style="width: 580px; height: 50px;"></td></tr>
						<tr><td style="width: 580px; height: 100px; text-align: center;"><img src="http://www.bigtastymoetterug.nl/email/header.png" alt="Big Tasty moet terug!"/></td></tr>
						<tr><td style="width: 580px; height: 20px;"></td></tr>
						<tr><td style="width: 580px; height: 150px; text-align: center;"><img src="http://www.bigtastymoetterug.nl/email/klik.png" alt="Klik hier:"/></td></tr>
						<tr><td style="text-align: center;"><a href="http://www.bigtastymoetterug.nl/index.php?id='.$random_id.'&email='.$email.'"><img src="http://www.bigtastymoetterug.nl/email/button.png" alt="Bevestig e-mailadres" style="outline: none; border: 0px;"/></a></td></tr>
						<tr><td style="width: 580px; height: 10px;"></td></tr>
						</table><br/>

						<font style="font-size: 12px;" color="#333333"><b>Werkt de link niet? Klik hier:<br/>
						<a href="http://www.bigtastymoetterug.nl/index.php?id='.$random_id.'&email='.$email.'">http://www.bigtastymoetterug.nl/index.php?id='.$random_id.'&email='.$email.'</a></b></font>
						';

						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: BigTasty Petitie <noreply@bigtastymoetterug.nl>' . "\r\n";

						mail($to, $subject, $message, $headers);
					
					$petitieresponse = 'send';
					
					unset($naam);
					unset($email);
				}else {
					die("Query failed");
				}
			}
			@mysql_free_result($result);
		}else {
			die("Query failed");
		}
	}
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
				$petitieresponse = 'confirmed';
			}
		}
	}
}

?>

<header>
	<div id="header_content">
		<div class="header_block left">
		
		<div id="error"<?php if($errormsg == '') {echo ' class="hide"';} ?>>
		<div id="errormsg">
		<?php echo $errormsg;?>
		</div></div>

			<?php if($petitieresponse=='send'){echo '
			
			<div style="background: url(images/succes.png) center left no-repeat; margin: 5px; padding-left: 45px;"><b>Bedankt!</b><br/>
			Check je mail en klik op de bevestigingslink!<span id="terug"><a href="index.php">Terug</a> (<span id="seconds">10</span>)</span></div>
			<script>
			  var seconds = 10;
			  setInterval(
				function(){
				  if (seconds <= 1) {
					window.location = "index.php";
				  }
				  else {
					document.getElementById("seconds").innerHTML = --seconds;
				  }
				},
				1000
			  );
			</script>
			
			';}
			elseif($petitieresponse=='confirmed'){echo '
			

			<div style="background: url(images/succes.png) center left no-repeat; margin: 5px; padding-left: 45px;"><b>Bedankt!</b><br/>
			Je e-mailadres is bevestigd!<span id="terug"><a href="index.php">Terug</a> (<span id="seconds">10</span>)</span></div>
			<script type="text/javascript">
			  var seconds = 10;
			  setInterval(
				function(){
				  if (seconds <= 1) {
					window.location = "index.php";
				  }
				  else {
					document.getElementById("seconds").innerHTML = --seconds;
				  }
				},
				1000
			  );
			</script>
			
			';}
			else{echo '
		
			<div class="header_kop kop_left">Teken de petitie</div>
			<form action="index.php" method="post" name="petitie" id="petitie">
			<!--[if IE]><label for="naam" style="float: left; width: 50px; margin-left: -50px; margin-top: 5px;">Naam</label><![endif]--><input type="text" id="naam" name="naam" value="'.$naam.'" placeholder="Naam" autocomplete="off" tabindex="1" ';if($focus!='email'){echo 'autofocus ';}echo 'required/>
			<!--[if IE]><label for="email" style="float: left; width: 90px; margin-left: -90px; margin-top: 35px;">E-mailadres</label><![endif]--><input type="email" id="email" name="email" value="'.$email.'" placeholder="E-mailadres" autocomplete="off" tabindex="2" ';if($focus=='email'){echo 'autofocus ';}echo 'required/>
			<input type="submit" name="submit" class="submit" value="Verstuur" tabindex="3"/>
			
			</form>
			
			';}?>
		</div>
		<div class="header_tussen"></div>
		<div class="header_block mid">
			<div class="socialmedia">
				<span style="position: relative; bottom: -3px;">
				
				<div class="g-plusone" data-size="medium" data-annotation="none" data-href="http://www.bigtastymoetterug.nl"></div>

				<script type="text/javascript">
				  window.___gcfg = {lang: 'nl'};

				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
				</span>
				
				<div class="fb-like" data-href="http://www.bigtastymoetterug.nl" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" style="padding: 0 5px 12px 5px;"></div>
				
				<span style="position: relative; bottom: -3px;"><a href="https://twitter.com/share" class="twitter-share-button" data-url="www.bigtastymoetterug.nl" data-text="De #BigTasty met bacon is terug! Dankzij de petitie op http://www.bigtastymoetterug.nl" data-lang="nl" data-related="BigTastyTERUG">Tweeten</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</span>
			</div>
			<div id="counter_block">
				<div class="header_kop kop_mid">Aantal hongerige fans</div>
				<div id="header_counter">
					<script type="text/javascript">
						<!--
						refreshdiv();
						// -->
					</script>
					<div id="counter"></div>
				</div>
			</div>
		</div>
		<div class="header_tussen"></div>
		<div class="header_block right">
			<div class="header_kop kop_right">Hij is terug</div>
			<div class="text">Om de maker van deze website te bedanken,<br/>kun je hem trakteren op een Big Tasty!</div>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="payPalForm">

            <input type="hidden" name="cmd" value="_donations" />
            <input type="hidden" name="item_name" value="Donatie voor de Big Tasty!" />

            <!-- Your PayPal email: -->
            <input type="hidden" name="business" value="laurens.bruijn@gmail.com" />

            <!-- PayPal will send an IPN notification to this URL: -->
            <input type="hidden" name="notify_url" value="<?php echo $url.'/ipn.php'?>" /> 

            <!-- The return page to which the user is navigated after the donations is complete: -->
            <input type="hidden" name="return" value="index.php" /> 

            <!-- Signifies that the transaction data will be passed to the return page by POST -->
            <input type="hidden" name="rm" value="2" /> 

			<!-- 	General configuration variables for the paypal landing page. Consult 
            		http://www.paypal.com/IntegrationCenter/ic_std-variable-ref-donate.html for more info  -->

            <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="cbt" value="Terug naar bigtastymoetterug.nl" />
            <input type="hidden" name="no_shipping" value="1" />
            <input type="hidden" name="lc" value="NL" />
            <input type="hidden" name="currency_code" value="EUR" />

			<!-- The amount of the transaction: -->
			
			<div class="donateholder">
			<input name="amount" style="width: 130px;" id="amount" type="range" min="1" max="10" step="1" title="Donatie bedrag" value="4" onchange="showValue(this.value)" tabindex="4"></div>
			<div class="donateamount">&euro;<span id="euro">4</span></div>

			<div class="donatebutton">
			<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest" />
			<input type="image" src="https://www.paypal.com/nl_NL/i/btn/btn_donate_LG.gif" name="submit" alt="Donate" />
			</div>
			
			<script type="text/javascript">
			function showValue(newValue){
				document.getElementById("euro").innerHTML=newValue;
			}
			</script>

        </form>
		</div>
	</div>
</header>

<div id="container">
	<div id="content">


	</div>
	<div id="wood">
		<img src="images/hesback.png" class="woodfade" alt=""/>
	</div>
</div>

</body>
</html>